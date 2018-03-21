<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->

    <title>Blank</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::asset('assets/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
     <link rel="stylesheet" href="{{URL::asset('assets/assets/data-tables/DT_bootstrap.css')}}" />
    <!--right slidebar-->
    <link href="{{URL::asset('assets/css/slidebars.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/style-responsive.css')}}" rel="stylesheet" />
  @stack('css')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
          <!--logo start-->
          <a href="#" class="logo" >Gulshan<span>Homz</span></a>
          <!--logo end-->

          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>

                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                          <span class="username">


                                {{ Auth::user()->name }}

                   </span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>


                          <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-key"></i> Log Out</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form></li>
                      </ul>
                  </li>

              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="{{ url('/dashboard') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   <li>
                      <a href="{{route('notifications.index')}}">
                          <i class="fa fa-bell-o"></i>
                          <span>All Notification</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{route('notifications.create')}}">
                           <i class="fa fa-tasks"></i>
                          <span>Create Notification</span>
                      </a>
                  </li>





              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
                <div class="contents"> @yield('content') </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->



      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 &copy; Webninjaz.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
      <script src="{{URL::asset('assets/js/jquery.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{URL::asset('assets/js/jquery.dcjqaccordion.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/slidebars.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/js/respond.min.js')}}" ></script>

     <script src="{{URL::asset('assets/js/bootstrap-validator.min.js')}}" type="text/javascript"></script>
 <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
  <!--Form Wizard-->

  <script src="{{URL::asset('assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/form-validation-script.js')}}" type="text/javascript"></script>

 <script src="{{URL::asset('assets/js/common-scripts.js')}}"></script>
    <!--common script for all pages-->
    <script src="{{URL::asset('assets/js/common-scripts.js')}}"></script>
 @stack('scripts')


  </body>
</html>
