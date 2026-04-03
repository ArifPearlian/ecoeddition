<header class="app-header">
      <div class="app-header-inner">
        <button class="app-toggler" type="button" aria-label="app toggler">
          <span></span>
          <span></span>
          <span></span>
        </button>
       
        <div class="app-header-end">
          
          
          
          <div class="dropdown text-end ms-sm-3 ms-2 ms-lg-4">
            <a href="#" class="d-flex align-items-center py-2" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
              <div class="text-end me-2 d-none d-lg-inline-block">
                <div class="fw-bold text-dark">ECO Edition</div>
                <small class="text-body d-block lh-sm">
                  <i class="fi fi-rr-angle-down text-3xs me-1"></i> Admin
                </small>
              </div>
              <div class="avatar avatar-sm rounded-circle avatar-status-success">
                <img src="{{ asset('admin/assets/eco-logo.png')}}" alt="">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end w-225px mt-1">
              <li class="d-flex align-items-center p-2">
                <div class="avatar avatar-sm rounded-circle">
                  <img src="{{ asset('admin/assets/eco-logo.png')}}" alt="">
                </div>
                <div class="ms-2">
                  <div class="fw-bold text-dark">ECO Edition </div>
                  <small class="text-body d-block lh-sm">info@ecoedition.com</small>
                </div>
              </li>
              
              <li>
                
              <form action="{{ url('logout')}}" method="post">
              @csrf
              <i class="fi fi-sr-exit scale-1x"></i>
              <input type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger"  value="Logout" onclick="return confirm('Do you want to logout?')">
              </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>

      <div class="modal fade" id="searchResultsModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header py-1 px-3">
            <form class="d-flex align-items-center position-relative w-100" action="#">
              <button type="button" class="btn btn-sm border-0 position-absolute start-0 p-0 text-sm ">
                <i class="fi fi-rr-search"></i>
              </button>
              <input type="text" class="form-control form-control-lg ps-4 border-0 shadow-none" id="searchInput" placeholder="Search anything's">
            </form>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pb-2" style="height: 300px;" data-simplebar>
            <div id="recentlyResults">
              <span class="text-uppercase text-2xs fw-semibold text-muted d-block mb-2">Recently Searched:</span>
              <ul class="list-inline search-list">
                <li>
                  <a class="search-item" href="index.html">
                    <i class="fi fi-rr-apps"></i> Dashboard
                  </a>
                </li>
                <li>
                  <a class="search-item" href="chat.html">
                    <i class="fi fi-rr-comment"></i> Chat
                  </a>
                </li>
                <li>
                  <a class="search-item" href="calendar.html">
                    <i class="fi fi-rr-calendar"></i> Calendar
                  </a>
                </li>
                <li>
                  <a class="search-item" href="chart/apexchart.html">
                    <i class="fi fi-rr-chart-pie-alt"></i> Apexchart
                  </a>
                </li>
                <li>
                  <a class="search-item" href="pages/pricing.html">
                    <i class="fi fi-rr-file"></i> Pricing
                  </a>
                </li>
                <li>
                  <a class="search-item" href="email/inbox.html">
                    <i class="fi fi-rr-envelope"></i> Email
                  </a>
                </li>
              </ul>
            </div>
            <div id="searchContainer"></div>
          </div>
        </div>
      </div>
    </div>