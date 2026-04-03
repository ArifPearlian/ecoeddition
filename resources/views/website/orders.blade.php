@extends('website.layouts.app')
@section('content')

<div id="dashboard" class="contact-us section">
  <div class="container">
    <div class="row">

      <!-- Left Side Intro -->
      <div class="col-lg-4 align-self-start wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <div class="section-heading">
          <h2>Your Advertisement Orders</h2>
          <p>
            Here you can view all your submitted classified advertisement orders, check pricing, and track approval status.
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

          <div style="margin-top:20px;">
            <a href="{{ url('/dashboard') }}" class="main-button">Back to Dashboard</a>
          </div>
        </div>
      </div>

      <!-- Right Side Orders List -->
     
      <div class="col-lg-8 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
  <div id="contact">

    <!-- Session Messages -->
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
    </div>

    <!-- User Info -->
    <div style="background: #f7f7f7; padding: 15px 18px; border-radius: 10px; margin-bottom: 20px;">
      <h5 style="margin-bottom: 6px;">Hello, {{ auth()->user()->name ?? 'User' }}</h5>
      <p style="margin: 0; color: #666; font-size:14px;">
        Total Orders: <strong>{{ $orders->total() }}</strong>
      </p>
    </div>

    @if($orders->count() > 0)

      <div class="accordion" id="ordersAccordion">

        @foreach($orders as $order)

          @php
            $status = strtolower($order->status ?? 'pending');
            $bg = '#facc15';
            $color = '#222';

            if ($status == 'approved') {
                $bg = '#22c55e';
                $color = '#fff';
            } elseif ($status == 'rejected') {
                $bg = '#ef4444';
                $color = '#fff';
            } elseif ($status == 'completed') {
                $bg = '#3b82f6';
                $color = '#fff';
            } elseif ($status == 'pending') {
                $bg = '#f59e0b';
                $color = '#fff';
            }
          @endphp

          <div class="accordion-item" style="border:1px solid #eee; border-radius:12px; margin-bottom:15px; overflow:hidden; box-shadow:0 0 12px rgba(0,0,0,0.04);">
            
            <!-- Accordion Header -->
            <h2 class="accordion-header" id="heading{{ $order->id }}">
              <button class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse{{ $order->id }}"
                      aria-expanded="false"
                      aria-controls="collapse{{ $order->id }}"
                      style="background:#fff; box-shadow:none; padding:14px 16px;">

                <div style="width:100%;">
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    
                    <div style="flex:1; min-width:220px; padding-right:10px;">
                      <h6 style="margin:0; font-weight:700; color:#222; font-size:16px;">
                        {{ $order->title }}
                      </h6>
                      <small style="color:#777;">
                        Order #{{ $order->id }} | 
                        {{ $order->created_at ? $order->created_at->format('d M Y') : '-' }}
                      </small>
                    </div>

                    <div class="d-flex align-items-center flex-wrap" style="gap:10px; margin-top:8px;">
                      <span style="font-size:14px; font-weight:700; color:#4b8ef1;">
                        ₹{{ number_format($order->total_price ?? 0) }}
                      </span>

                      <span style="display:inline-block; padding:5px 12px; border-radius:30px; background:{{ $bg }}; color:{{ $color }}; font-size:12px; font-weight:600; text-transform:capitalize;">
                        {{ $order->status ?? 'Pending' }}
                      </span>
                    </div>

                  </div>
                </div>
              </button>
            </h2>

            <!-- Accordion Body -->
            <div id="collapse{{ $order->id }}"
                 class="accordion-collapse collapse"
                 aria-labelledby="heading{{ $order->id }}"
                 data-bs-parent="#ordersAccordion">

              <div class="accordion-body" style="padding:18px; background:#fcfcfc;">

                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-sm-6 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">Category</p>
                        <p style="margin:0; font-weight:600; font-size:14px;">
                          {{ ucfirst(str_replace('-', ' ', $order->category)) }}
                        </p>
                      </div>

                      <div class="col-sm-6 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">Ad Type</p>
                        <p style="margin:0; font-weight:600; font-size:14px;">
                          {{ strtoupper($order->ad_type) }}
                        </p>
                      </div>

                      <div class="col-sm-6 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">Ad Size</p>
                        <p style="margin:0; font-weight:600; font-size:14px;">
                          {{ $order->ad_size }}
                        </p>
                      </div>

                      <div class="col-sm-6 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">Word Count</p>
                        <p style="margin:0; font-weight:600; font-size:14px;">
                          {{ $order->word_count ?? 0 }} words
                        </p>
                      </div>

                      <div class="col-sm-6 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">Base Price</p>
                        <p style="margin:0; font-weight:600; font-size:14px;">
                          ₹{{ number_format($order->base_price ?? 0) }}
                        </p>
                      </div>

                      <div class="col-sm-6 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">Extra Word Price</p>
                        <p style="margin:0; font-weight:600; font-size:14px;">
                          ₹{{ number_format($order->extra_word_price ?? 0) }}
                        </p>
                      </div>

                      <div class="col-sm-6 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">GST Charges</p>
                        <p style="margin:0; font-weight:600; font-size:14px;">
                          ₹{{ number_format($order->gst_charges ?? 0) }}
                        </p>
                      </div>

                      <div class="col-sm-6 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">Total Price</p>
                        <p style="margin:0; font-weight:700; color:#4b8ef1; font-size:14px;">
                          ₹{{ number_format($order->total_price ?? 0) }}
                        </p>
                      </div>

                      <div class="col-sm-12 mb-2">
                        <p style="margin:0; font-size:12px; color:#888;">Contact Details</p>
                        <p style="margin:0; font-weight:600; font-size:14px;">
                          {{ $order->contact_details }}
                        </p>
                      </div>
                    </div>
                  </div>

                  <!-- Image -->
                  <div class="col-md-4 mt-3 mt-md-0">
                    @if(!empty($order->image))
                      <div style="text-align:center;">
                        <img src="{{ asset('/classified_ads/' . $order->image) }}"
                             alt="Ad Image"
                             style="width:100%; max-width:180px; max-height:140px; border-radius:10px; border:1px solid #eee; object-fit:cover;">
                      </div>
                    @else
                      <div style="height:120px; display:flex; align-items:center; justify-content:center; background:#f8fafc; border:1px dashed #ddd; border-radius:10px; color:#999; font-size:13px;">
                        No Image
                      </div>
                    @endif
                  </div>
                </div>

                <!-- Ad Content -->
                <div style="margin-top: 12px; background:#fff; border:1px solid #f1f1f1; border-radius:10px; padding:12px;">
                  <p style="margin:0 0 6px 0; font-size:12px; color:#888;">Ad Content</p>
                  <p style="margin:0; color:#333; line-height:1.6; font-size:14px;">
                    {{ $order->ad_content }}
                  </p>
                </div>

              </div>
            </div>
          </div>

        @endforeach

      </div>

      <!-- Pagination -->
      <div style="margin-top:20px;">
        {{ $orders->links() }}
      </div>

    @else
      <div style="background: #fff; border: 1px solid #eee; border-radius: 14px; padding: 30px; text-align: center; box-shadow: 0 0 15px rgba(0,0,0,0.05);">
        <div style="font-size: 36px; color: #ccc; margin-bottom: 12px;">
          <i class="fa fa-folder-open"></i>
        </div>
        <h5 style="margin-bottom: 8px;">No Orders Found</h5>
        <p style="color: #777; margin-bottom: 18px; font-size:14px;">
          You have not submitted any classified advertisement orders yet.
        </p>
        <a href="{{ url('/adpreview') }}" class="main-button">Create New Ad</a>
      </div>
    @endif

  </div>
</div>



    </div>
  </div>
</div>

@endsection