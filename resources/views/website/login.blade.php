@extends('website.layouts.app')
@section('content')

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
           <h2>Login to Publish Your Advertisement with Eco Edition</h2>
          <p>Access your account to submit your advertisement requirements and get your ad published in leading newspapers through Eco Edition.</p>
            <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">

        
           <form id="contact" action="{{url('login-submit')}}" method="post">
            @csrf

              <div class="row">

                <div class="col-lg-12">
                      @php
                        $statuses = ['success', 'error'];
                    @endphp

                    @foreach($statuses as $status)
                        @if(session($status))
                            <div class="alert alert-{{ $status == 'success' ? 'success' : 'danger' }}" style="margin-bottom:15px;">
                                {{ session($status) }}
                            </div>
                        @endif
                    @endforeach
                </div>
                  <fieldset>
                    <input type="email" name="email" id="email" placeholder="Your Email" required>
                  </fieldset>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <input type="password" name="password" id="password" placeholder="Your Password" required>
                  </fieldset>
                </div>

                <!-- Forgot Password -->
                <div class="col-lg-12 text-end" style="margin-bottom: 15px;">
                  <a href="#!" style="font-size: 14px; color: #4b8ef1; text-decoration: none;">
                    Forgot Password?
                  </a>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="main-button">Login</button>
                  </fieldset>
                </div>

                <!-- Create Account -->
                <div class="col-lg-12 text-center" style="margin-top: 20px;">
                  <p style="margin: 0; font-size: 15px;">
                    Don’t have an account? 
                    <a href="{{  url('register');}}" style="color: #4b8ef1; font-weight: 600; text-decoration: none;">
                      Create Account
                    </a>
                  </p>
                </div>

              </div>

              

            </form>
        </div>
      </div>
    </div>
  </div>

@endsection