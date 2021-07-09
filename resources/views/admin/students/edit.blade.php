@extends('admin.layouts.main')
   
@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="material-icons"></i>Home  </a></li>
      <li class="breadcrumb-item active" aria-current="page">Student </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>{{ __('View') }}</h6>
                
            </div>
            <div class="ms-panel-body col-md-6 col-md-offset-2">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif



                <div class="col-12 p-3">
                <h2><i class="flaticon-mortarboard"></i> Student Data</h2>
			<hr class="hr-yellow" />
            <div class="row">
				<div class="col-md-6 form-group">
					<label for="fname">Full Name</label>
					<input type="text" readonly id="fname" value="{{$row->user->name ?? ''}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="accomodation">Accomodation Code</label>
                    <input type="text" readonly id="fname" value="{{$row->accomodate->accomodation_code ?? ''}}" class="form-control form-control-lg">

				</div>
                <div class="col-md-6 form-group">
                    <label for="tel">Mobile</label>
                    <input type="tel" readonly id="tel" value="{{$row->mobile}}" class="form-control form-control-lg">
                </div>
				<div class="col-md-6 form-group">
					<label for="tel">Phone</label>
					<input type="tel" readonly id="tel" value="{{$row->user->phone ?? ''}}" class="form-control form-control-lg">
				</div>				
				<div class="col-md-6 form-group">
					<label for="gender">Gender</label>
					<select class="form-control form-control-lg" disabled id="gender">
						<option selected>Select Gender</option>
						<option {{ 1 == $row->gender ? 'selected' : '' }} >Female</option>
						<option {{ 0 == $row->gender ? 'selected' : '' }}>Male</option>
					</select>
				</div>
				<div class="col-md-6 form-group">
					<label for="bdate">Birth Date</label>
                    <?php $date2 = date_create($row->birth_date)?>
					<input type="date" readonly id="bdate" value="{{ date_format($date2,"Y-m-d") }}"  class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="bplace">Birth Place</label>
					<input type="text" readonly id="bplace" value="{{$row->birth_place}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nid">National ID</label>
					<input type="text" readonly id="nid" value="{{$row->nid}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nplace">National Issue Place</label>
					<input type="text" readonly id="bplace" value="{{$row->nid_issue_place}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="ndate">National Issue Date</label>
                    <?php $date3 = date_create($row->nid_issue_date)?>
					<input type="date" readonly id="bdate" value="{{ date_format($date3,"Y-m-d") }}" class="form-control form-control-lg">
				</div>		
				<div class="col-md-6 form-group">
					<label for="address">Address</label>
					<input type="text" readonly id="address" value="{{$row->address}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="faculty-code">Faculty Code</label>
                    <input type="text"  readonly value="{{$row->faculty_code}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="city">City</label>
					<input type="text" readonly  value="{{$row->city->name ?? ''}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="faculty">Faculty</label>
                    <input type="text" readonly value="{{$row->faculty->name ?? ''}}" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="cyear">Current Year</label>
                    <input type="text" readonly  value="{{$row->currentYear->name ?? ''}}" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="division">Division</label>
                    <input type="text" readonly  value="{{$row->division->name ?? ''}}" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="department">Department</label>
                    <input type="text" readonly value="{{$row->department->name ?? ''}}" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="edu">Education Status</label>
                    <input type="text" readonly  value="{{$row->status->name ?? ''}}" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="grade">Current Grade</label>
                    <input type="text" readonly  value="{{$row->grade->grade_text ?? ''}}" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="grade">Militray</label>
                    <input type="text" readonly value="{{$row->military_service_complete}}" class="form-control form-control-lg">

				</div>
                <div class="form-group">
                      
                     
				<div class="col-md-6 form-group" style="max-width:540px;margin:5px 15px">
                <label for="grade">guarantee_grade_img</label>
                <div id="uploadOne" class="img-upload">
                          <img src="{{ asset('uploads/student')}}/{{ $row->guarantee_grade_img }}" alt="">
                          
                        </div>
                      </div>	</div>
				<div class="col-md-6 form-group" style="max-width:540px;margin:5px 15px">
                <label for="grade">guarantee_work_img</label>
                <div id="uploadOne" class="img-upload">
                          <img src="{{ asset('uploads/student')}}/{{ $row->guarantee_grade_img }}" alt="">
                          
                        </div>
                      </div>	</div>
				
			
            </div>
			<br />
			<h2><i class="flaticon-diploma"></i> Parent Data</h2>
			<hr class="hr-yellow" />
			<div class="row">
			@if($parentData)
				<div class="col-md-6 form-group">
					<label for="fname">Full Name</label>
					<input type="text" readonly value="{{$parentData->name}}" id="fname" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="tel">Mobile</label>
					<input type="tel" readonly value="{{$parentData->mobile}}" id="tel" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="tel">Phone</label>
					<input type="tel" readonly value="{{$parentData->phone}}" id="tel" class="form-control form-control-lg">
				</div>	
				<div class="col-md-6 form-group">
					<label for="Relation">Relation</label>
                    <input type="text" readonly  value="{{$parentData->parent_relation->name ?? ''}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="address">Address</label>
					<input type="text" readonly  value="{{$parentData->address}}" id="address" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="Job">Job</label>
					<input type="text" readonly  value="{{$parentData->job}}" id="Job" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nid">National ID</label>
					<input type="text" readonly value="{{$parentData->nid}}" id="nid" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nid">Student </label>
					<input type="text" readonly id="nid" value="{{$parentData->student->user->name ?? ''}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nplace">National Issue Place</label>
					<input type="text" readonly id="bplace" value="{{$parentData->nid_issue_place}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="ndate">National Issue Date</label>
                    <?php $date4 = date_create($parentData->nid_issue_date)?>
					<input type="date" readonly id="bdate" value="{{ date_format($date4,"Y-m-d") }}" class="form-control form-control-lg">
			
				</div>
				<div class="col-md-12 form-group">
					<label for="message">Notes</label>
					<textarea name="" readonly id="message" cols="20" rows="2" class="form-control">{{$parentData->notes}}</textarea>
				</div>
				@endif
				<div class="col-12">
                <a href="{{route('students.index')}}" class="btn btn-primary btn-lg px-5">Back</a>
					<!-- <input type="submit" value="Submit" class="btn btn-primary btn-lg px-5"> -->
				</div>
			</div>
              </div>
            </div>
          </div>

        </div>
</div>
@endsection