@extends('student.layouts.main')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('webassets/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Edit Student Data</h2>
              <p>Now, You can request to have your accomodation in Azhar Madentak online.</p>
            </div>
          </div>
        </div>
      </div> 
  
    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Edit Student Data</span>
      </div>
    </div>
  
    @if ($message =Session::get('message'))
		<div id="alertDiv" class="alert alert-info alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>	
        <strong style="color:black;font-weight:bold">{{ $message }}</strong>
</div>
	

@endif
@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
    <div class="site-section">
        <div class="container">
			<h2><i class="flaticon-mortarboard"></i> Student Data</h2>
			<hr class="hr-yellow" />
            <form action="{{url('/updateProfile')}}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$row->id}}" id="">
            <div class="row">
				<div class="col-md-6 form-group">
					<label for="fname">Full Name</label>
					<input type="text" id="fname" name="name" disabled value="{{$row->user->name ?? ''}}" class="form-control form-control-lg" value="Abdullah Taha">
				</div>
                <div class="col-md-6 form-group">
                    <label for="tel">Mobile</label>
                    <input type="tel" id="tel" name="mobile" value="{{$row->mobile}}" class="form-control form-control-lg" value="010 123 45 678">
                </div>
				<div class="col-md-6 form-group">
					<label for="tel">Phone</label>
					<input type="tel" id="tel" name="phone" disabled value="{{$row->user->phone ?? ''}}" class="form-control form-control-lg" value="002 215 54 478">
				</div>				
				<div class="col-md-6 form-group">
					<label for="gender">Gender</label>
					<select name="gender" class="form-control form-control-lg" id="gender">
						<option value="1" @if($row->gender=="1") selected @endif>Male</option>
						<option value="0" @if($row->gender !="1") selected @endif>Female</option>
					</select>
				</div>
				<div class="col-md-6 form-group">
                <?php 
                $result=" ";
                $date = date_create($row->birth_date);
                                     if ($row->birth_date) {
                                        $result= date_format($date, "Y-m-d");
} else {
    $result= ' ';
}
?>
					<label for="bdate">Birth Date</label>
					<input type="date" name="birth_date" id="bdate" value="{{$result}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="bplace">Birth Place</label>
					<input type="text" id="bplace" name="nid_issue_place" value="{{$row->nid_issue_place}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nid">National ID</label>
					<input type="text" id="nid" name="nid" value="{{$row->nid}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nplace">National Issue Place</label>

					<input type="text" id="bplace" name="nid_issue_place" value="{{$row->nid_issue_place}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="ndate">National Issue Date</label>
                    <?php 
                $result2=" ";
                $date = date_create($row->nid_issue_date);
                                     if ($row->nid_issue_date) {
                                        $result= date_format($date, "Y-m-d");
} else {
    $result2= ' ';
}
?>
					<input type="date" name="nid_issue_date" id="bdate" value="{{$result2}}" class="form-control form-control-lg">
				</div>		
				<div class="col-md-6 form-group">
					<label for="address">Address</label>
					<input type="text" name="address" value="{{$row->address}}" id="address" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="faculty-code">Faculty Code</label>
                    <input type="text" name="faculty_code" value="{{$row->faculty_code}}" id="address" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="city">City</label>
					<select class="form-control form-control-lg" name="city_id" id="city">
                    @foreach($cities as $type)
                                 <option value="{{$type->id}}" {{ $type->id == $row->city_id ? 'selected' : '' }} >{{$type->name}}</option>
                                 @endforeach
                               </select>
				</div>
				<div class="col-md-6 form-group">
					<label for="faculty">Faculty</label>
					<select class="form-control form-control-lg" name="faculty_id" id="faculty">
                    @foreach($faculties as $type)
                                 <option value="{{$type->id}}" {{ $type->id == $row->faculty_id ? 'selected' : '' }} >{{$type->name}}</option>
                                 @endforeach
                               </select>
				</div>
				<div class="col-md-6 form-group">
					<label for="cyear">Current Year</label>
                    <input type="text" name="" value="{{$currentYear->name ?? ''}}" id="address" class="form-control form-control-lg">

				</div>
				<div class="col-md-6 form-group">
					<label for="division">Division</label>
					<select class="form-control form-control-lg" name="division_id" id="division">
                    @foreach($divisions as $type)
                                 <option value="{{$type->id}}" {{ $type->id == $row->division_id ? 'selected' : '' }} >{{$type->name}}</option>
                                 @endforeach
                               </select>
				</div>
				<div class="col-md-6 form-group">
					<label for="department">Department</label>
					<select class="form-control form-control-lg" name="department_id" id="department">
                    @foreach($departments as $type)
                                 <option value="{{$type->id}}" {{ $type->id == $row->department_id ? 'selected' : '' }} >{{$type->name}}</option>
                                 @endforeach
                               </select>
				</div>
				<div class="col-md-6 form-group">
					<label for="edu">Education Status</label>
					<select class="form-control form-control-lg" name="education_status_id" id="edu">
                    @foreach($status as $type)
                                 <option value="{{$type->id}}" {{ $type->id == $row->education_status_id ? 'selected' : '' }} >{{$type->name}}</option>
                                 @endforeach
                               </select>
				</div>
				<div class="col-md-6 form-group">
					<label for="grade">Current Grade</label>
					<select class="form-control form-control-lg" name="current_grade_id" id="grade">
                    @foreach($grades as $type)
                                 <option value="{{$type->id}}" {{ $type->id == $row->current_grade_id ? 'selected' : '' }} >{{$type->grade_text}}</option>
                                 @endforeach
                    </select>
				</div>
				<div class="col-md-6 form-group">
					<label for="grade">Militray</label>
                    <input type="text" name="military_service_complete" value="{{$row->military_service_complete}}" id="address" class="form-control form-control-lg">

				</div>
				
				<div class="col-md-6 form-group" style="max-width:540px;margin:5px 15px">
					<input type="file" value="{{ asset('uploads/students')}}/{{$row->guarantee_grade_img }}" name="guarantee_grade_img" class="custom-file-input form-control form-control-lg" id="validatedCustomFile1">
					<label class="custom-file-label" for="validatedCustomFile1">{{$row->guarantee_grade_img }}</label>
				</div>
				<div class="col-md-6 form-group" style="max-width:540px;margin:5px 15px">
					<input type="file" value="{{ asset('uploads/students')}}/{{$row->guarantee_work_img }}" name="guarantee_work_img" class="custom-file-input form-control form-control-lg" id="validatedCustomFile2">
					<label class="custom-file-label" for="validatedCustomFile2">{{$row->guarantee_work_img }}</label>
				</div>
				<div class="col-md-12 form-group">
					<label for="message">Notes</label>
					<textarea name="notes" id="message" cols="20" rows="2" class="form-control">{{$row->notes}}</textarea>
				</div>
            </div>
			<br />
			<h2><i class="flaticon-diploma"></i> Parent Data</h2>
			<hr class="hr-yellow" />
			<div class="row">
				<div class="col-md-6 form-group">
					<label for="fname">Full Name</label>
                   
					<input type="text" id="fname" name="pname" value="{{$parentData->name ?? ''}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="tel">Mobile</label>
					<input type="tel" id="tel"  name="pmobile" value="{{$parentData->mobile ?? ''}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="tel">Phone</label>
					<input type="tel" id="tel"  name="pphone" value="{{$parentData->phone ?? ''}}" class="form-control form-control-lg">
				</div>	
				<div class="col-md-6 form-group">
					<label for="Relation">Relation</label>
					<select class="form-control form-control-lg" name="parent_relation_id" id="Relation">
                    @foreach($relations as $type)
                                 <option value="{{$type->id}}" {{ $type->id == $row->parent_relation_id ? 'selected' : '' }} >{{$type->name}}</option>
                                 @endforeach
                    </select>
				</div>
				<div class="col-md-6 form-group">
					<label for="address">Address</label>
					<input type="text" name="paddress" value="{{$parentData->address ?? ''}}" id="address" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="Job">Job</label>
					<input type="text" name="pjob" value="{{$parentData->job ?? ''}}" id="Job" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nid">National ID</label>
					<input type="text" name="pnid" value="{{$parentData->nid ?? ''}}" id="nid" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nid">Student ID</label>
					<input type="text" name="student_id" disabled value="{{$row->user->name ?? ''}}" id="nid" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="nplace">National Issue Place</label>
					<input type="text" id="bplace" name="pnid_issue_place" value="{{$parentData->nid_issue_place ?? ''}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-6 form-group">
					<label for="ndate">National Issue Date</label>
                    <?php 
                $result3=" ";
                $date = date_create($parentData->nid_issue_date);
                                     if ($parentData->nid_issue_date) {
                                        $result3= date_format($date, "Y-m-d");
} else {
    $result3= ' ';
}
?>
					<input type="date" id="bdate" value="{{$result3}}" class="form-control form-control-lg">
				</div>
				<div class="col-md-12 form-group">
					<label for="message">Notes</label>
					<textarea name="pnotes" id="message" cols="20" rows="2" class="form-control">{{$parentData->notes ?? ''}}</textarea>
				</div>
				<div class="col-12">
					<input type="submit" value="Submit" class="btn btn-primary btn-lg px-5">
				</div>
			</div>
			</form>
        </div>
    </div>

    
@endsection