<?php

namespace App\Http\Controllers;

include (public_path().'/php/simple_html_dom.php');
use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Person;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Create a new controller instance.
     * Restricting the access to all it's views
     * but the index and the information about one
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'lookForYear');     
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // SHOW ALL MOVIES //////////////////////////////////////////////////////////////////////
    /**
     * Method that shows all the registers in the database
     * 
     * @return View
     */
    public function index(){
        $data['movies'] = Movie::all();
        return view("movie.index", $data);
    }

    // SHOW A MOVIE /////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows a specific register of our
     * database depending on it's ID
     *  
     * @param id
     * @return View
     */
    public function show($id){
        $data['movie'] = Movie::find($id);
        
        //var_dump((Movie::find($id)->genres)[1]->description);
        
        return view("movie.show", $data);
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////
    // CREATE FORM /////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows the form to create a new register
     * 
     * @return View
     */
    public function create(){
        $data['genres'] = Genre::all();
        $data['people'] = Person::all();
        return view("movie.create", $data);
    }

    // STORE FUNCTION ///////////////////////////////////////////////////////////////////////
    /**
     * Method that recieves information in a Request object,
     * and then checks and include that information inside our database
     * 
     * @param r
     * @return View
     */
    public function store(Request $r){
        $data = Array($r->all());

        $r->validate([
            'title' => 'unique:movies|required',
            'year' => 'numeric|between:1895,2021',
            'duration' => 'numeric',
            'external_url' => 'unique:movies',
        ]);

        $movie = new Movie($r->all());
        $movie->id = Movie::max('id')+1;

        if($r->hasFile('cover')){
            $file = $r->file('cover');
            $file->move(public_path("/img/covers/"), $movie->id.$file->getClientOriginalName());
            $movie->cover = $movie->id.$file->getClientOriginalName();
        } else {
            $movie->cover = "NoCover.png";
        }
        
        $movie->genres()->attach($r->genres);
        $movie->actors()->attach($r->actors);
        $movie->directors()->attach($r->directors);
        
        $movie->save();
        return redirect(route("movie.index"));
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // EDIT FORM //////////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows the form to edit an already existing registry
     * 
     * @return View
     */
    public function edit($id){
        $data['movie'] = Movie::find($id);
        $data['genres'] = Genre::all();
        $data['people'] = Person::all();
    
        return view("movie.edit", $data);
    }

    // UPDATE FUNCTION //////////////////////////////////////////////////////////////////////////////
    /**
     * Method that recieves information in a Request object,
     * then checks and changes the information inside our database
     * 
     * @param r
     * @return View
     */
    public function update(Request $r){
        
        $r->validate([
            'year' => 'numeric|between:1895,2021',
            'duration' => 'numeric',
        ]);

        $movie = Movie::find($r->id);
        
        $movie->fill($r->all());

        if($r->hasFile('cover')){
            $file = $r->file('cover');
            $file->move(public_path("/img/covers/"), $movie->id.$file->getClientOriginalName());
            $movie->cover = $movie->id.$file->getClientOriginalName();
        }

        $movie->genres()->sync($r->genres);
        $movie->actors()->sync($r->actors);
        $movie->directors()->sync($r->directors);

        $movie->update();
        return redirect(route("movie.index"));
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // DESTROY //////////////////////////////////////////////////////////////////////////////
    /**
     * Method that deleets an specific registry inside out database
     * depending on a id that we will introduce by url
     * 
     * @param id
     * @return View
     */
    public function destroy($request, $id){
        
        if($request->ajax()){
            $movie = \App\Movie::find($id);
            $movie->genres()->detach();
            $movie->actors()->detach();
            $movie->directors()->detach();
            $movie->delete();
        }

        /*$movie = Movie::find($id);
        
        return redirect(route("movie.index"));
        */
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // LOOK FOR YEAR //////////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows us in a new view the movies made in 
     * the year that we introduce by parameter
     * 
     * @param year
     * @return View
     */
    public function lookForYear($year){
        $data['year'] = $year;
        $data['movies'] = Movie::all();

        return view("movie.year", $data);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // SCAN ///////////////////////////////////////////////////////////////////////////////////
    /**
     * Method that scans our directory /public/movies/
     * 
     * @param id
     * @return View
     */
    public function scan(){
        //Mirar en el directorio si tenemos películas que no están registradas
        $movies = Movie::all();
        $contador = 0;
        $movieNamesToAdd = Array();
        $titles = Array();
        $moviesAdded = Array();

        //Vamos a comprobar que acaben en .mp4 .omv y guardarlos así
        foreach(scandir("movies") as $name){
            
            //Comprobamos que encuentra un nuevo archivo de video
            if(strpos($name, ".mp4") || strpos($name, ".omv")){
                //Si no lo encuentra en la base de datos
                //lo clasificamos en otro array
                $movieNamesToAdd[] = $name;
            }

        } //Hemos termiando de registrar el directorio

        //Cogemos los datoss que podemos obtener por ahora
        //que son el nombre y el fichero
        foreach($movieNamesToAdd as $movie){
            //Limpiamos y cogemos el titulo de la película
            if(strpos($movie, ".mp4")){
                $titles[] = str_replace(".mp4", "", $movie);
            } else if(strpos($movie, ".omv")){
                $titles[] = str_replace(".omv", "", $movie);
            }
        }
        
        foreach($titles as $fileTitle){
            $data = Movie::scraping($fileTitle);
            $data['filename'] = $fileTitle;
            $putIn = true;

            foreach($movies as $movie){
                if($movie->title == $data['title']){
                    $putIn = false;
                }
            }
            
            if($putIn){
                $contador++;
                $this->insertAux($data);
            }
        }
        
        
        return redirect(route("movie.index"));
    }

    private function insertAux($data){
        $insert = true;
        if($insert){
            $insert = false;
            DB::table('movies')->insert([    
                //La id no se pone porque se autoincrementa sola
                'title' => $data['title'],
                'year' => $data['year'],
                'duration' => $data['duration'],
                'rating' => $data['rating'],
                'cover' => $data['cover'],
                'filepath' => "movies",
                'filename' => $data['filename'],
                'external_url' => $data['external_url'],
                'created_at' => date('Y-m-d H-m-s'),
                'updated_at' => date('Y-m-d H-m-s'),
            ]);
        }
    }

}
