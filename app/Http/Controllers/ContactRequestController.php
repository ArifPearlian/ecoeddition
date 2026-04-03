<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'business'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'
        ]);

        ContactRequest::create($request->all());

        return back()->with('success','Your enquiry has been submitted.');
    }

    public function index()
    {
        $requests = ContactRequest::latest()->get();
        return view('admin.contact_requests', compact('requests'));
    }
}