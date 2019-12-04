<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     * Restricting the access to all it's views
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // SHOW ALL USERS //////////////////////////////////////////////////////////////////////
    /**
     * Method that shows all the registry in the database
     * 
     * @return View
     */
    public function index(){
        $data['users'] = User::all();
        return view("user.index", $data);
    }

    // SHOW A USER /////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows a specific registry of our
     * database depending on it's ID
     * 
     * @param id
     * @return View
     */
    public function show($id){
        //Cogemos todos los datos de la BD y los metemos
        $data['user'] = User::find($id);
        return view("user/show", $data);
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////
    // CREATE FORM /////////////////////////////////////////////////////////////////////////
    /**
     * Method that shows the form to create a new registry
     * 
     * @return View
     */
    public function create(){
        return view("user.create");
    }

    // STORE FUNCTION ///////////////////////////////////////////////////////////////////////
    /**
     * Method that recieves information in a Request object,
     * then checks and include that information inside our database
     * 
     * @param r
     * @return View
     */
    public function store(Request $r){
        $user = new User($r->all());
        $user->id = User::max('id')+1;
        $user->password = Hash::make($r->password);

        if($r->type == "true"){
            $user->type = 0;
        } else {
            $user->type = 1;
        }
        $user->save();
        //No se como volver al index()
        //return view("user/index");
        return redirect(route("user.index"));
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
    // EDIT FORM //////////////////////////////////////////////////////////////////////////////ç
    /**
     * Method that shows the form to edit an already existing registry
     * 
     * @return View
     */
    public function edit($id){
        $data['user'] = User::find($id);
        return view("user.edit", $data);
    }

    // UPDATE FUNCTION //////////////////////////////////////////////////////////////////////////////
    /**
     * Method that recieves information in a Request object,
     * then checks and changes the information inside our database
     * 
     * @param r
     * @return View
     */
    public function update(Request $r, $id){

        $user = User::find($id);

        $user->fill($r->all());
        
        if($r->type == "true"){
            $user->type = 0;
        } else {
            $user->type = 1;
        }

        $user->update();
        return redirect(route("user.index"));
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
        $user = User::find($id);
        $user->delete();
        return redirect(route("user.index"));
    }
}
