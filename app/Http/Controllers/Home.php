<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassifiedAd;
use App\Models\Epaper;


class Home extends Controller
{
   
    public function index(){
        

        $epapers = Epaper::latest()->get();
        return view('website.portfolio', compact('epapers'));
        

    }
     public function epaper(){
        

        $epapers = Epaper::latest()->get();
        return view('website.epaper', compact('epapers'));
        

    }


    public function adpreview(){

        return view('website.ad-preview');

    }

     public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'user_type' => 'user',
            'created_at'=>NOW()
        ]);

        return redirect('/login')->with('success', 'Account created successfully. Please login.');
    }


    public function login(Request $request)
        {


            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
                'user_type' => 'user',
            ];

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect('dashboard')->with('success', 'Login successful.');
            }

            return back()->with('error', 'Invalid email, password, or unauthorized user type.');
        }


        public function dashboard(Request $request){


            return view('website.dashboard');


        }

         public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('user.login')->with('success', 'Logged out successfully.');
        }
        

        public function userOrders(Request $request)
            {


                $orders = ClassifiedAd::where('user_id', Auth::id())
                    ->latest()
                    ->paginate(10);

                return view('website.orders', compact('orders'));
            }



}
