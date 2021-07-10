<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a>
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@azhar-university.com</a>
          </div>
          <div class="col-lg-3 text-right">
              @if (Auth::guard('student')->user())

              <a href="{{ URL('/show-student/'.Auth::guard('student')->user()->id )}}" class="small mr-3"><span class="icon-unlock-alt"></span>Welcome, {{Auth::guard('student')->user()->name}} </a>
              <a href="{{ route('student-logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="small btn btn-primary px-4 py-2 rounded-0">Logout </a>
 <form id="logout-form" action="{{ route('student-logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              @else
              <a href="{{ url('student/login') }}" class="small mr-3"><span class="icon-unlock-alt"></span>Log In   </a>
              <a href="{{ url('student/register') }}" class="small btn btn-primary px-4 py-2 rounded-0"> <span class="icon-users"></span>  Register </a>

                @endif


          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="{{url('/')}}" class="d-block">
				<img src="{{ asset('webassets/images/logo.jpg')}}" alt="Image" class="img-fluid main-logo"><span style="font-size: 25px;">Madentak</span> 
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="{{url('/')}}" class="nav-link text-left">Home</a>
                </li>
                <li>
                  <a href="{{url('buildings')}}" class="nav-link text-left">Buildings</a>
                </li>
                <li class="has-children">
                  <a href="#" class="nav-link text-left">Requests</a>
                  <ul class="dropdown">
                  @if (Auth::guard('student')->user())
                    <li><a href="{{ url('/student/accomodate-request') }}">Accomodation Request</a></li>
                    <li><a href="{{ url('/student/leave-request') }}">Leave Request</a></li>
                    @else
              <li><a href="{{ url('student/login') }}">Accomodation Request</a></li>
				    	<li><a href="{{ url('student/login') }}">Leave Request</a></li>
			  		

               @endif
                  </ul>
                </li>
			  	<li class="has-children">
			  		<a href="#" class="nav-link text-left">Reports</a>
			  		<ul class="dropdown">
            @if (Auth::guard('student')->user())
					<li><a href="{{ url('/student/all-accomodations') }}">All Accomodation Requests</a></li>
					<li><a href="{{ url('/student/all-leaves') }}">All Leave Requests</a></li>
			  			
              @else
              <li><a href="{{ url('student/login') }}">All Accomodation Requests</a></li>
				    	<li><a href="{{ url('student/login') }}">All Leave Requests</a></li>
			  		

               @endif
			  		</ul>
			  	</li>
                <li>
                @if (Auth::guard('student')->user())
                  <a href="{{ URL('/show-student/'.Auth::guard('student')->user()->id )}}" class="nav-link text-left">Student Profile</a>
               @else
               <a href="{{ url('student/login') }}" class="nav-link text-left">Student Profile</a>

               @endif
                </li>
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

          </div>
          <div class="ml-auto">
            <div class="social-wrap">
              <a href="https://www.facebook.com/AlAzharUniversity/" target="_blank" ><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>

        </div>
      </div>

    </header>
 