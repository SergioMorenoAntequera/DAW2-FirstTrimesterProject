<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Person;
use Dotenv\Regex\Result;

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
        $this->middleware('auth')->except('index', 'show');     
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
    public function destroy($id){
        $movie = Movie::find($id);
        $movie->delete();
        return redirect(route("movie.index"));
    }

    public function lookForYear($year){
        $data['year'] = $year;
        $data['movies'] = Movie::all();

        return view("movie.year", $data);
    }
    
}
