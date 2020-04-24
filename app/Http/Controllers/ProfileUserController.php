<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;


//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;
class ProfileUserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    //Function for edit detail user
    public function profile(){
        $user = Auth::user()->id;
        return view('dashboard.profile.index', compact('user'));
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields  
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
        ]);
        $input = $request->only(['name', 'email']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {        
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        }        
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully edited.');
    }
}
