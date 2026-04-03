@extends('website.layouts.app')
@section('content')

 <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Welcome to ECO Eddition</h6>
                <!--<h2>Elevate your business with  <em>Eco Eddition </em>  <span>Weekly Classified Newspaper in Tricity</span></h2>-->
                <h2>Elevate your business with <em>Eco Eddition</em> &amp; <span>Weekly Classified Newspaper</span> in Tricity</h2>
                <p>India’s Premium Platform for Classified, Display & Business Advertising
                  <br>             
           
               <div class="main-blue-button">
                  <a href="{{ url('adpreview')}}">Publish Your Ad Now <i class="fa fa-arrow-right"></i></a>
                </div>
                
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/ad.jpg" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 <div id="about" class="about-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <img src="assets/images/about-left-image.png" alt="person graphic">
        </div>
      </div>
      <div class="col-lg-8 align-self-center">
        <div class="services">
          <div class="row">

            <div class="col-lg-6">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="icon">
                  <img src="assets/images/service-icon-01.png" alt="classified ads">
                </div>
                <div class="right-text">
                  <h4>Classified Advertising</h4>
                  <p>Promote your products, services, and opportunities with our highly effective classified ads reaching thousands across Tricity.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                <div class="icon">
                  <img src="assets/images/service-icon-02.png" alt="display ads">
                </div>
                <div class="right-text">
                  <h4>Display Advertising</h4>
                  <p>Boost your brand visibility with creative display ads designed to attract attention and create a strong impact.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                <div class="icon">
                  <img src="assets/images/service-icon-03.png" alt="business promotion">
                </div>
                <div class="right-text">
                  <h4>Business Promotion</h4>
                  <p>Expand your reach and connect with the right audience through our trusted advertising platform.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                <div class="icon">
                  <img src="assets/images/service-icon-04.png" alt="local reach">
                </div>
                <div class="right-text">
                  <h4>Local Market Reach</h4>
                  <p>Leverage our strong presence in Tricity to increase brand awareness and grow your business faster.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
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
      
           @php $count = 0; @endphp
      @foreach($epapers as $paper)
          <div class="col-lg-3 col-sm-6">
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
          @php $count++; @endphp
          @if($count == 4)
              @break
          @endif
      @endforeach
      <!-- Item 2 --> 
 
    </div>
    <br>
    <div class="row form-group">
       <div class="col-md-12 text-center">
        <div class="main-blue-button">
        <a href="{{ url('epaper')}}">View More <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>
      </div>
  </div>
</div>

  

  <div id="contact" class="contact-us section">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <div class="section-heading">
          <h2>Advertise Your Business with Eco Edition</h2>
          <p>Looking to promote your business in Tricity? Get in touch with us for classified ads, display advertising, and business promotions in our weekly newspaper.</p>
          
          <div class="phone-info">
            <h4>For any enquiry, Call Us: 
              <span>
                <i class="fa fa-phone"></i> 
                <a href="tel:+919876543210">+91 98765 43210</a>
              </span>
            </h4>
          </div>

        </div>
      </div>

      <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" action="{{ route('contact.submit') }}" method="post">
          @csrf
          <div class="row">

            <div class="col-lg-6">
              <fieldset>
                <input type="text" name="name" id="name" placeholder="Your Name" required>
              </fieldset>
            </div>

            <div class="col-lg-6">
              <fieldset>
                <input type="text" name="business" id="business" placeholder="Business Name" required>
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <input type="email" name="email" id="email" placeholder="Your Email Address" required>
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <input type="tel" name="phone" id="phone" placeholder="Your Phone Number" required>
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <textarea name="message" class="form-control" id="message" placeholder="Tell us about your advertising requirement (Classified / Display / Promotion)" required></textarea>  
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <button type="submit" id="form-submit" class="main-button">Submit Enquiry</button>
              </fieldset>
            </div>

          </div>

          <div class="contact-dec">
            <img src="assets/images/contact-decoration.png" alt="contact decoration">
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection