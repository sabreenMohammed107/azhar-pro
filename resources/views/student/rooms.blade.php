
@extends('student.layouts.main')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('webassets/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Rooms</h2>
              <p>Madentak rooms are available to be cheked and you can reserve your room online</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Rooms</span>
      </div>
    </div>

    <div class="site-section">
  		<div class="container">
  			<div id="loadData" class="row">
              <?php
         $last_id =0 ;
         $building_id =0 ;
        ?>
            @foreach ($data as $row) 
  				<div class="col-lg-4 col-md-6 mb-4">
				  	<div class="course-1-item">
				  		<figure class="thumnail">
              <a href="#">
              @if(!empty($row->image))
              <img src="{{asset('uploads/rooms')}}/{{$row->image }}" alt="Imag" class="img-fluid">
              @else
              <img src="{{asset('webassets/images/building.jpg')}}" alt="Image" class="img-fluid">
              @endif
            
              </a>
				  			<div class="category"><h3>{{$row->room_no }} </h3></div>
				  		</figure>
				  		<div class="course-1-content pb-4">
				  			<h2> Capacity : {{$row->capacity}}</h2>
				  			<p class="desc mb-4">{{$row->building->name ?? '' }}</p>
				  			<p><a href="{{ URL('/singleRoom/'.$row->id )}}" class="btn btn-primary rounded-0 px-4">Show  Room</a></p>
				  		</div>
				  	</div>
  				</div>
                  <?php $last_id = $row->id ;
                  $building_id= $row->building_id;
                  ?>
           @endforeach
  			</div>
        <input type="text" style="opacity: 0;" id="last" value="{{$last_id}}">
              @if(count($data) >= 1 && count($allRows) > count($data))
              <div class="row justify-content-center text-center"><p><button id="loadBtn" onclick="loadMoreData(document.getElementById('last').value,{{$building_id}});" class="btn btn-primary rounded-0 px-4">Load More Rooms</button></p></div>
@endif
  		</div>
  	</div>



    <script>
        function loadMoreData(id,building_id){
      
    $.ajax({
        url: '{{url("load-rooms-data")}}',
        data: {
            id:id,
            building_id:building_id,
        },
       
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){

          $('#loadData').append(data.output);
            document.getElementById('last').value=data.last_id;
            if(data.last_id <= 1){
              
                document.getElementById('loadBtn').style.display='none';
            }else{
               
                document.getElementById('loadBtn').style.display='block';  
            }

        }, 
        error: function(){
              
              document.getElementById('loadBtn').style.display='none';
         }

        }); 
}
    </script>
@endsection
 