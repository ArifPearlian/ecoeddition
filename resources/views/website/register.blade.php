@extends('website.layouts.app')
@section('content')

<div id="contact" class="contact-us section">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <div class="section-heading">
          <h2>Create Your Eco Edition Account</h2>
          <p>Register now to submit your advertisement requirements and publish your ads in leading newspapers easily through Eco Edition.</p>
          <div class="phone-info">
            <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
          </div>
        </div>
      </div>

      <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">

        <form id="contact" action="{{ route('register.submit') }}" method="post">
    @csrf

    <div class="row">

        <div class="col-lg-12">
            <fieldset>
                <input type="text" name="name" id="name" placeholder="Full Name" value="{{ old('name') }}" required>
                @error('name')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </fieldset>
        </div>

        <div class="col-lg-12">
            <fieldset>
                <input type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required>
                @error('email')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </fieldset>
        </div>

        <div class="col-lg-12">
            <fieldset>
                <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" value="{{ old('mobile') }}" pattern="[0-9]{10}" maxlength="10" required>
                @error('mobile')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </fieldset>
        </div>

        <div class="col-lg-12">
            <fieldset>
                <input type="password" name="password" id="password" placeholder="Create Password" required>
                @error('password')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </fieldset>
        </div>

        <div class="col-lg-12">
            <fieldset>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
            </fieldset>
        </div>

        <div class="col-lg-12">
            <fieldset>
                <button type="submit" id="form-submit" class="main-button">Create Account</button>
            </fieldset>
        </div>

        <div class="col-lg-12 text-center" style="margin-top: 20px;">
            <p style="margin: 0; font-size: 15px;">
                Already have an account?
                <a href="{{ url('/login') }}" style="color: #4b8ef1; font-weight: 600; text-decoration: none;">
                    Login Here
                </a>
            </p>
        </div>

    </div>

    <div class="contact-dec">
        <img src="{{ asset('assets/images/contact-decoration.png') }}" alt="">
    </div>
</form>



      </div>
    </div>
  </div>
</div>

@endsection