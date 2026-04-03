<?php

namespace App\Http\Controllers;
use App\Models\ClassifiedAd;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function adlist(request $rquest){


        $ads = ClassifiedAd::orderBy('id','desc')->get();
        return view('admin.adlist', compact('ads'));
    }

    public function view($id)
    {
        $ad = ClassifiedAd::find($id);
        return view('admin.adview',compact('ad'));
    }

    public function delete($id)
    {
        ClassifiedAd::find($id)->delete();
        return redirect()->back()->with('success','Ad deleted successfully');
    }

    public function users(){


        $users = DB::table('users')->where('user_type','user')->orderBy('id','desc')->get();
        return view('admin.users', compact('users'));

    }

  

}
