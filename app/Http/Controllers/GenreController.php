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
        //return view("user.create");
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
        /*$user = new User($r->all());
        $user->id = User::max('id')+1;

        if($r->type == "true"){
            $user->type = 0;
        } else {
            $user->type = 1;
        }
        $user->save();
        //No se como volver al index()
        //return view("user/index");
        return redirect(route("user.index"));*/
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // EDIT FORM //////////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows the form to edit an already existing registry
     * 
     * @return View
     */
    public function edit($id){
        /*$data['user'] = User::find($id);
        return view("user.edit", $data);*/
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
        /*$user = User::find($r->id);

        var_dump($r->id);
        $user->fill($r->all());
        
        if($r->type == "true"){
            $user->type = 0;
        } else {
            $user->type = 1;
        }

        $user->update();
        return redirect(route("user.index"));*/
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
        /*$user = User::find($id);
        $user->delete();
        return redirect(route("user.index"));*/
    }
}
