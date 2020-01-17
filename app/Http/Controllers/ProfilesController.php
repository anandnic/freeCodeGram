<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfilesController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    

    public function index(\App\User $user) {
       
        // $user=User::findOrFail($user);
        return view('profiles.index',compact('user'));
        
    }

    public function edit(\App\User $user) {

        return view('profiles.edit',compact('user'));
    }

    public function update(\App\User $user) {

        $data=request()->validate([

            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);
        $user->profile->update($data);
        return redirect("/profile/{$user->id}");
    }
}
