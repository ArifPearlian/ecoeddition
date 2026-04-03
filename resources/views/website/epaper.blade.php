@extends('website.layouts.app')
@section('content')


<div id="epapper" class="our-portfolio section">
  <div class="container">
    
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <h2>Read Our <em>Weekly E-Paper</em> &amp; Latest <span>Editions</span></h2>
        </div>
      </div>
    </div>

    <div class="row">

      <!-- Item 1 -->
      
          
      @foreach($epapers as $paper)
          <div class="col-lg-3 col-sm-6" style="margin-bottom: 120px;">
            <a href="{{ asset('uploads/epapers/'.$paper->file) }}" target="_blank">          
              <div class="item">
                <div class="hidden-content">
                  <h4>{{ $paper->title }}</h4>
                  <p><i class="fa fa-file-pdf-o"></i> View or Download E-Paper</p>
                </div>

                <div class="showed-content text-center" style="padding:20px;">
                  <i class="fa fa-file-pdf-o" style="font-size:70px; color:#e74c3c;"></i>
                </div>
              </div>
            </a>
          </div>

                    
      @endforeach
      <!-- Item 2 --> 
 
    </div>
    <br>
   
  </div>
</div>

  


@endsection