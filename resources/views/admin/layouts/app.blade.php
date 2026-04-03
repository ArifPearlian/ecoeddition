<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from gxon.layoutdrop.com/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Mar 2026 06:42:56 GMT -->
<head>

  <!-- begin::GXON Meta Basic -->
  <meta charset="utf-8">
   <meta name="format-detection" content="telephone=no">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <!-- end::GXON Meta Basic -->


  <!-- begin::GXON Website Page Title -->
  <title>Admin Panel</title>
  <!-- end::GXON Website Page Title -->

  @include('admin.partial.css')
  @stack('css')


</head>

<body>
  @php
$arr=['success','error'];
@endphp
@foreach($arr as $val)
  @if(session($val))
  <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
  <div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        {{ session($val) }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

<script>
  var toastEl = document.getElementById('liveToast');
  var toast = new bootstrap.Toast(toastEl);
  toast.show();
</script>
  @endif
@endforeach

@if(session('success'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
  <div class="page-layout">

    <!-- begin::GXON Page Header -->
    @include('admin.partial.header')
    <!-- end::GXON Page Header -->  

    <!-- begin::GXON Sidebar Menu -->
    @include('admin.partial.sidebar')
    <!-- end::GXON Sidebar Menu -->

    <!-- begin::GXON Sidebar right -->
    @include('admin.partial.rightsidebar')
    <!-- end::GXON Sidebar right -->

    <main class="app-wrapper">
    @yield('content')
    </main>

    <!-- begin::GXON Footer -->
    @include('admin.partial.footer')
    <!-- end::GXON Footer -->

  </div>

  <!-- begin::GXON Page Scripts -->
  @include('admin.partial.js')
  <!-- end::GXON Page Scripts -->
</body>

</html>