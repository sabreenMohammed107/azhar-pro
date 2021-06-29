@extends('student.layouts.main')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('webassets/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Leave Request</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div>
<div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Leave Request</span>
      </div>
    </div>
    @if ($message =Session::get('message'))
		<div id="alertDiv" class="alert alert-info alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>
        <strong style="color:black;font-weight:bold">{{ $message }}</strong>
</div>


@endif
@if ($error=Session::get('error'))
<div id="alertDiv" class="alert alert-danger alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>
        <strong style="color:black;font-weight:bold">{{$error}}</strong>
</div>
					@endif


                    <div class="site-section">
        <div class="container">
			<h2><i class="flaticon-diploma"></i> Leave Request</h2>
			<hr class="hr-yellow" />
            <form action="{{url('/student/update-leave-request')}}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$row->id}}" id="">
			<div class="row">	
				<div class="col-md-6 form-group">
					<label for="Relation">Education Year</label>
                    <input type="text" value="{{$currentYear->name ?? ''}}" disabled id="address" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="ndate">Request Date</label>
					<input type="date" name="request_date" value="<?php echo date('Y-m-d'); ?>" disabled id="bdate" class="form-control form-control-lg" disabled>
				</div>
				<div class="col-md-6 form-group">
					<label for="ndate">Start Date</label>
					<input type="date" name="from_date" id="bdate" required class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="ndate">End Date</label>
					<input type="date" name="to_date" id="bdate" required class="form-control form-control-lg">
				</div>
				<div class="col-12">
					<input type="submit" value="Submit" class="btn btn-primary btn-lg px-5">
				</div>
			</div>
            </form>
			
        </div>
    </div>

    
                    @endsection
