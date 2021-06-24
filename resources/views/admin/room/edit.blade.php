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
                <h6>{{ __('Edit') }}</h6>
                
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
                <form action="{{route('room.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                      <div class="ms-auth-container row">
    
                          <div class="col-md-12">
                        
                        <label> room img </label>
                      <div class="form-group">
                        <div id="uploadOne" class="img-upload">
                          <img src="{{ asset('uploads/rooms')}}/{{ $row->image }}" alt="">
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
                                      <input type="text" id="newTitle" name="room_no" value="{{$row->room_no}}" class="form-control"
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
                                 <option value="{{$type->id}}" {{ $type->id == $row->building_id ? 'selected' : '' }} >{{$type->name}}</option>
                                 @endforeach
                               </select>
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('capacity') }}</label>
                                  <div class="input-group">
                                      <input type="number" id="newTitle" name="capacity" value="{{$row->capacity}}" class="form-control"
                                         placeholder="capacity">
                                  </div>
                              </div>
                      </div>
                          
                      </div>
                      <div class="input-group d-flex justify-content-end text-center">
                            <a href="{{route('room.index')}}" class="btn btn-dark mx-2"> Cancel</a>

                            <input type="submit" value="Add" class="btn btn-success ">
                        </div>

                  </form>
              </div>
            </div>
          </div>

        </div>
</div>
@endsection