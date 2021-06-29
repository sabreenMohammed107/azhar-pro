
@extends('student.layouts.main')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('webassets/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Rooms</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div>


    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Single Room</span>
      </div>
    </div>
    @if ($message =Session::get('message'))
		<div id="alertDiv" class="alert alert-info alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>
        <strong style="color:black;font-weight:bold">{{ $message }}</strong>
</div>


@endif
@if (Session::get('error'))
<div id="alertDiv" class="alert alert-info alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>
        <strong style="color:black;font-weight:bold">Error In Saving Or Update</strong>
</div>
					@endif
    <div class="site-section">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-6 mb-4">
				  	<div class="product__carousel">
				  		<!-- Swiper and EasyZoom plugins start -->
				  		<div class="swiper-container gallery-top">
				  			<div class="swiper-wrapper">
				  				<div class="swiper-slide">
				  					<img src="{{ asset('uploads/rooms')}}/{{ $row->image }}" class="img-fluid" alt="" />
				  				</div>

				  			</div>

				  		</div>

				  		<!-- Swiper and EasyZoom plugins end -->
				  	</div>
  				</div>
  				<div class="col-lg-6 align-self-center">
                        <h2 class="section-title-underline mb-5">
                            <span>Room Details</span>
                        </h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam provident repellendus deserunt?</p>

                        <ul class="ul-check primary list-unstyled mb-5">
                        <li>Room No : {{$row->room_no}}</li>
                            <li>Building : {{$row->building->name ?? ''}}</li>
                            <li>Room Capacity : {{$row->capacity}} </li>

                        </ul>

                        <p>
                        @if($out == "done" && $accomodate)
                        <form action="{{URL('/book-room' )}}" method="post">
                        @csrf
                        <input type="hidden" name="room_id" value="{{$row->id}}" >
                        <input type="hidden" name="accomodate_id" value="{{$accomodate->id}}" id="">
                        <?php
                        $test=null;
                        $test=App\Models\Students_room::where('room_id',$row->id)->where('student_id',$accomodate->student_id)->where('education_year_id',$accomodate->education_year_id)->first();
                        ?>
                        <button type="submit" @if($test) disabled @endif class="btn btn-primary rounded-0 btn-lg px-5">Book Room</a>

                        </form>
                            @endif
                        </p>

                    </div>
  			</div>
  		</div>
  	</div>


    @endsection
