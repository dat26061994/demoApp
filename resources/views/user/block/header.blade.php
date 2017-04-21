<div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6 ">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                <li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="{{ url('/') }}"><img src="{{ url('public/images/home/logo.png') }}" alt="" /></a>
            </div>
           
          </div>
          <div class="col-sm-8">
            <div class="pull-right">
              <ul class="nav navbar-nav collapse navbar-collapse">
                 <li class="dropdown">
                  @if (Auth::check())
                 <a href="#" class=""><i class="fa fa-user"></i>  {{ Auth::user()->name }}<i class="fa fa-angle-down"></i></a>
                 <ul role="menu" class="sub-menu">
                      <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                      
                  </ul>
                  @else
                 <a href="#" class=""><i class="fa fa-user"></i>  Account<i class="fa fa-angle-down"></i></a> 
                    <ul role="menu" class="sub-menu">
                      <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                      <li><a href="{{ url('/register') }}"><i class="fa fa-lock"></i> Register</a></li>
                    </ul>
                  @endif
                  </li> 
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="{{ url('/') }}">Home</a></li>
                
              </ul>
            </div>
          </div>
          
        </div>
        </div>
      </div>