

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="admin, dashboard">
  <meta name="author" content="DexignZone">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Dompet : Payment Admin Template">
  <meta property="og:title" content="Dompet : Payment Admin Template">
  <meta property="og:description" content="Dompet : Payment Admin Template">
  <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
  <meta name="format-detection" content="telephone=no">
  
  <!-- PAGE TITLE HERE -->
  <title>Restaurent | @yield('title')</title>
  
  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/png" href="{{asset('/admin/images/fav.png')}}">
  
  <link href="{{asset('/admin/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/admin/vendor/nouislider/nouislider.min.css')}}">
  <!-- Style css -->
    <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
  <link href="{{asset('/admin/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
         <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
         <link rel="stylesheet" href="{{ asset('admin/css/style1.css')}}">
         <link rel="stylesheet" href="{{asset('/admin/vendor/select2/css/select2.min.css')}}">
  
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
       <span style="--i:1">L</span>
       <span style="--i:2">o</span>
       <span style="--i:3">a</span>
       <span style="--i:4">d</span>
       <span style="--i:5">i</span>
       <span style="--i:6">n</span>
       <span style="--i:7">g</span>
       <span style="--i:8">.</span>
       <span style="--i:9">.</span>
       <span style="--i:10">.</span>
    </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
          
            <a href="/restaurent/dashboard" class="brand-logo">
        <center>
            <img src="{{asset('/admin/images/logo2.png')}}" alt="" style="width: 65%;">
            </center>
            </a>
          
            <div class="nav-control">
                <div class="hamburger"  style="color: white !important;">
                    <span class="line"  style="color: white !important;"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
    
    
    
    <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
              <div class="dashboard_bar">
                                @yield('head1')  
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
              <li class="nav-item">
                <div class="input-group search-area">
                  <input type="text" class="form-control" placeholder="Search here...">
                  <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                </div>
              </li>
              
              
                       <!--      <li class="nav-item">
                <a href="/grocery/dashboard" class="btn btn-primary d-sm-inline-block d-none"> <i class="fa fa-toggle-on" aria-hidden="true"></i>&nbsp   Visit Grocery Shop</a>
              </li> -->
                        </ul>
                    </div>
        </nav>
      </div>
    </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
          <li class="dropdown header-profile">

            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">

                @if(Auth::guard('shop')->user()->profile_image=='')
                <img src="{{ asset('admin/img/default.jpg')}}" width="20" alt="">
                @else
              <img src="{{ asset('uploads/shop/'.Auth::guard('shop')->user()->profile_image)}}" width="20" alt="">
              @endif
              <div class="header-info ms-3">
                <span class="font-w600 " style="color: white !important;"><b>{{Auth::guard('shop')->user()->proprietor}}</b> </span>
            
                <small class="text-end font-w400">{{Auth::guard('shop')->user()->shop_name}}</small>
                
                
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">

               
              <a href="/restaurent/edit-profile" class="dropdown-item ai-icon">
                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span class="ms-2">Edit Profile </span>
              </a>
              
              <a href="/restaurent/logout" class="dropdown-item ai-icon">
                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <span class="ms-2">Logout </span>
              </a>
            </div>
          </li>

                    <li><a href="/restaurent/dashboard" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-025-dashboard"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>



            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
              <i class="fa fa-list-alt"></i>
              <span class="nav-text">Categories</span>
            </a>
                        <ul aria-expanded="false">
                            <li><a href="/restaurent/add-category">Add new</a></li>
                            <li><a href="/restaurent/active-categories">Active</a></li>
                            <li><a href="/restaurent/blocked-categories">Blocked</a></li>
                        </ul>
                    </li>

             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
              <i class="fas fa-utensils"></i>
              <span class="nav-text">Items</span>
            </a>
                        <ul aria-expanded="false">
                            <li><a href="/restaurent/add-item">Add new</a></li>
                            <li><a href="/restaurent/active-items">Active</a></li>
                            <li><a href="/restaurent/blocked-items">Blocked</a></li>
                            <!-- <li><a href="/restaurent/category-items">Category Wise</a></li> -->
                        </ul>
                    </li>        
                   
     
                    
                    


                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
              <i class="fa fa-plus-circle"></i>
              <span class="nav-text">Add On</span>
            </a>
                        <ul aria-expanded="false">
                            <li><a href="/restaurent/banners">Banner</a></li>
                            <li><a href="/restaurent/offers">Offers</a></li>
                            <li><a href="/restaurent/gallery">Gallery</a></li>
                            <li><a href="/restaurent/videos">Videos</a></li>
                            <li><a href="/restaurent/testimonials">Testimonials</a></li>
                        </ul>
                    </li>


                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-cog"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/restaurent/change-password">Change Password</a></li>
                    <!-- <li><a href="chart-flot.html">Sleep</a></li> -->
                    <li><a href="/restaurent/logout">Logout</a></li>
                </ul>
            </li>
                    
                    
                    
                    
                   
                </ul>
        <div class="copyright">
          <p><strong>Restaurent Dashboard</strong> © 2023 All Rights Reserved</p>
          <!-- <p class="fs-12">Made with <span class="heart"></span> EREBS</p> -->
        </div>
      </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    
    




 @yield('contents')









        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
    
            <div class="copyright">
                <p>Designed And Developed By ERE Business Solutions</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    


  </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
 

  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  
    <script src="{{asset('/admin/vendor/global/global.min.js')}}"></script>
  <script src="{{asset('/admin/vendor/chart.js/Chart.bundle.min.js')}}"></script>
  <script src="{{asset('/admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
  
  <!-- Apex Chart -->
  <script src="{{asset('/admin/vendor/apexchart/apexchart.js')}}"></script>
  <script src="{{asset('/admin/vendor/nouislider/nouislider.min.js')}}"></script>
  <script src="{{asset('/admin/vendor/wnumb/wNumb.js')}}"></script>
  
  <!-- Dashboard 1 -->
  <script src="{{asset('/admin/js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{asset('/admin/js/custom.min.js')}}"></script>
  <script src="{{asset('/admin/js/dlabnav-init.js')}}"></script>
<!--   <script src="{{asset('/admin/js/demo.js')}}"></script>
    <script src="{{asset('/admin/js/styleSwitcher.js')}}"></script> -->

    <script src="{{asset('/admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin/js/plugins-init/datatables.init.js')}}"></script>

  <script src="{{asset('/admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{asset('/admin/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/admin/js/plugins-init/select2-init.js')}}"></script>
  
</body>
</html>

<script type="text/javascript">
     $('#a2').hide();
     $('#ab2').hide();
     $('#ab4').hide();
     $('#ab6').hide();
     $('#sec1').hide();
     $('#offersec').hide();
     $('#submitButton1').hide();

     $('.ckeditor').ckeditor();
</script>