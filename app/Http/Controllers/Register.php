<?php

namespace App\Http\Controllers;
use App\Models\Register_model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class Register extends Controller
{
         public function login(Request $request)
        {


         if(Auth::attempt($request->only('email','password'))){

            //$user=DB::table('userss')->where('email',$request->email)->first();
           // if($user && Hash::check($request->password, $user->password)){

                return redirect('/admin/dashboard')->with('success','login Successfully');
            }
            else
            {
                return redirect('/admin/login')->with('error','Invalid Credentails');

            }

            
        }


        public function logout(request $request){

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/admin/login')->with('success','Logout Successfully');

        }

}
