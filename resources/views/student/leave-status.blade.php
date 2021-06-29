@extends('student.layouts.main')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('webassets/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Leave Status</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div> 
<div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Leave Status</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
                <form action="{{ route('check-leave-status') }}" method="GET" >
              
					<div class="row">
						<div class="col-md-12 form-group">
							<label for="rnm">Request Number</label>
							<input type="text" id="fname" name="code" value="{{$code ?? ''}}" class="form-control form-control-lg">
						</div>
						<div class="col-12">
							<input type="submit" value="Submit" class="btn btn-primary btn-lg px-5">
						</div>
					</div>
                </form>
                    @if (Session::get('message'))
					<div class="row">
						<div class="col-12"><h1 class="text-center"><i class="flaticon-library clr-gold"></i></h1></div>
						<div class="col-12"><h4 class="clr-gold text-center">Congratulation Your Request Has Been {{$row->status->name ?? ''}}</h4></div>
					</div>
                    
					@endif
                    @if (Session::get('info'))
					<div class="row">
						<div class="col-12"><h1 class="text-center"><i class="flaticon-library clr-gold"></i></h1></div>
						<div class="col-12"><h4 class="clr-gold text-center">This Code Not Found</h4></div>
					</div>
                    
					@endif
				</div>
			</div>
			
        </div>
    </div>
@endsection