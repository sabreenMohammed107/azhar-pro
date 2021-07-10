@extends('student.layouts.main')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('webassets/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Accomodation Status</h2>
              <p>Now, You can request to have your accomodation in Azhar Madentak online</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Accomodation Status</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
			<h2 class="clr-gold">Accomodation Status</h2>
			<br />
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
                        <th scope="col">Code NO</th>
                        <th scope="col">Education Year</th>
						<th scope="col">Request Date</th>
						
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
                @foreach($rows as $index => $row)
							<tr>
							<td>{{ $index +1 }}</td>
                            <td>{{$row->accomodation_code}}</td>
                            <td>{{$row->education->name ?? ''}}</td>
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