
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{ url('/')}}" class="logo">
              <h4>Eco<span>Eddition</span></h4>
            </a>
            <!--<a href="index.html" class="logo">
              <img src="{{ asset('/assets/').'/eco-logo.png'}}" style="width:75px;border-radius: 4px;">
            </a>-->
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="{{url('/')}}#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="{{url('/')}}#about">About Us</a></li>
              <li class="scroll-to-section"><a href="{{url('/')}}#epapper">ePaper</a></li>
              <li class="scroll-to-section"><a href="{{url('/')}}#contact">Contact Now</a></li> 

              <li class="scroll-to-section">

                <div class="main-red-button">                
                      <a href="{{ url('adpreview') }}">Publish Your Ad Now </a>                
              </div>
              <!--<div class="main-red-button">
                  @auth
                      <a href="{{ route('user.dashboard') }}">Dashboard</a>
                  @else
                      <a href="{{ url('/login') }}">Account</a>
                  @endauth
              </div>--->
          </li>             

            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->