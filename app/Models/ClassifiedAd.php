<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassifiedAd extends Model
{
    use HasFactory;

    protected $table = 'classified_ads';

    protected $fillable = [
        'category',
        'ad_type',
        'display_type',
        'display_price',
        'ad_size',
        'ad_size_label',
        'title',
        'ad_content',
        'contact_details',
        'article_image',
        'kyc_type',
        'kyc_number',
        'aadhaar_front',
        'aadhaar_back',
        'pan_file',
        'word_count',
        'base_price',
        'extra_words_price',
        'email_charge',
        'total_price',
        'payment_status',
        'status',
    ];
}