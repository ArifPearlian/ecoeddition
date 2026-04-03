<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassifiedAd;
use Illuminate\Support\Facades\Auth;

class ClassifiedAdController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'ad_type' => 'required|string|max:50',
            'ad_size' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'ad_content' => 'required|string',
            'contact_details' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'total_price' => 'required|numeric',
            'razorpay_payment_id' => 'required|string'
        ]);

        // ❌ payment missing
        if (!$request->razorpay_payment_id) {
            return back()->with('error', 'Payment failed!');
        }

        $imagename = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/classified_ads'), $imagename);
        }

         //die($request->razorpay_payment_id);

        ClassifiedAd::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'category' => $request->category,
            'ad_type' => $request->ad_type,
            'ad_size' => $request->ad_size,
            'image' => $imagename,
            'title' => $request->title,
            'ad_content' => $request->ad_content,
            'contact_details' => $request->contact_details,
            'word_count' => $request->word_count ?? 0,
            'base_price' => $request->base_price ?? 0,
            'extra_word_price' => $request->extra_word_price ?? 0,
            'gst_charges' => $request->gst_charges ?? 0,
            'total_price' => $request->total_price,
            'payment_id' => $request->razorpay_payment_id,
            'payment_status' => 'paid',

            'status' => 'published',
        ]);

        return back()->with('success', 'Ad submitted & payment successful!');
    }
}