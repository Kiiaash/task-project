<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forgetpassController extends Controller
{
    public function showTheForm(){
        return view('managment_forget_pass.index');
    }

    public function reset(Request $request){
        return redirect()->route('forget.pass')->with('success','The link has been sent to your email address');
    }
}
