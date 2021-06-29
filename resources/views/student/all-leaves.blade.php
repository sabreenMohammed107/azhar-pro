@extends('student.layouts.main')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('webassets/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Requests Status</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Requests Status</span>
      </div>
    </div>
    @if ($message =Session::get('message'))
		<div id="alertDiv" class="alert alert-info alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>	
        <strong style="color:black;font-weight:bold">{{ $message }}</strong>
</div>
	

@endif
@if ($error =Session::get('error'))
		<div id="alertDivdanger" class="alert alert-danger alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>	
        <strong style="color:black;font-weight:bold">{{ $error }}</strong>
</div>
	

@endif

    <div class="site-section">
        <div class="container">
			<h2 class="clr-gold">Requests Status</h2>
			<br />
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
                        <th scope="col">code No</th>
						<th scope="col">Request Date</th>
						<th scope="col">Start Date</th>
						<th scope="col">End Date</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
                @foreach($rows as $index => $row)
							<tr>
							<td>{{ $index +1 }}</td>
                            <td>{{$row->leave_code}}</td>
                           
						<td> 
                        <?php 
                        $date = date_create($row->request_date);
                                     if ($row->request_date) {
                           echo date_format($date, "d-m-Y");
                             } else {
                              echo " "; 
                             }
                              ?>
                                  </td>
					
						
                        <td> 
                        <?php 
                        $date2 = date_create($row->from_date);
                                     if ($row->from_date) {
                           echo date_format($date2, "d-m-Y");
                             } else {
                              echo " "; 
                             }
                              ?>
                                  </td>
					
						<td>
                       
                        <?php 
                        $date3 = date_create($row->to_date);
                                     if ($row->to_date) {
                           echo date_format($date3, "d-m-Y");
                             } else {
                              echo " "; 
                             }
                              ?>
                                  </td>
					
						<td>
                        <?php
                        if($row->request_status_id == 2) {
                            echo '<span class="icon-check"></span> Approved';
                        }
                        elseif($row->request_status_id == 3) {
                           echo ' <span class="icon-close"></span> Rejected';
                        }
                        else{
                        echo '<span class="icon-refresh"></span> In-Progress' ;
                    }
                        ?>
                        </td>
					</tr>

                  @endforeach
				
				</tbody>
			</table>
        </div>
    </div>


@endsection