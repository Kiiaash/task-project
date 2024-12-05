<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagmentController extends Controller
{
    public function login(Request $request){

    }

    public function takelogin(){
        return view('managment_login.index');
    }
}
