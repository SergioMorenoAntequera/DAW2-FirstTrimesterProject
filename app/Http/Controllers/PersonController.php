<?php

namespace App\Http\Controllers;

use App\Movie;
use App\person;
use Illuminate\Http\Request;

class PersonController extends Controller
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
    // SHOW ALL PEOPLE /////////////////////////////////////////////////////////////////////
    /**
     * Method that shows all the registers in the database
     * 
     * @return View
     */
    public function index(){
        $data['people'] = Person::all();
        return view("person.index", $data);
    }

    // SHOW A PERSON /////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows a specific register o our
     * database depending on it's ID
     * 
     * @param id
     * @return View
     */
    public function show($id){
        //Cogemos todos los datos de la BD y los metemos
        $data['person'] = Person::find($id);
        return view("person.show", $data);
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////
    // CREATE FORM /////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows the form to create a new register
     * 
     * @return View
     */
    public function create(){
        $data['movies'] = Movie::all();
        return view("person.create", $data);
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
        $person = new Person($r->all());
        $person->id = Person::max('id')+1;

        if($r->hasFile('photo')){
            $file = $r->file('photo');
            $file->move(public_path("/img/people/"), $person->id.$file->getClientOriginalName());
            $person->photo = $person->id.$file->getClientOriginalName();
        } else {
            $person->photo = "NoPhoto.png";
        }
        
        $person->moviesActed()->attach($r->moviesActed);
        $person->moviesDirected()->attach($r->moviesDirected);
        
        $person->save();
        return redirect(route("person.index"));
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // EDIT FORM //////////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows the form to edit an already existing registry
     * 
     * @return View
     */
    public function edit($id){
        $data['person'] = Person::find($id);

        $data['movies'] = Movie::all();
        return view("person.edit", $data);
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
        dd($r->id);
        $person = Person::find($r->id);
        $person->fill($r->all());

        if($r->hasFile('photo')){
            $file = $r->file('photo');
            $file->move(public_path("/img/people/"), $person->id.$file->getClientOriginalName());
            $person->photo = $person->id.$file->getClientOriginalName();
        }

        $person->moviesActed()->sync($r->moviesActed);
        $person->moviesDirected()->sync($r->moviesDirected);

        $person->update();
        return redirect(route("person.index"));
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
        $person = Person::find($id);
        
        $person->moviesActed()->detach();
        $person->moviesDirected()->detach();
        
        $person->delete();
        return redirect(route("person.index"));
    }
}