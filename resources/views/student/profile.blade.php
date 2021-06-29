@extends('student.layouts.main')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('webassets/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Student Profile</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div>


    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="{{url('/')}}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Student Profile</span>
      </div>
    </div>

    <div class="site-section pt-3">
        <div class="container">
			<h2 class="clr-gold">Student Profile</h2>
			<div class="row">
				<div class="col-12 d-flex flex-row-reverse">
					<a href="{{ URL('/edit-student/'.Auth::guard('student')->user()->id )}}" class="btn btn-primary btn-lg px-5 mb-4">Edit Profile Data</a>
				</div>
				<div class="col-lg-4">
					<div class="card shadow-sm">
						<div class="card-header bg-transparent text-center">

							<h3>{{$row->user->name ?? ''}}</h3>
						</div>
						<div class="card-body">
							<table class="table">
								<tr>
									<th width="20%">Student ID</th>
									<td width="2%">:</td>
									<td>{{$row->id}}</td>
								</tr>
								<tr>
									<th width="20%">Gender</th>
									<td width="2%">:</td>
									<td>@if($row->gender==1) Male @else Female @endif</td>
								</tr>
								<tr>
									<th width="20%">Mobile</th>
									<td width="2%">:</td>
									<td>{{$row->mobile}}</td>
								</tr>
								<tr>
									<th width="20%">Phone</th>
									<td width="2%">:</td>
									<td>{{$row->phone}}</td>
								</tr>
								<tr>
									<th width="20%">Birth Date</th>
									<td width="2%">:</td>
                                   									<td>
                                    <?php $date = date_create($row->birth_date);
                                     if ($row->birth_date) {
    echo date_format($date, "d-m-Y");
} else {
    echo " ";
}
?>
                                   </td>
								</tr>
								<tr>
									<th width="20%">National ID</th>
									<td width="2%">:</td>
									<td>{{$row->nid}}</td>
								</tr>
								<tr>
									<th width="20%">Grade</th>
									<td width="2%">:</td>
									<td>{{$row->grade->grade_text ?? ''}}</td>
								</tr>
								<tr>
									<th width="20%">Faculty</th>
									<td width="2%">:</td>
									<td>{{$row->faculty->name ?? ''}}</td>
								</tr>
								<tr>
									<th width="20%">Department</th>
									<td width="2%">:</td>
									<td>{{$row->department->name ?? ''}}</td>
								</tr>

							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card shadow-sm">
						<div class="card-header bg-transparent border-0">
							<h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
						</div>
						<div class="card-body pt-0">
							<table class="table table-bordered">

								<tr>
									<th width="20%">Address</th>
									<td width="20%">:</td>
									<td>{{$row->address}}</td>
								</tr>
								<tr>
									<th width="20%">City</th>
									<td width="20%">:</td>
									<td>{{$row->city->name ?? ''}}</td>
								</tr>
								<tr>
									<th width="20%">Birth Place</th>
									<td width="20%">:</td>
									<td>{{$row->birth_place}}</td>
								</tr>
								<tr>
									<th width="22%">National Place</th>
									<td width="20%">:</td>
									<td>{{$row->nid_issue_place}}</td>
								</tr>
								<tr>
									<th width="22%">National Date</th>
									<td width="20%">:
									<?php $date2 = date_create($row->nid_issue_date);
if ($row->nid_issue_date) {
    echo date_format($date2, "d-m-Y");
} else {
    echo " ";
}
?>
							</td>	</tr>
								<tr>
									<th width="20%">Division</th>
									<td width="20%">:</td>
									<td>{{$row->division->name ?? ''}}</td>
								</tr>
								<tr>
									<th width="20%">Education Status</th>
									<td width="20%">:</td>
									<td>{{$row->status->name ?? ''}}</td>
								</tr>
								<tr>
									<th width="20%">Current Grade</th>
									<td width="2%">:</td>
									<td>{{$row->grade->name ?? ''}}</td>
								</tr>
								<tr>
									<th width="20%">Militray</th>
									<td width="20%">:</td>
									<td>{{$row->military_service_complete}}</td>
								</tr>

								<tr>
									<th width="30%">Guarantee Date Img</th>
									<td width="20%">:</td>
									<td><img width="100" src="{{ asset('uploads/students')}}/{{$row->guarantee_grade_img }}" alt=""></td>
								</tr>
								<tr>
									<th width="30%">Guarantee Work Img</th>
									<td width="20%">:</td>
									<td><img width="100" src="{{ asset('uploads/students')}}/{{$row->guarantee_work_img }}" alt=""></td>
								</tr>
								<tr>
									<th width="20%">Notes</th>
									<td width="20%">:</td>
									<td>{{$row->notes}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12 mt-3">
					<div class="card shadow-sm">
						<div class="card-header bg-transparent text-center">
							<h3>Parent Data</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 form-group">
									<label for="fname">Full Name</label>
									<p>{{$parentData->name ?? ''}}</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="tel">Mobile</label>
									<p>{{$parentData->mobile ?? ''}}</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="tel">Phone</label>
									<p>{{$parentData->phone ?? ''}}</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="Relation">Relation</label>
									<p>{{$parentData->parent_relation->name ?? ''}}</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="address">Address</label>
									<p>{{$parentData->address ?? ''}}</</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="Job">Job</label>
									<p>{{$parentData->job ?? ''}}</</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="nid">National ID</label>
									<p>{{$parentData->nid ?? ''}}</</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="nid">Student ID</label>
									<p>{{$parentData->student->id ?? ''}}</</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="nplace">National Issue Place</label>
									<p>{{$parentData->nid_issue_place ?? ''}}</</p>
								</div>
								<div class="col-md-6 form-group">
									<label for="ndate">National Issue Date</label>
									<p><?php 
									if($parentData){
										$date4 = date_create($parentData->nid_issue_date);
										if ( $parentData->nid_issue_date) {
											echo date_format($date4, "d-m-Y");
										} else {
											echo " ";
										}
										;
									}else{
										echo " ";
									}


?></p>
								</div>
								<div class="col-md-12 form-group">
									<label for="message">Notes</label>
									<p>{{$parentData->notes ?? ''}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
@endsection