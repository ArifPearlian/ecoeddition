<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassifiedAd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAdNotification;

class ClassifiedAdController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'category'        => 'required|string',
            'ad_type'         => 'required|string|in:color,bw,display',
            'display_type'    => 'nullable|string',
            'display_price'   => 'nullable|integer',
            'ad_size'         => 'nullable|string',
            'ad_size_label'   => 'nullable|string',

            'title'           => 'required|string|max:100',
            'ad_content'      => 'required|string',
            'contact_details' => 'required|string',

            'article_image'   => 'nullable|image|mimes:jpg,jpeg,png|max:5120',

            'kyc_type'        => 'required|string|in:aadhaar,pan',
            'kyc_number'      => 'required|string|max:20',

            'aadhaar_front'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'aadhaar_back'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'pan_file'        => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',

            'word_count'      => 'required|integer',
            'base_price'      => 'required|integer',
            'extra_words_price' => 'required|integer',
            'email_charge'    => 'required|integer',
            'total_price'     => 'required|integer',
        ]);

        // KYC validation
        if ($request->kyc_type === 'aadhaar') {
            $request->validate([
                'aadhaar_front' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'aadhaar_back'  => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            ]);
        }

        if ($request->kyc_type === 'pan') {
            $request->validate([
                'pan_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            ]);
        }

        $articleImage = null;

            if ($request->hasFile('article_image')) {
            $image = $request->file('article_image');
            $articleImage = time() . '_article.' . $image->getClientOriginalExtension();
            $image->move(public_path('/classified_ads'), $articleImage);
        }

         $aadhaarFront = null;

            if ($request->hasFile('aadhaar_front')) {
            $image = $request->file('aadhaar_front');
            $aadhaarFront = time() . '_aadharfront.' . $image->getClientOriginalExtension();
            $image->move(public_path('/classified_ads'), $aadhaarFront);
        }

         $aadhaarBack = null;

            if ($request->hasFile('aadhaar_back')) {
            $image = $request->file('aadhaar_back');
            $aadhaarBack = time() . '_aadharback.' . $image->getClientOriginalExtension();
            $image->move(public_path('/classified_ads'), $aadhaarBack);
        }

         $panFile = null;

            if ($request->hasFile('pan_file')) {
            $image = $request->file('pan_file');
            $panFile = time() . '_panfile.' . $image->getClientOriginalExtension();
            $image->move(public_path('/classified_ads'), $panFile);
        }
      

   
        $ad = ClassifiedAd::create([
            'category'          => $request->category,
            'ad_type'           => $request->ad_type,
            'display_type'      => $request->display_type,
            'display_price'     => $request->display_price,
            'ad_size'           => $request->ad_size,
            'ad_size_label'     => $request->ad_size_label,
            'title'             => $request->title,
            'ad_content'        => $request->ad_content,
            'contact_details'   => $request->contact_details,
            'article_image'     => $articleImage,
            'kyc_type'          => $request->kyc_type,
            'kyc_number'        => $request->kyc_number,
            'aadhaar_front'     => $aadhaarFront,
            'aadhaar_back'      => $aadhaarBack,
            'pan_file'          => $panFile,
            'word_count'        => $request->word_count,
            'base_price'        => $request->base_price,
            'extra_words_price' => $request->extra_words_price,
            'email_charge'      => $request->email_charge,
            'total_price'       => $request->total_price,
            'payment_status'    => 'pending',
            'status'            => 'submitted',
        ]);

        Mail::to('arif@pearlorganisation.com')->send(new NewAdNotification($ad));

        // Future: yahan payment page redirect kar sakte ho
        return redirect()->back()->with('success', 'Ad submitted successfully! ID: ' . $ad->id);
   


    }
}