<!DOCTYPE html>
<html lang="en">
<head>
 
 
  <title>Admin | ECO Edition</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{asset('admin/assets/eco-logo.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="../../..//assets/images/apple-touch-icon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('admin/assets/libs/flaticon/css/all/all.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/libs/lucide/lucide.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/libs/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/libs/simplebar/simplebar.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/libs/node-waves/waves.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/libs/bootstrap-select/css/bootstrap-select.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/css/styles.css')}}">
</head>
<body>
  <div class="page-layout">
    <div class="auth-wrapper min-vh-100 px-2" style="background-image: url(http://localhost/portfolio/public/admin/assets/images/auth/auth.webp); background-size: cover; background-position: center; background-repeat: no-repeat;">
      <div class="row g-0 min-vh-100">
        <div class="col-xl-5 col-lg-6 ms-auto px-sm-4 align-self-center py-4">
          <div class="card card-body p-4 p-sm-5 maxw-450px m-auto rounded-4 auth-card" data-simplebar>
            <div class="text-center mb-4">
              <h5 class="mb-1">Welcome to ECO Edition</h5>
              <p>Sign in to access your secure admin dashboard.</p>
            </div>
                @foreach (['success', 'error', 'warning', 'info'] as $msg)
                  @if(session($msg))
                    <div class="alert alert-{{ $msg }}">
                      {{ session($msg) }}
                    </div>
                  @endif
                @endforeach
            <form action="{{ url('/admin/login')}}" method="post">
              @csrf
              <div class="mb-4">
                <label class="form-label" for="loginEmail">Email Address</label>
                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="info@example.com">
              </div>
              <div class="mb-4">
                <label class="form-label" for="loginPassword">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="********">
              </div>
             
              <div class="mb-3">
                <button type="submit" value="Submit" class="btn btn-primary waves-effect waves-light w-100">Login</button>
              </div>             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('admin/assets/libs/global/global.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/appSettings.js')}}"></script>
  <script src="{{asset('admin/assets/js/main.js')}}"></script>

</body>
</html>