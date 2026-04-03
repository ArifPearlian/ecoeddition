<aside class="app-menubar" id="appMenubar">
      <div class="app-navbar-brand">
        <a class="navbar-brand-logo" href="{{ url('/')}}">
          <img src="{{ asset('admin/assets/eco-logo.png')}}" alt="ECO Admin Dashboard Logo" style="width:50px;">
        </a>
       
        
      </div>
      <nav class="app-navbar" data-simplebar>
        <ul class="menubar">
          <li class="menu-item menu-arrow">
            <a class="menu-link" href="javascript:void(0);" role="button">
              <i class="fi fi-rr-apps"></i>
              <span class="menu-label">Dashboard</span>
            </a>
            <ul class="menu-inner">
              <li class="menu-item">
                <a class="menu-link" href="{{ url('admin/dashboard')}}">
                  <span class="menu-label">Dashboard</span>
                </a>
              </li>
              
            </ul>
          </li>
           <li class="menu-item">
            <a class="menu-link" href="{{ url('/admin/epaper')}}">
              <i class="fi fi-rr-comment"></i>
              <span class="menu-label">Epapper</span>
            </a>
          </li>
          <li class="menu-item">
            <a class="menu-link" href="{{ url('/admin/adlist')}}">
              <i class="fi fi-rr-comment"></i>
              <span class="menu-label">View Ad List</span>
            </a>
          </li>

           <li class="menu-item">
            <a class="menu-link" href="{{ url('/admin/contact-requests')}}">
              <i class="fi fi-rr-comment"></i>
              <span class="menu-label">Contact Enquiry</span>
            </a>
          </li>        
        
          
        
         
        </ul>
      </nav>
      <div class="app-footer" style="bottom: 20px !important;">
         <form action="{{ url('logout')}}" method="post">
              @csrf
              <i class="fi fi-sr-exit scale-1x"></i>
              <input type="submit" class="btn btn-outline-light waves-effect btn-shadow btn-app-nav w-100"  value="Logout" onclick="return confirm('Do you want to logout?')">
              </form>
      </div>
      <br><br>
    </aside>