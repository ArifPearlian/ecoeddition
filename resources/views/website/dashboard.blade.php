@extends('website.layouts.app')
@section('content')

  <div id="dashboard" class="contact-us section">
  <div class="container">
    <div class="row">

      <!-- Left Side Dashboard Intro -->
      <div class="col-lg-4 align-self-start wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <div class="section-heading">
          <h2>Welcome to Your Eco Edition Dashboard</h2>
          <p>
            Manage your profile, track advertisement orders, and access your account settings from one place.
          </p>

          <div class="phone-info" style="margin-top: 25px;">
            <h4>
              Need Help? 
              <span>
                <i class="fa fa-phone"></i> 
                <a href="#">010-020-0340</a>
              </span>
            </h4>
          </div>
        </div>
      </div>

      <!-- Right Side Dashboard Box -->
      <div class="col-lg-8 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">

        <div id="contact">

          <div class="row">

            <!-- Session Messages -->
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

            <!-- User Info Box -->
            <div class="col-lg-12">
              <div style="background: #f7f7f7; padding: 20px; border-radius: 10px; margin-bottom: 25px;">
                <h4 style="margin-bottom: 10px;">Hello, {{ auth()->user()->name ?? 'User' }}</h4>
                <p style="margin: 0; color: #666;">
                  Welcome back! From here you can manage your account and advertisement activities.
                </p>
              </div>
            </div>

            <!-- Dashboard Menu Cards -->
             <div class="col-md-3 col-sm-6 mb-3">
              <div style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 15px; text-align: center; box-shadow: 0 0 15px rgba(0,0,0,0.05);">
                <div style="font-size: 32px; color: #4b8ef1; margin-bottom: 15px;">
                  <i class="fa fa-plus-circle"></i>
                </div>
                <h5 style="margin-bottom: 10px;">Publish Your Ad</h5>
                <p style="font-size: 14px; color: #777;">Create and share your advertise.</p>
                <a href="{{ url('adpreview') }}" class="main-button" style="display:inline-block; margin-top:10px;">Create</a>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
              <div style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 15px; text-align: center; box-shadow: 0 0 15px rgba(0,0,0,0.05);">
                <div style="font-size: 32px; color: #4b8ef1; margin-bottom: 15px;">
                  <i class="fa fa-user"></i>
                </div>
                <h5 style="margin-bottom: 10px;">Profile</h5>
                <p style="font-size: 14px; color: #777;">View and update your account details.</p>
                <a href="{{ url('user/profile') }}" class="main-button" style="display:inline-block; margin-top:10px;">Open</a>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
              <div style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 15px; text-align: center; box-shadow: 0 0 15px rgba(0,0,0,0.05);">
                <div style="font-size: 32px; color: #4b8ef1; margin-bottom: 15px;">
                  <i class="fa fa-list"></i>
                </div>
                <h5 style="margin-bottom: 10px;">Orders</h5>
                <p style="font-size: 14px; color: #777;">Track your advertisement orders.</p>
                <a href="{{ route('user.orders') }}" class="main-button" style="display:inline-block; margin-top:10px;">View Orders</a>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
              <div style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 15px; text-align: center; box-shadow: 0 0 15px rgba(0,0,0,0.05);">
                <div style="font-size: 32px; color: #ff4d4d; margin-bottom: 15px;">
                  <i class="fa fa-sign-out"></i>
                </div>
                <h5 style="margin-bottom: 10px;">Logout</h5>
                <p style="font-size: 14px; color: #777;">Securely sign out from your account.</p>

                <form action="{{ route('user.logout') }}" method="POST" style="margin-top: 10px;">
                  @csrf
                  <button type="submit" class="main-button" style="background:#ff4d4d; border:none;">Logout</button>
                </form>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection