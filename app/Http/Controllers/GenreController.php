<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;

class GenreController extends Controller
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
    // SHOW ALL GENRES  //////////////////////////////////////////////////////////////////////
    /**
     * Method that shows all the registers in the database
     * 
     * @return View
     */
    public function index(){
        $data['genres'] = Genre::all();
        $data['movies'] = Movie::all();
        return view("genre.index", $data);
    }

    // SHOW A GENRE /////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows a specific register o our
     * database depending on it's ID
     * 
     * @param id
     * @return View
     */
    public function show($id){
        $data['genre'] = Genre::find($id);
        $data['movies'] = Movie::all();
        return view("genre/show", $data);
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////
    // CREATE FORM /////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows the form to create a new register
     * 
     * @return View
     */
    public function create(){
        return view("genre.create");
    }

    // STORE FUNCTION ///////////////////////////////////////////////////////////////////////
    /**
     * Method that recieves information in a Request object from the,
     * and then checks and include that information inside our database
     * 
     * @param r
     * @return View
     */
    public function store(Request $r){
        $genre = new Genre($r->all());
        $genre->details = $r->details;
        $genre->id = Genre::max('id')+1;

        $genre->save();

        return redirect(route("genre.index"));
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // EDIT FORM //////////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows the form to edit an already existing registry
     * 
     * @return View
     */
    public function edit($id){
        $data['genre'] = Genre::find($id);
        return view("genre.edit", $data);
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
        $genre = Genre::find($r->id);
        $genre->fill($r->all());
        
        $genre->update();
        
        return redirect(route("genre.index"));
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
        $genre = Genre::find($id);
        $genre->delete();
        return redirect(route("genre.index"));
    }
}
