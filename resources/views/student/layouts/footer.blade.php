<div class="footer">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-6">
  					<p class="mb-4"><img src="{{ asset('webassets/images/logo.png')}}" alt="Image" class="img-fluid"></p>
  					<p>Al-Azhar University is a public university in Cairo, Egypt. Associated with Al-Azhar Mosque in Islamic Cairo,</p>
  					<p><a href="#">Learn More</a></p>
  				</div>
  				<div class="col-lg-3">
  					<h3 class="footer-heading"><span>Quick Links</span></h3>
  					<ul class="list-unstyled">
					 
  						<li> @if (Auth::guard('student')->user())
                  <a href="{{ URL('/show-student/'.Auth::guard('student')->user()->id )}}" >Student Profile</a>
               @else
               <a href="{{ url('student/login') }}" >Student Profile</a>

               @endif</li>
						  <li><a href="{{url('buildings')}}">Buildings</a></li>
						  @if (Auth::guard('student')->user())
                    <li><a href="{{ url('/student/accomodate-request') }}">Accomodation Request</a></li>
                    <li><a href="{{ url('/student/leave-request') }}">Leave Request</a></li>
                    @else
              <li><a href="{{ url('student/login') }}">Accomodation Request</a></li>
				    	<li><a href="{{ url('student/login') }}">Leave Request</a></li>
			  		

               @endif
  					
  					</ul>
  				</div>
  				<div class="col-lg-3">
  					<h3 class="footer-heading"><span>Contact</span></h3>
  					<ul class="list-unstyled">
  						<li><a href="#">002 221 21 542</a></li>
  						<li><a href="#">010 123 45 977</a></li>
  						<li><a href="#">info@azhar-university.com</a></li>
  						<li><a href="http://www.azhar.edu.eg/" target="_blank">www.azhar-university-eg.com</a></li>
  					</ul>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-12">
  					<div class="copyright">
  						<p>
  							Copyright &copy;
  							<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made  <i class="icon-heart" aria-hidden="true"></i> by Azhar Team
  						</p>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
    

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>
