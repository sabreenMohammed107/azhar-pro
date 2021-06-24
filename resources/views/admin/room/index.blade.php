@extends('admin.layouts.main')
   
@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="material-icons"></i>Home  </a></li>
      <li class="breadcrumb-item active" aria-current="page">Rooms </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
		<div class="ms-panel-header d-flex justify-content-between">
			<h6></h6>
			<a  href="#" class="btn btn-dark" data-toggle="modal" data-target="#addModel"> {{ __('add') }}  </a>
		</div>
			<div class="ms-panel-body">
				<div class="table-responsive">
					<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
						<thead>
							<th>{{ __('#') }}</th>
                            <th>{{ __('image') }}</th>
							<th>{{ __('room no') }}</th>
                            <th>{{ __('building') }}</th>
                            <th>{{ __('capacity') }}</th>
							<th>{{ __('actions') }}</th>
						</thead>
						<tbody>
						@foreach($rows as $index => $row)
							<tr>
							<td>{{ $index +1 }}</td>
			  						<td><img src="{{ asset('uploads/rooms')}}/{{ $row->image }}" alt=""></td>
                                      <td>{{$row->room_no}}</td>
                                      <td>{{$row->building->name ?? ''}}</td>
                                      <td>{{$row->capacity}}</td>
									  <td>
                                      <a href="{{ route('room.edit', $row->id) }}" class="btn btn-info d-inline-block">edit</a>
                                        <a href="#" onclick="destroy('this Room','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                         <form id="delete_{{$row->id}}" action="{{ route('room.destroy', $row->id) }}"  method="POST" style="display: none;">
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
<!-- Add Model -->
<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addCourse">

    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
              <form action="{{route('room.store')}}" method="POST" enctype="multipart/form-data" >
                  @csrf
                      <div class="ms-auth-container row">
    
                          <div class="col-md-12">
                        
                        <label> room img </label>
                      <div class="form-group">
                        <div id="uploadOne" class="img-upload">
                          <img src="{{ asset('assets/img/default-user.gif')}}" alt="">
                          <div class="upload-icon">
                            <input type="file" name="image" class="upload">
                            <i class="fas fa-camera    "></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('room no') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" name="room_no" class="form-control"
                                         placeholder=" room_no">
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                                  <label  >{{ __('Building') }}</label>
                                  <div class="input-group">
                                
                               <select name="building_id" class="form-control" required id="">
                                 @foreach($buildings as $type)
                                 <option value="{{$type->id}}">{{$type->name}}</option>
                                 @endforeach
                               </select>
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('capacity') }}</label>
                                  <div class="input-group">
                                      <input type="number" id="newTitle" name="capacity" class="form-control"
                                         placeholder="capacity">
                                  </div>
                              </div>
                      </div>
                          
                      </div>
                      <div class="input-group d-flex justify-content-end text-center">
                        <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close"> 
                     
                        <input type="submit" value="Add" class="btn btn-success ">                       
                    </div>
                  </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
<!-- end model -->
@endsection