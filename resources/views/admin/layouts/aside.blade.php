<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

 <!-- Logo -->
 <div class="logo-sn ms-d-block-lg">
   <a class="pl-0 ml-0 text-center" href="#"> <img src="{{asset('assets/img/logoIcon.jpg')}}" width="100" alt="logo"> </a>
 </div>

 <!-- Navigation -->
 <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- Home -->
    <li class="menu-item ">
        <a class=" active" href="#">
            <span><i class="material-icons fs-16">home</i>{{ __('home') }} </span>
        </a>
       
    </li>
    <!-- /Home -->
     <!-- Setup  -->
     <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="false" aria-controls="tables">
        <span><i class="material-icons fs-16">build</i>{{ __('setup') }} </span>
      </a>
      <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">

     
      
      <li> <a href="{{route('educationYear.index')}}">{{ __('Education Year') }} </a> </li>
        <li> <a href="{{route('requestStatus.index')}}">{{ __('Request Status') }}</a> </li>
      
      <li> <a href="{{route('city.index')}}">{{ __('Cities') }} </a> </li>
      
        <li> <a href="{{route('faculty.index')}}">{{ __('Faculties') }} </a> </li>
        <li> <a href="{{route('educationStatus.index')}}">{{ __('Education Status') }}</a> </li>
     
        <li> <a href="{{route('division.index')}}">{{ __('Divisions') }} </a> </li>
      
      <li> <a href="{{route('department.index')}}">{{ __('Departments') }} </a> </li>
      <li> <a href="{{route('grade.index')}}">{{ __('Grades') }}</a> </li>

      <li> <a href="{{route('parentRelation.index')}}">{{ __('Parent Realtions') }} </a> </li>

      </ul>
  </li>
  <!--  Setup  -->

  
    <!-- Controller  -->
    <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdown" aria-expanded="false" aria-controls="contactsdropdown">
        <span><i class="material-icons fs-16">assignment</i>{{ __('Data Controller') }}</span>
      </a>
        <ul id="contactsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="{{route('building.index')}}">{{ __('Buildings') }}</a> </li>
          <li> <a href="{{route('room.index')}}">{{ __('Rooms') }}</a> </li>
       
         
        </ul>
      </li>
    <!--  Clients  -->
    <!-- Leads  -->
    <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#callsdropdown1" aria-expanded="false" aria-controls="callsdropdown">
        <span><i class="material-icons fs-16">call</i>{{ __('Students') }}</span>
      </a>
        <ul id="callsdropdown1" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
        <li> <a href="{{route('students.index')}}">{{ __('Students') }} </a> </li>
         
        </ul>
      </li>
    <!--  Leads  -->
    <!-- Todo List -->
    <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#callsdropdown" aria-expanded="false" aria-controls="callsdropdown">
        <span><i class="material-icons fs-16">call</i>Requests</span>
      </a>
        <ul id="callsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
        
          <li> <a href="#">Accomodation Requests</a> </li>
          <li> <a href="#">Leaves Requests</a> </li>
         
        </ul>
      </li>
  
     
    
    
  </ul>


</aside>