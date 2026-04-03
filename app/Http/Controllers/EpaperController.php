<?php

namespace App\Http\Controllers;

use App\Models\Epaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpaperController extends Controller
{
    public function index()
    {
        $epapers = DB::table('epapers')->latest()->get();
        return view('admin.epaper', compact('epapers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf|max:10000'
        ]);

        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads/epapers'), $fileName);

        Epaper::create([
            'title' => $request->title,
            'file' => $fileName
        ]);

        return back()->with('success','PDF Uploaded Successfully');
    }

    public function show()
    {
        $epapers = Epaper::latest()->get();
        return view('frontend.epaper', compact('epapers'));
    }
}