<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
/**
 * Description of ProfileController
 *
 * @author user1
 */
class ProfileController extends Controller{
    public function create()
    {
        return view('auth.profile',[
            'user' => auth()->user()
        ]);
        
    }
    public function __construct() {
        $this->middleware('auth');//da izvar6i n6 konkretno
    }
    public function update(ProfileRequest $request) {
        //samo pri post zaqwka
        $name=$request->input('name');
        $pass=$request->input('password');
        $user=auth()->user();
        $user->name=$name;
        
        if(Hash::check($pass,$user->password)){
            $new_pass = $request->input('new_password');
            $user->password =Hash::make($new_pass);
        }else{
            Session::put('warning', 'Old password not match');
        }
        $user->save();
        return redirect()->route('profile')->withSuccess('Profile saved');
        //rederct izvarshvame vinagi s post
    }
}
