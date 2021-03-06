<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- site metas -->
      <title>Delivery Solution</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('frontend_asset/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('frontend_asset/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('frontend_asset/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('frontend_asset/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('frontend_asset/css/jquery.mCustomScrollbar.min.css')}}">

      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Tweaks for older IEs-->
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{asset('frontend_asset/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('frontend_asset/css/owl.theme.default.min.css')}}">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('frontend_asset/images/loading.gif')}}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="header_white_section">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="header_information">
                           <ul>
                              <li><img src="{{asset('frontend_asset/images/1.png')}}" alt="#"/> 145.street road new York</li>
                              <li><img src="{{asset('frontend_asset/images/2.png')}}" alt="#"/> +71  5678954378</li>
                              <li><img src="{{asset('frontend_asset/images/3.png')}}" alt="#"/> Demo@hmail.com</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full mt-0">
                        <div class="center-desk">
                           <div class="logo"><a href="{{route('main')}}"><img src="{{asset('frontend_asset/images/logo.png')}}" alt="#" style="width: 100px;"> <span style="font-size: 20px;color:#fff;">Delivery Solution</span></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li class="{{Request::is('main*') ? 'active' : ''}}"> <a href="{{route('main')}}">Home</a> </li>
                                 <li class="{{Request::is('order*') ? 'active' : ''}}">
                                    @if(Auth::check())
                                    @role('customer')
                                       <a href="{{route('frontend.order')}}">Order</a>
                                    @endrole   
                                    @else
                                    <div class="nav-item dropdown">
                                       <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Register</a>
                                       <div class="dropdown-menu">
                                          <a href="{{route('frontend.customerregister')}}" class="dropdown-item">Customer</a>
                                          <a href="{{route('frontend.deliverregister')}}" class="dropdown-item">Deliver</a>
                                       </div>
                                    </div>
                                    @endif
                                 </li>
                                 <li class="{{Request::is('login*') ? 'active' : ''}}">
                                 @if(Auth::check())
                                    <div class="nav-item dropdown">
                                       <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                       <div class="dropdown-menu">
                                          @if(Auth::user()->hasRole('customer'))
                                          <a href="{{route('customerhistory')}}" class="dropdown-item">Order History</a>
                                          <a href="{{route('frontend.profile')}}" class="dropdown-item">Profile</a>
                                          @else
                                          <a href="{{route('deliverhistory')}}" class="dropdown-item">Order History</a>
                                          <a href="{{route('frontend.deliverprofile')}}" class="dropdown-item">Profile</a>
                                          @endif

                                          <a href="{{route('frontend.logout')}}" class="dropdown-item">Logout</a>
                                       </div>
                                    </div>
                                 @else                                 
                                    <a href="{{route('frontend.login')}}">Login
                                    </a>                                 
                                 @endif
                                 </li>
                                 <li><a href="{{route('about')}}">About Us</a></li>
                                 <li><a href="#contact">Contact Us</a></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->
      @yield('content')
      <footer>
         <div id="contact" class="footer">
            <div class="container">
               <div class="row pdn-top-30">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                     <ul class="location_icon">
                        <li> <a href="#"><img src="{{asset('frontend_asset/icon/facebook.png')}}"></a></li>
                        <li> <a href="#"><img src="{{asset('frontend_asset/icon/Twitter.png')}}"></a></li>
                        <li> <a href="#"><img src="{{asset('frontend_asset/icon/linkedin.png')}}"></a></li>
                        <li> <a href="#"><img src="{{asset('frontend_asset/icon/instagram.png')}}"></a></li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3>CONTACT US</h3>
                        <span>123 Second Street Fifth <br>Avenue,<br>
                           Manhattan, New York<br>
                        +987 654 3210</span>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3>ADDITIONAL LINKS</h3>
                        <ul class="link">
                           <li> <a href="#">About us</a></li>
                           <li> <a href="#">Terms and conditions</a></li>
                           <li> <a href="#"> Privacy policy</a></li>
                           <li> <a href="#">News</a></li>
                           <li> <a href="#"> Contact us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3> Contact</h3>
                        <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <input class="Newsletter" placeholder="Name" type="text">
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <input class="Newsletter" placeholder="Email" type="text">
                           </div>
                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                              <textarea class="textarea" placeholder="comment" type="text">Comment</textarea>
                           </div>
                        </div>
                        <button class="Subscribe">Submit</button>
                     </div>
                  </div>
               </div>
               <div class="copyright">
                  <div class="container">
                     <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a></p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{asset('frontend_asset/js/jquery.min.js')}}"></script>
      <script src="{{asset('frontend_asset/js/popper.min.js')}}"></script>
      <script src="{{asset('frontend_asset/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('frontend_asset/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('frontend_asset/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('frontend_asset/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('frontend_asset/js/custom.js')}}"></script>
      <!-- javascript --> 
      <script src="{{asset('frontend_asset/js/owl.carousel.js')}}"></script>
      @yield('script')     
     
   </body>
</html>