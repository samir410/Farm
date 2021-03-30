
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <title>@yield('title')</title>
          <!-- plugins:css -->
          <link rel="stylesheet" href="{{asset('Admin/css/themify-icons.css')}}">
          <link rel="stylesheet" href="{{asset('Admin/css/vendor.bundle.base.css')}}">
          <link rel="stylesheet" href="{{asset('Admin/css/vendor.bundle.addons.css')}}">
          <!-- endinject -->
          <!-- plugin css for this page -->
          <!-- End plugin css for this page -->
          <!-- inject:css -->
          <link rel="stylesheet" href="{{asset('Admin/css/style.css')}}">
          <!-- endinject -->
          <link rel="shortcut icon" href="{{asset('Admin/images/logo_2H_tech.png')}}" />
        </head>
        <body>
          <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            {{-- <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
              <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/2h_.png" class="mr-2" alt="logo"/></a>
              </div>
              <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                  <span class="ti-layout-grid2"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                  <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                    </div>
                  </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item nav-profile dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                      <img src="images/logo_2H_tech.png" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                      </a>
                    </div>
                  </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                  <span class="ti-layout-grid2"></span>
                </button>
              </div>
            </nav> --}}
            @include('adminsidebar.nav1')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
              <!-- partial:partials/_sidebar.html -->
              @include('adminsidebar.nav2')
              <!-- partial -->
      <div class="main-panel">
          <div class="content-wrapper">

                  {{-- start content --}}
                  @yield('content')
                   {{-- End content --}}
          </div>
        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->
        {{-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer> --}}
        @include('include.adminfooter')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('Admin/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('Admin/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('Admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('Admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('Admin/js/template.js')}}"></script>
  <script src="{{asset('Admin/js/settings.js')}}"></script>
  <script src="{{asset('Admin/js/todolist.js')}}"></script>
  <script src="{{asset('Admin/js/bootbox.min.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
 @yield('scripts')
 
<script>
  $(document).on("click", "#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
    if (confirmed){
        window.location.href = link;
      };
    });
  });
</script>
  <!-- End custom js for this page-->
</body>

</html>

