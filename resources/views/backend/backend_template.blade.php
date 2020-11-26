<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Delivery Solution</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend_asset/images/logo_icon.png')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend_asset/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('my_asset/css/jquery.toast.css')}}">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{route('backend')}}">Delivery Solution</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><h5 class="app-nav__item">{{-- <i class="fa fa-user fa-lg"></i> --}}
          @if(Auth::check()){{ Auth::user()->name }} @endif
        </h5>          
        </li>
        {{-- <li>
          <i class="fa fa-sign-out fa-lg"></i>
          <a class="app-nav__item" href="{{route('admin.logout')}}"><h5> Logout</h5></a>
        </li> --}}
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <li class="treeview">
          <a class="app-menu__item {{Request::is('customer*') ? 'active' : ''}}" href="{{route('customer.index')}}">
            <i class="app-menu__icon fa fa-user"></i>
            <span class="app-menu__label">Customer</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item {{Request::is('deliver*') ? 'active' : ''}}" href="{{route('deliver.index')}}">
            <i class="app-menu__icon fa fa-bicycle"></i>
            <span class="app-menu__label">Deliver</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item {{Request::is('order*') ? 'active' : ''}}" href="{{route('order.index')}}">
            <i class="app-menu__icon fa fa-th-list"></i>
            <span class="app-menu__label">Order</span>
          </a>
        </li>       
        <li class="treeview">
          <a class="app-menu__item {{Request::is('township*') ? 'active' : ''}}" href="{{route('township.index')}}">
            <i class="app-menu__icon fa fa-map-marker"></i>
            <span class="app-menu__label">Township</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item {{Request::is('blacklist*') ? 'active' : ''}}" href="{{route('blacklist')}}">          
            <i class="app-menu__icon fa fa-ban"></i>
            <span class="app-menu__label">Black List</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item {{Request::is('logout*') ? 'active' : ''}}" href="{{route('admin.logout')}}">          
            <i class="app-menu__icon fa fa-sign-out"></i>
            <span class="app-menu__label">Logout</span>
          </a>
        </li>
      </ul>
    </aside>

@yield('content')
<!-- Essential javascripts for application to work-->
<script src="{{asset('backend_asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('backend_asset/js/popper.min.js')}}"></script>
<script src="{{asset('backend_asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend_asset/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('backend_asset/js/plugins/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('my_asset/js/jquery.toast.js')}}"></script>
<!-- Page specific javascripts-->
@yield('script')
<!-- Google analytics script-->
<script type="text/javascript">
  if(document.location.hostname == 'pratikborsadiya.in') {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-72504830-1', 'auto');
    ga('send', 'pageview');
}
</script>
</body>
</html>