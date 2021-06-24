@extends('admin.layouts.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="material-icons"></i>Home  </a></li>
      <li class="breadcrumb-item active" aria-current="page">Leaves Requests </li>
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
                <form action="{{route('leaveRequest.update',$row->id)}}" method="POST" >
                        @method('PUT')
                        @csrf
                      <div class="ms-auth-container row">
                      <div class="col-md-12 mb-3">
                      <button data-toggle="modal" data-target="#confi" type="button"  @if($row->request_status_id==2 || $row->request_status_id==3) disabled style="background:#920606ad;border:#920606ad;" @endif class="btn btn-primary waves-effect waves-light mg-b-15"  > Approve</button>

<button data-toggle="modal" data-target="#save" type="button" @if($row->request_status_id==2 || $row->request_status_id==3) disabled style="background:#920606ad;border:#920606ad;" @endif  class="btn btn-primary waves-effect waves-light mg-b-15">Reject</button>
<button data-toggle="modal" data-target="#cancle" type="button" class="btn btn-primary waves-effect waves-light mg-b-15">Back</button>

                        <!--save Company-->
                        <div id="save" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-2">
                                        <h4 class="modal-title" >Reject Request</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>

                                        <h4>Are You Want To Reject This Request ?</h4>
                                    </div>
                                    <div class="modal-footer info-md">
                                       

                                        <button class="btn btn-primary waves-effect waves-light" name="action" value="Reject" onclick="document.getElementById('form-id').submit();">Save</button>
                                        <a data-dismiss="modal" href="#" class="btn btn-dark mx-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/save Company-->
                         <!--confi Company-->
                         <div id="confi" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-2">
                                        <h4 class="modal-title" > Approve and Close</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>

                                        <h4>Are You Want To Approve This Request ? </h4>
                                    </div>
                                    <div class="modal-footer info-md">
                                       
                                        <button class="btn btn-primary waves-effect waves-light" name="action" value="confirm" onclick="document.getElementById('form-id').submit();">Save</button>
                                        <a data-dismiss="modal" href="#" class="btn btn-dark mx-2" >Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/conf Company-->

                        <!--cancle Company-->
                        <div id="cancle" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-2">
                                        <h4 class="modal-title" >Back </h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>

                                        <h4>Do You Want To Back To Prev ?</h4>
                                    </div>
                                    <div class="modal-footer info-md">
                                       

                                        <a class="btn btn-primary waves-effect waves-light" href="{{route('accomodationRequest.index')}}">Back</a>
                                        <a data-dismiss="modal" href="#" class="btn btn-dark mx-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/cancle Company-->
                    </div>
                       
       
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('Student') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" readonly name="student" value="{{$row->student->user->name ?? ''}}" class="form-control"
                                         placeholder="student">
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('Education') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" readonly name="education" value="{{$row->education->name ?? ''}}" class="form-control"
                                         placeholder="education">
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('From Date') }}</label>
                                  <div class="input-group">
                                  <?php $date2 = date_create($row->from_date)?>
                  
                                      <input type="date" id="newTitle" readonly name="status" value="{{ date_format($date2,"Y-m-d") }}" class="form-control"
                                         placeholder="status">
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('To Date') }}</label>
                                  <div class="input-group">
                                  <?php $date3 = date_create($row->to_date)?>
                  
                                      <input type="date" id="newTitle" readonly name="status" value="{{ date_format($date3,"Y-m-d") }}" class="form-control"
                                         placeholder="status">
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('Status') }}</label>
                                  <div class="input-group">
                                      <input type="text" id="newTitle" readonly name="status" value="{{$row->status->name ?? ''}}" class="form-control"
                                         placeholder="status">
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label  >{{ __('Request Date') }}</label>
                                  <div class="input-group">
                                  <?php $date = date_create($row->request_date)?>
                  
                                      <input type="date" id="newTitle" readonly name="status" value="{{ date_format($date,"Y-m-d") }}" class="form-control"
                                         placeholder="status">
                                  </div>
                              </div>
                      </div>
                      </div>

                  </form>
              </div>
            </div>
          </div>

        </div>
</div>
@endsection
