<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forgetpassController extends Controller
{
    public function showTheForm(){
        return view('managment_forget_pass.index');
    }
}
