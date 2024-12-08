<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Support\Str;

class forgetpassController extends Controller
{
    public function showTheForm(){
        return view('managment_forget_pass.index');
    }

    public function reset(Request $request){
        $request->validate([
            'email'=>'required',
        ]);
        
        $user = User::where('email',$request->only('email'))->where('level',"admin")->first();
        if($user==""){
            return redirect()->route('forget.pass')->with('status','The credentials provided is not valid, please try again');
        }else{
            $status = Password::sendResetLink($request->only('email'));
            if($status === Password::RESET_LINK_SENT){
                return redirect()->route('forget.pass')->with(['success'=>__($status)]);
            }
        }
    }

    public function showresetpassform(Request $request,$token){
        $email = $request->query('email');
        return view('managment_password_reset.index',['email'=>$email,'token'=>$token]);
    }

    public function passwordUpdater(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>[
                'required',
                'confirmed',
                 PasswordRule::min(7)->numbers()->mixedCase()->symbols()->letters(),
            ],
            'passwrod_confirm'=>'required',
        ]);
        
        Password::reset($request->only('password','passwrod_confirm','email','token'),function(User $user,$password){
            $user->forceFill([
                'password'=>Hash::make($password)
            ])->setRememberToken(Str::random(10));
            $user->save();
        });

        return redirect()->route('login.take')->with('success','Your password has been changes successfully');
    }
}
