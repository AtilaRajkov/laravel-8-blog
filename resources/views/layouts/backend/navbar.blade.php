<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>M</b>B</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>MY</b>BLOG</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a> -->

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{auth()->user()->gravatar()}}"
                 class="user-image"
                 alt="{{auth()->user()->name}} Image">
            <span class="hidden-xs">
              {{auth()->user()->name}}
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{auth()->user()->gravatar()}}"
                   class="img-circle"
                   alt="{{auth()->user()->name}} Image">

              <p>
                {{auth()->user()->name}} - Web Developer
{{--                <small>Member since Nov. 2012</small>--}}
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">
                  Profile
                </a>
              </div>
              <div class="pull-right">
{{--                <a href="" class="btn btn-default btn-flat">Sign out</a>--}}
                <a class="btn btn-default btn-flat"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>