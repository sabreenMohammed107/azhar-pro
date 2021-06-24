@extends('admin.layouts.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="material-icons"></i>Home  </a></li>
      <li class="breadcrumb-item active" aria-current="page">Accomodation Requests </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
		<div class="ms-panel-header d-flex justify-content-between">
			<h6></h6>
		
		</div>
			<div class="ms-panel-body">
				<div class="table-responsive">
					<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
						<thead>
							<th>{{ __('#') }}</th>
                            <th>{{ __('Request no') }}</th>
							<th>{{ __('Student') }}</th>
                            <th>{{ __('Education Year') }}</th>
                            <th>{{ __('Request Status') }}</th>
                            <th>{{ __('Request Date') }}</th>
							<th>{{ __('actions') }}</th>
						</thead>
						<tbody>
						@foreach($rows as $index => $row)
							<tr>
							<td>{{ $index +1 }}</td>
			  						<td>{{$row->request_no}}</td>
                                      <td>{{$row->student->user->name ?? ''}}</td>
                                      <td>{{$row->education->name ?? ''}}</td>
                                      <td>{{$row->status->name ?? ''}}</td>
                                      <td> <?php $date = date_create($row->request_date)?>
                  {{ date_format($date,"d-m-Y") }}</td>
									  <td>
                                      <a href="{{ route('accomodationRequest.edit', $row->id) }}" class="btn btn-info d-inline-block">edit</a>
                                        <a href="#" onclick="destroy('this Accomodation','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                         <form id="delete_{{$row->id}}" action="{{ route('accomodationRequest.destroy', $row->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
			  						</td>
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection