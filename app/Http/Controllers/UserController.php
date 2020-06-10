<?php

namespace App\Http\Controllers;
use App\Role;
use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $roles = Role::all();

        return view ('user',compact('currentuser', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }



    public function selectRole(Request $request){

        //dd($request);
        $id = Auth::user()->id;
        $currentuser = User::find($id);

        $currentuser->role()->associate($request->id);

        return redirect(route('user.index'));
    }

    public function liberateRole(){

        //dd($request);
        $id = Auth::user()->id;
        $currentuser = User::find($id);

        $currentuser->role()->dissociate();

        return redirect(route('user.index'));
    }
}
