@extends('student.layouts.main')
@section('content')
<div class="hero-slide owl-carousel site-blocks-cover">
      <div class="intro-section" style="background-image: url('{{ asset('webassets/images/hero_1.jpg')}}');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
              <h1>Alazhar University</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="intro-section" style="background-image: url('{{ asset('webassets/images/hero_2.jpg')}}');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
              <h1>Alazhar University</h1>
            </div>
          </div>
        </div>
      </div>

    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Why Academics Works</span>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">

            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-mortarboard text-white"></span>
              </div>
              <div class="feature-1-content">
                <h2>Request Accomodation</h2>
                <p>Now, You can request to have your accomodation in Azhar Madentak online</p>
                <!-- <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-school-material text-white"></span>
              </div>
              <div class="feature-1-content">
                <h2>Accomodation Status </h2>
                <p>You can check always about your accomodation status if it is approved or cancelled</p>
                <!-- <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p> -->
              </div>
            </div> 
          </div>
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-library text-white"></span>
              </div>
              <div class="feature-1-content">
                <h2>Buildings and Room</h2>
                <p>Madentak rooms are available to be cheked and you can reserve your room online</p>
                <!-- <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p> -->
              </div>
            </div> 
          </div>
		  <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
				<div class="feature-1 border">
					<div class="icon-wrapper bg-primary">
						<span class="flaticon-library text-white"></span>
					</div>
					<div class="feature-1-content">
						<h2>Leaves Requests</h2>
						<p>You can online request your leaves and get its status with Madentak App</p>
						<!-- <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p> -->
					</div>
				</div>
			</div>
        </div>
      </div>
    </div>


    <div class="section-bg style-1" style="background-image: url('{{ asset('webassets/images/about_1.jpg')}}');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="section-title-underline style-2">
              <span>About Our University</span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p class="lead text-white">Al-Azhar Al-Sharif was founded in Cairo, Egypt in 970 AD and despite not gaining university status until 1961, it is still technically among the world’s oldest universities.</p>
            <p class="text-white">For over a millennium, it has been a hugely respected centre of Islamic learning and began as a "madrasa," teaching students from primary to tertiary level. Named after the mosque in Cairo’s medieval quarter, it was founded by the Shi’ite Fatimid Dynasty in 970 AD and was formally organised by 988 AD.</p>
            <!-- <p><a href="#" class="clr-gold">Read More</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <!-- // 05 - Block -->
  <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-4">
            <h2 class="section-title-underline">
              <span>Testimonials</span>
            </h2>
          </div>
        </div>


        <div class="owl-slide owl-carousel">

          <div class="ftco-testimonial-1">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <img src="{{ asset('webassets/images/hicon1.png')}}" alt="Image" class="img-fluid mr-3">
              <div>
                <h3>Syarifah Ima Ash-shaumy</h3>
                <!-- <span>Designer</span> -->
              </div>
            </div>
            <div>
              <p>so good an very nice. My best university in Egypt...
              Is the best university in the world , and you will learn a lot of Islamic studies . 
              </p>
            </div>
          </div>

          <div class="ftco-testimonial-1">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <img src="{{ asset('webassets/images/hicon1.png')}}" alt="Image" class="img-fluid mr-3">
              <div>
                <h3>Osman Gani </h3>
                <!-- <span>Designer</span> -->
              </div>
            </div>
            <div>
              <p>Best University in the muslim world . 
              Is the best university in the world , and you will learn a lot of Islamic studies . 
              </p>
            </div>
          </div>

          <div class="ftco-testimonial-1">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <img src="{{ asset('webassets/images/hicon1.png')}}" alt="Image" class="img-fluid mr-3">
              <div>
                <h3>Sha Hassan Sha </h3>
                <!-- <span>Designer</span> -->
              </div>
            </div>
            <div>
              <p>good university and good lecture . 
              Is the best university in the world , and you will learn a lot of Islamic studies . 
              </p>
            </div>
          </div>

          <div class="ftco-testimonial-1">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <img src="{{ asset('webassets/images/hicon1.png')}}" alt="Image" class="img-fluid mr-3">
              <div>
                <h3>史育国 </h3>
                <!-- <span>Designer</span> -->
              </div>
            </div>
            <div>
              <p>the best university and You will learn a lot of useful knowledge . 
              Is the best university in the world , and you will learn a lot of Islamic studies . 
              </p>
            </div>
          </div>

          <div class="ftco-testimonial-1">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <img src="{{ asset('webassets/images/hicon1.png')}}" alt="Image" class="img-fluid mr-3">
              <div>
                <h3>Hamzat Adam Ayinde</h3>
                <!-- <span>Designer</span> -->
              </div>
            </div>
            <div>
              <p>Is the best university in the world , and you will learn a lot of Islamic studies .
              Is the best university in the world , and you will learn a lot of Islamic studies .  </p>
            </div>
          </div>

          <div class="ftco-testimonial-1">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <img src="{{ asset('webassets/images/hicon1.png')}}" alt="Image" class="img-fluid mr-3">
              <div>
                <h3>Sha Hassan Sha</h3>
                <!-- <span>Designer</span> -->
              </div>
            </div>
            <div>
              <p> Is the best university in the world , and you will learn a lot of Islamic studies .  alazhar university is the best uni of the world. i want to get admission in it. I really loved it.</p>
            </div>
          </div>

        </div>
        
      </div>
    </div>
    

    
    
    <div class="news-updates">
      <div class="container">
         
        <div class="row">
          <div class="col-lg-9">
             <div class="section-heading">
              <h2 class="text-black">News &amp; Updates</h2>
              <!-- <a href="#">Read All News</a> -->
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="post-entry-big">
                  <a href="news-single.html" class="img-link"><img src="{{ asset('webassets/images/home.jpg')}}" alt="Image" class="img-fluid"></a>
                  <div class="post-content">
                    <div class="post-meta"> 
                      <a href="#">June 6, 2019</a>
                      <span class="mx-1">/</span>
                      <a href="#">Admission</a>, <a href="#">Updates</a>
                    </div>
                    <h3 class="post-heading"><a href="news-single.html">The student whose circumstances prevents him from attending school</a></h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="post-entry-big horizontal d-flex mb-4">
                  <a href="news-single.html" class="img-link mr-4"><img src="{{ asset('webassets/images/1.jpg')}}" alt="Image" class="img-fluid"></a>
                  <div class="post-content">
                    <div class="post-meta">
                      <a href="#">June 6, 2019</a>
                      <span class="mx-1">/</span>
                      <a href="#">Admission</a>, <a href="#">Updates</a>
                    </div>
                    <h3 class="post-heading"><a href="news-single.html">Foreign Students</a></h3>
                  </div>
                </div>

                <div class="post-entry-big horizontal d-flex mb-4">
                  <a href="news-single.html" class="img-link mr-4"><img src="{{ asset('webassets/images/2.jpg')}}" alt="Image" class="img-fluid"></a>
                  <div class="post-content">
                    <div class="post-meta">
                      <a href="#">June 6, 2019</a>
                      <span class="mx-1">/</span>
                      <a href="#">Admission</a>, <a href="#">Updates</a>
                    </div>
                    <h3 class="post-heading"><a href="news-single.html">Medical Care</a></h3>
                  </div>
                </div>

                <div class="post-entry-big horizontal d-flex mb-4">
                  <a href="news-single.html" class="img-link mr-4"><img src="{{ asset('webassets/images/3.PNG')}}" alt="Image" class="img-fluid"></a>
                  <div class="post-content">
                    <div class="post-meta">
                      <a href="#">June 6, 2019</a>
                      <span class="mx-1">/</span>
                      <a href="#">Admission</a>, <a href="#">Updates</a>
                    </div>
                    <h3 class="post-heading"><a href="news-single.html">Al-Azhar Coordinate</a></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="section-heading">
              <h2 class="text-black"> Videos</h2>
              <!-- <a href="#">View All Videos</a> -->
            </div>
            <a href="https://youtu.be/s3S0MY4Mlww" class="video-1 mb-4" data-fancybox="" data-ratio="2">
              <span class="play">
                <span class="icon-play"></span>
              </span>
              <img src="{{ asset('webassets/images/4.PNG')}}" alt="Image" class="img-fluid">
            </a>
            <a href="https://youtu.be/5BhZqpnoiIc" class="video-1 mb-4" data-fancybox="" data-ratio="2">
                <span class="play">
                  <span class="icon-play"></span>
                </span>
                <img src="{{ asset('webassets/images/5.PNG')}}" alt="Image" class="img-fluid">
              </a>
          </div>
        </div>
      </div>
    </div>

     

@endsection