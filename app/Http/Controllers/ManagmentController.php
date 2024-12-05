<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageLogin;
use Illuminate\Http\Request;


class ManagmentController extends Controller
{
    public function login(ManageLogin $request){
        dd($request);
    }

    public function takelogin(){
        return view('managment_login.index');
    }
}
