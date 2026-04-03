<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassifiedAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
 public function up(): void
    {
        Schema::create('classified_ads', function (Blueprint $table) {
            $table->id();

            $table->string('category');
            $table->string('ad_type'); // color, bw, display
            $table->string('display_type')->nullable(); // normal, highlight, box, color
            $table->integer('display_price')->nullable();

            $table->string('ad_size')->nullable(); // size key from RATE_CARD
            $table->string('ad_size_label')->nullable(); // readable label

            $table->string('title', 100);
            $table->text('ad_content');
            $table->text('contact_details');

            $table->string('article_image')->nullable();

            $table->string('kyc_type'); // aadhaar / pan
            $table->string('kyc_number');

            $table->string('aadhaar_front')->nullable();
            $table->string('aadhaar_back')->nullable();
            $table->string('pan_file')->nullable();

            $table->integer('word_count')->default(0);
            $table->integer('base_price')->default(0);
            $table->integer('extra_words_price')->default(0);
            $table->integer('email_charge')->default(0);
            $table->integer('total_price')->default(0);

            $table->string('payment_status')->default('pending'); // pending, paid, failed
            $table->string('status')->default('draft'); // draft, submitted, approved, rejected

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classified_ads');
    }
    
}
