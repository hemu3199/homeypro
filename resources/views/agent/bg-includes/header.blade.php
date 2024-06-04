@php
use Illuminate\Support\Facades\DB;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
<meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
<link rel="icon" href="assets/img/HomeyLo1.png" type="image/x-icon"> <!-- Favicon-->
<title>HOMEY Agent Dashboard</title>
<!-- Application vendor css url -->
<link rel="stylesheet" href="{{asset('agent/assets/vendor/jvectormap/jquery-jvectormap-2.0.5.min.js')}}">
<!-- project css file -->
<link rel="stylesheet" href="{{asset('agent/assets/css/luno-style.css')}}">
<!-- Jquery Core Js -->
<script src="{{asset('agent/assets/js/plugins.js')}}"></script>
<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
</link>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
</head>

<body class="layout-1" data-luno="theme-red">
  <!-- start: sidebar -->
  <div class="sidebar p-2 py-md-3 @@cardClass">
    <div class="container-fluid">
      <!-- sidebar: title-->
      <div class="title-text d-flex align-items-center mb-4 mt-1">
        <h4 class="sidebar-title mb-0 flex-grow-1"><span class="sm-txt" style="font-weight: bold;">HOMEY</h4>
        <div class="dropdown morphing scale-left">
          <a class="dropdown-toggle more-icon" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
          <ul class="dropdown-menu shadow border-0 p-2 mt-2" data-bs-popper="none">
            <li class="fw-bold px-2">Quick Actions</li>
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul>
        </div>
      </div>
      <!-- sidebar: Create new -->
      <!--<div class="create-new py-3 mb-2">
        <div class="d-flex">
          <select class="form-select rounded-pill me-1">
            <option selected>Types Of the Property</option>
            <option value="1">Luno University</option>
            <option value="2">Book Manager</option>
            <option value="3">Luno Sass App</option>
          </select>
          <button class="btn bg-primary text-white rounded-circle" data-bs-toggle="modal" data-bs-target="#CreateNew" type="button"><i class="fa fa-plus"></i></button>
        </div>
      </div>-->
      <!-- sidebar: menu list -->
      <div class="main-menu flex-grow-1">
        <ul class="menu-list">
          <li class="divider py-2 lh-sm"><span class="small">MAIN</span><br> <small class="text-muted"></small></li>
          <li>
            <a class="m-link active" href="{{ route('agent.dashboard') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              </svg>
              <span class="ms-2">My Dashboard</span>
            </a>
          </li>
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path class="fill-secondary" fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
              </svg>
              <span class="ms-2">All Properties</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="menu-Applications">
              <li> <a class="m-link" href="{{ route('agent.projects_total_list') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M12.5 6.5h-1v-1h1v1zm0-3h-1v1h1V3zm-2 3h-1v-1h1v1zm0-3h-1v1h1V3zm-2 3h-1v-1h1v1zm0-3h-1v1h1V3zM4.5 7.5H3v1h1V7.5zm-1-3H3v1h.5V4.5zm0 6H3v1h.5v-1zm-1-3H3v1h.5V7.5zm8-5H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM9 14H3v-1h6v1zm4-3H3V4h10v7zm1 0v-1h1v1h-1zm0-3h1v1h-1V8zm0-3h1v1h-1V5z"/>
</svg><span class="ms-2">All Projects</span></a></li>
              <li> <a class="m-link" href="{{ route('agent.properties')}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M8 1L0 7.5 1.5 9V15h4v-4h3v4h4v-6.5L8 1zm4 13h-3v-4H7v4H4v-6.5L8 4l4 3.5V14z"/>
</svg>
     <span class="ms-2">Total Properties</span>
 </a></li>
            </ul>
          </li>
           <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Application" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path class="fill-secondary" fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
              </svg>
              <span class="ms-2">Properties Report List</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="menu-Application">
              <li> <a class="m-link" href="{{ route('agent.property-rent-add') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M12.5 6.5h-1v-1h1v1zm0-3h-1v1h1V3zm-2 3h-1v-1h1v1zm0-3h-1v1h1V3zm-2 3h-1v-1h1v1zm0-3h-1v1h1V3zM4.5 7.5H3v1h1V7.5zm-1-3H3v1h.5V4.5zm0 6H3v1h.5v-1zm-1-3H3v1h.5V7.5zm8-5H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM9 14H3v-1h6v1zm4-3H3V4h10v7zm1 0v-1h1v1h-1zm0-3h1v1h-1V8zm0-3h1v1h-1V5z"/>
</svg><span class="ms-2">Projects</span></a></li>
              <li> <a class="m-link" href="{{ route('agent.properties_report')}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M8 1L0 7.5 1.5 9V15h4v-4h3v4h4v-6.5L8 1zm4 13h-3v-4H7v4H4v-6.5L8 4l4 3.5V14z"/>
</svg>
     <span class="ms-2">Properties Report List</span>
 </a></li>
            </ul>
          </li>
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#agent_properties" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.763 0.0750045C14.8354 0.119799 14.8952 0.18235 14.9367 0.256728C14.9782 0.331105 15 0.414844 15 0.500005V15.5C15 15.6326 14.9473 15.7598 14.8536 15.8536C14.7598 15.9473 14.6326 16 14.5 16H11.5C11.3674 16 11.2402 15.9473 11.1464 15.8536C11.0527 15.7598 11 15.6326 11 15.5V14H10V15.5C10 15.6326 9.94732 15.7598 9.85355 15.8536C9.75979 15.9473 9.63261 16 9.5 16H0.5C0.367392 16 0.240215 15.9473 0.146447 15.8536C0.0526784 15.7598 0 15.6326 0 15.5V10C7.96467e-05 9.89511 0.0331481 9.79289 0.0945249 9.70783C0.155902 9.62276 0.242478 9.55915 0.342 9.526L6 7.64V4.5C6 4.40723 6.02582 4.31628 6.07456 4.23734C6.12331 4.15839 6.19305 4.09457 6.276 4.053L14.276 0.0530045C14.3523 0.0148103 14.4371 -0.00321934 14.5224 0.00063155C14.6076 0.00448244 14.6904 0.0300857 14.763 0.0750045ZM6 8.69401L1 10.36V15H6V8.69401ZM7 15H9V13.5C9 13.3674 9.05268 13.2402 9.14645 13.1465C9.24021 13.0527 9.36739 13 9.5 13H11.5C11.6326 13 11.7598 13.0527 11.8536 13.1465C11.9473 13.2402 12 13.3674 12 13.5V15H14V1.309L7 4.809V15Z" />
                <path class="fill-secondary" d="M2 11H3V12H2V11ZM4 11H5V12H4V11ZM2 13H3V14H2V13ZM4 13H5V14H4V13ZM8 9H9V10H8V9ZM10 9H11V10H10V9ZM8 11H9V12H8V11ZM10 11H11V12H10V11ZM12 9H13V10H12V9ZM12 11H13V12H12V11ZM8 7H9V8H8V7ZM10 7H11V8H10V7ZM12 7H13V8H12V7ZM8 5H9V6H8V5ZM10 5H11V6H10V5ZM12 5H13V6H12V5ZM12 3H13V4H12V3Z" />
              </svg>
              <span class="ms-2">Agent Properties</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="agent_properties">
             <li> <a class="m-link" href="{{ route('agent.agent_properties')}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M8 1L0 7.5 1.5 9V15h4v-4h3v4h4v-6.5L8 1zm4 13h-3v-4H7v4H4v-6.5L8 4l4 3.5V14z"/>
</svg>
             
              <span class="ms-2">Total Properties</span>
              
            </a></li>
             <!--  <li> <a class="m-link" href="{{ route('agent.property-sale-add') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M8 1L0 7.5 1.5 9V15h4v-4h3v4h4v-6.5L8 1zm4 13h-3v-4H7v4H4v-6.5L8 4l4 3.5V14zM8.5 8h-1v1H7v-1H6V7h1V6h.5v1H9v1h-.5v1z"/>
</svg>      
              <span class="ms-2">Property For Sale</span>
              
            </a></li> -->

             <!--  <li> <a class="m-link" href="{{ route('agent.property-rent-add') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M8 1L0 7.5 1.5 9V15h4v-4h3v4h4v-6.5L8 1zm4 13h-3v-4H7v4H4v-6.5L8 4l4 3.5V14zM8.5 8h-1v1H7v-1H6V7h1V6h.5v1H9v1h-.5v1z"/>
</svg><span class="ms-2" >Property For Rent</span>
              </a></li> -->
<li> <a class="m-link" href="{{ route('agent.projects_list') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M12.5 6.5h-1v-1h1v1zm0-3h-1v1h1V3zm-2 3h-1v-1h1v1zm0-3h-1v1h1V3zm-2 3h-1v-1h1v1zm0-3h-1v1h1V3zM4.5 7.5H3v1h1V7.5zm-1-3H3v1h.5V4.5zm0 6H3v1h.5v-1zm-1-3H3v1h.5V7.5zm8-5H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM9 14H3v-1h6v1zm4-3H3V4h10v7zm1 0v-1h1v1h-1zm0-3h1v1h-1V8zm0-3h1v1h-1V5z"/>
</svg><span class="ms-2">Projects</span>
              </a></li>

              <li> <a class="m-link" href="{{ route('agent.project_add') }}"><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path class="fill-secondary" d="M12.5 6.5h-1v-1h1v1zm0-3h-1v1h1V3zm-2 3h-1v-1h1v1zm0-3h-1v1h1V3zm-2 3h-1v-1h1v1zm0-3h-1v1h1V3zM4.5 7.5H3v1h1V7.5zm-1-3H3v1h.5V4.5zm0 6H3v1h.5v-1zm-1-3H3v1h.5V7.5zm8-5H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM9 14H3v-1h6v1zm4-3H3V4h10v7zm1 0v-1h1v1h-1zm0-3h1v1h-1V8zm0-3h1v1h-1V5z"/>
</svg><span class="ms-2">Add Projects</span>
              </a></li>

            </ul>
          </li>
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_agents" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-secondary" d="M15 14C15 14 16 14 16 13C16 12 15 9 11 9C7 9 6 12 6 13C6 14 7 14 7 14H15ZM7.022 13C7.01461 12.999 7.00727 12.9976 7 12.996C7.001 12.732 7.167 11.966 7.76 11.276C8.312 10.629 9.282 10 11 10C12.717 10 13.687 10.63 14.24 11.276C14.833 11.966 14.998 12.733 15 12.996L14.992 12.998C14.9874 12.9988 14.9827 12.9995 14.978 13H7.022ZM11 7C11.5304 7 12.0391 6.78929 12.4142 6.41421C12.7893 6.03914 13 5.53043 13 5C13 4.46957 12.7893 3.96086 12.4142 3.58579C12.0391 3.21071 11.5304 3 11 3C10.4696 3 9.96086 3.21071 9.58579 3.58579C9.21071 3.96086 9 4.46957 9 5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7ZM14 5C14 5.39397 13.9224 5.78407 13.7716 6.14805C13.6209 6.51203 13.3999 6.84274 13.1213 7.12132C12.8427 7.3999 12.512 7.62087 12.1481 7.77164C11.7841 7.9224 11.394 8 11 8C10.606 8 10.2159 7.9224 9.85195 7.77164C9.48797 7.62087 9.15725 7.3999 8.87868 7.12132C8.6001 6.84274 8.37913 6.51203 8.22836 6.14805C8.0776 5.78407 8 5.39397 8 5C8 4.20435 8.31607 3.44129 8.87868 2.87868C9.44129 2.31607 10.2044 2 11 2C11.7956 2 12.5587 2.31607 13.1213 2.87868C13.6839 3.44129 14 4.20435 14 5Z"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.216 14C5.06776 13.6878 4.99382 13.3455 5 13C5 11.645 5.68 10.25 6.936 9.28C6.30909 9.08684 5.65595 8.99237 5 9C1 9 0 12 0 13C0 14 1 14 1 14H5.216Z"></path>
                <path d="M4.5 8C5.16304 8 5.79893 7.73661 6.26777 7.26777C6.73661 6.79893 7 6.16304 7 5.5C7 4.83696 6.73661 4.20107 6.26777 3.73223C5.79893 3.26339 5.16304 3 4.5 3C3.83696 3 3.20107 3.26339 2.73223 3.73223C2.26339 4.20107 2 4.83696 2 5.5C2 6.16304 2.26339 6.79893 2.73223 7.26777C3.20107 7.73661 3.83696 8 4.5 8Z"></path>
              </svg>
              <span class="ms-2">Agents</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="menu_agents">
             </li>
<li> <a class="m-link" href="">
  
<svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
  <path d="M7.5 0C3.358 0 0 3.358 0 7.5S3.358 15 7.5 15 15 11.642 15 7.5 11.642 0 7.5 0zm0 1C11.089 1 14 3.911 14 7.5S11.089 14 7.5 14 1 11.089 1 7.5 3.911 1 7.5 1zm0 2.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zm0 1a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/>
  <path d="M7.5 7a.5.5 0 0 0-.5.5v2.5a.5.5 0 0 0 1 0V8.707l1.146 1.147a.5.5 0 0 0 .708-.708l-1.5-1.5a.5.5 0 0 0-.354-.146z"/>
</svg>


<span class="ms-2">Refer Agent</span>
              </a></li>
    </ul>
          </li>
<!--          <li class="collapsed">-->
<!--            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_types" href="#">-->
<!--              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--                <path class="fill-secondary" d="M3 2V6.586L10 13.586L14.586 9L7.586 2H3ZM2 2C2 1.73478 2.10536 1.48043 2.29289 1.29289C2.48043 1.10536 2.73478 1 3 1H7.586C7.85119 1.00006 8.10551 1.10545 8.293 1.293L15.293 8.293C15.4805 8.48053 15.5858 8.73484 15.5858 9C15.5858 9.26516 15.4805 9.51947 15.293 9.707L10.707 14.293C10.5195 14.4805 10.2652 14.5858 10 14.5858C9.73484 14.5858 9.48053 14.4805 9.293 14.293L2.293 7.293C2.10545 7.10551 2.00006 6.85119 2 6.586V2Z" />-->
<!--                <path d="M5.5 5C5.36739 5 5.24021 4.94732 5.14645 4.85355C5.05268 4.75979 5 4.63261 5 4.5C5 4.36739 5.05268 4.24021 5.14645 4.14645C5.24021 4.05268 5.36739 4 5.5 4C5.63261 4 5.75979 4.05268 5.85355 4.14645C5.94732 4.24021 6 4.36739 6 4.5C6 4.63261 5.94732 4.75979 5.85355 4.85355C5.75979 4.94732 5.63261 5 5.5 5ZM5.5 6C5.89782 6 6.27936 5.84196 6.56066 5.56066C6.84196 5.27936 7 4.89782 7 4.5C7 4.10218 6.84196 3.72064 6.56066 3.43934C6.27936 3.15804 5.89782 3 5.5 3C5.10218 3 4.72064 3.15804 4.43934 3.43934C4.15804 3.72064 4 4.10218 4 4.5C4 4.89782 4.15804 5.27936 4.43934 5.56066C4.72064 5.84196 5.10218 6 5.5 6ZM1 7.086C1.00006 7.35119 1.10545 7.60551 1.293 7.793L8.75 15.25L8.707 15.293C8.51947 15.4805 8.26516 15.5858 8 15.5858C7.73484 15.5858 7.48053 15.4805 7.293 15.293L0.293 8.293C0.105451 8.10551 5.66374e-05 7.85119 0 7.586L0 3C0 2.73478 0.105357 2.48043 0.292893 2.29289C0.48043 2.10536 0.734784 2 1 2V7.086Z" />-->
<!--              </svg>-->
<!--              <span class="ms-2">Agreement</span>-->
<!--              <span class="arrow fa fa-angle-right ms-auto text-end"></span>-->
<!--            </a>-->
<!--             Menu: Sub menu ul -->
<!--            <ul class="sub-menu collapse" id="menu_types">-->
             
<!--               <li> <a class="m-link" href="#">-->
<!--<svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--  <path class="fill-secondary" d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />-->
<!--  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />-->
<!--</svg>-->




<!--<span class="ms-2">Comapany Agreements</span>-->
<!--              </a></li>-->
<!--            </ul>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a class="m-link" href="our-centres.html">-->
<!--              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--                <path d="M3.1 11.2C3.14657 11.1379 3.20697 11.0875 3.27639 11.0528C3.34582 11.0181 3.42238 11 3.5 11H6C6.13261 11 6.25979 11.0527 6.35355 11.1464C6.44732 11.2402 6.5 11.3674 6.5 11.5C6.5 11.6326 6.44732 11.7598 6.35355 11.8536C6.25979 11.9473 6.13261 12 6 12H3.75L1.5 15H14.5L12.25 12H10C9.86739 12 9.74021 11.9473 9.64645 11.8536C9.55268 11.7598 9.5 11.6326 9.5 11.5C9.5 11.3674 9.55268 11.2402 9.64645 11.1464C9.74021 11.0527 9.86739 11 10 11H12.5C12.5776 11 12.6542 11.0181 12.7236 11.0528C12.793 11.0875 12.8534 11.1379 12.9 11.2L15.9 15.2C15.9557 15.2743 15.9896 15.3626 15.998 15.4551C16.0063 15.5476 15.9887 15.6406 15.9472 15.7236C15.9057 15.8067 15.8419 15.8765 15.7629 15.9253C15.6839 15.9741 15.5929 16 15.5 16H0.5C0.407144 16 0.316123 15.9741 0.237135 15.9253C0.158147 15.8765 0.0943131 15.8067 0.0527866 15.7236C0.0112602 15.6406 -0.00631841 15.5476 0.00202058 15.4551C0.0103596 15.3626 0.0442867 15.2743 0.1 15.2L3.1 11.2Z" />-->
<!--                <path class="fill-secondary" d="M8 0.999996C7.60603 0.999996 7.21593 1.07759 6.85195 1.22836C6.48797 1.37912 6.15726 1.6001 5.87868 1.87868C5.6001 2.15725 5.37913 2.48797 5.22836 2.85195C5.0776 3.21592 5 3.60603 5 4C5 4.39396 5.0776 4.78407 5.22836 5.14805C5.37913 5.51202 5.6001 5.84274 5.87868 6.12132C6.15726 6.39989 6.48797 6.62087 6.85195 6.77163C7.21593 6.9224 7.60603 7 8 7C8.79565 7 9.55871 6.68393 10.1213 6.12132C10.6839 5.55871 11 4.79564 11 4C11 3.20435 10.6839 2.44128 10.1213 1.87868C9.55871 1.31607 8.79565 0.999996 8 0.999996V0.999996ZM4 4C4.00007 3.23022 4.22226 2.47682 4.63989 1.83019C5.05753 1.18356 5.65288 0.671167 6.3545 0.354502C7.05613 0.0378371 7.83422 -0.0696522 8.59542 0.0449322C9.35662 0.159517 10.0686 0.491307 10.6459 1.00049C11.2232 1.50968 11.6413 2.17463 11.8501 2.91555C12.0589 3.65647 12.0494 4.4419 11.8228 5.17758C11.5963 5.91326 11.1623 6.56795 10.5729 7.06309C9.98349 7.55822 9.26374 7.87277 8.5 7.969V13.5C8.5 13.6326 8.44732 13.7598 8.35355 13.8535C8.25979 13.9473 8.13261 14 8 14C7.86739 14 7.74022 13.9473 7.64645 13.8535C7.55268 13.7598 7.5 13.6326 7.5 13.5V7.97C6.53297 7.84816 5.64369 7.37743 4.99922 6.64623C4.35474 5.91503 3.99942 4.97368 4 3.999V4Z" />-->
<!--              </svg>-->
<!--              <span class="ms-2">Company Sites</span>-->
<!--            </a>-->
<!--          </li>-->
<!--           <li>-->
<!--            <a class="m-link" href="app-chat.html">-->
<!--             <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--  <path class="fill-secondary" d="M14 2H2C0.9 2 0 2.9 0 4V12C0 13.1 0.9 14 2 14H12L16 16V4C16 2.9 15.1 2 14 2ZM2 12V4H14L12 6H2V12Z"/>-->
<!--</svg>-->

<!--              <span class="ms-2">Chat</span>-->
<!--            </a>-->
<!--          </li>-->
<!--           <li>-->
<!--            <a class="m-link" href="app-tasks.html">-->
<!--              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--  <path class="fill-secondary" d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />-->
<!--  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />-->
<!--</svg>-->

<!--              <span class="ms-2">Task</span>-->
<!--            </a>-->
<!--          </li>-->
<!--           <li>-->
<!--            <a class="m-link" href="app-file-manager.html">-->
<!--              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--  <path d="M12 2H5a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm0 1v2H5V3h7zm0 3V6H5V4h7zm0 2v2H5V6h7zm0 2v2H5v-2h7zm0 2v2H5v-2h7zm-3-9h1v1h-1V1zm0 2h1v1h-1V3zm0 2h1v1h-1V5zm0 2h1v1h-1V7zm0 2h1v1h-1V9zm0 2h1v1h-1v-1z"/>-->
<!--</svg>-->

<!--              <span class="ms-2">File Manager</span>-->
<!--            </a>-->
<!--          </li>-->
<!--           <li>-->
<!--            <a class="m-link" href="app-calendar-tui.html">-->
<!--              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--  <path d="M1 3.5V2a1 1 0 0 1 1-1h1V.5A.5.5 0 0 1 4 0h1a1 1 0 0 1 1 1V1h4V.5A.5.5 0 0 1 11 0h1a1 1 0 0 1 1 1V1h1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h1zm1-2a.5.5 0 0 0-.5.5V3h14V1.5a.5.5 0 0 0-.5-.5h-1V.5a.5.5 0 0 0-.5-.5h-1a1 1 0 0 0-1 1V1H5V.5a.5.5 0 0 0-.5-.5H3zm12 4H1v9h14V5zm-2 2h-3v3h3V7zm-4 0H6v3h1V7z"/>-->
<!--</svg>-->

<!--              <span class="ms-2">Calendar</span>-->
<!--            </a>-->
<!--          </li>-->
<!--        </ul>-->
<!--        <ul class="menu-list">-->
<!--          <li class="collapsed">-->
<!--            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Authentication" href="#">-->
<!--              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--                <path d="M5.33801 1.59C4.38559 1.85248 3.43965 2.1379 2.50101 2.446C2.41529 2.47376 2.3391 2.52504 2.28111 2.59399C2.22312 2.66295 2.18567 2.7468 2.17301 2.836C1.61901 6.993 2.89901 10.026 4.42601 12.024C5.07252 12.8784 5.84341 13.6311 6.71301 14.257C7.05901 14.501 7.36501 14.677 7.60601 14.79C7.72601 14.847 7.82401 14.885 7.89901 14.908C7.93181 14.9195 7.96562 14.9279 8.00001 14.933C8.03398 14.9275 8.06743 14.9191 8.10001 14.908C8.17601 14.885 8.27401 14.847 8.39401 14.79C8.63401 14.677 8.94101 14.5 9.28701 14.257C10.1566 13.6311 10.9275 12.8784 11.574 12.024C13.101 10.027 14.381 6.993 13.827 2.836C13.8145 2.74676 13.777 2.66285 13.719 2.59388C13.661 2.52491 13.5848 2.47366 13.499 2.446C12.848 2.233 11.749 1.886 10.662 1.591C9.55201 1.29 8.53101 1.067 8.00001 1.067C7.47001 1.067 6.44801 1.289 5.33801 1.59ZM5.07201 0.56C6.15701 0.265 7.31001 0 8.00001 0C8.69001 0 9.84301 0.265 10.928 0.56C12.038 0.86 13.157 1.215 13.815 1.43C14.0901 1.52085 14.334 1.68747 14.5187 1.9107C14.7034 2.13394 14.8213 2.40474 14.859 2.692C15.455 7.169 14.072 10.487 12.394 12.682C11.6824 13.621 10.834 14.4479 9.87701 15.135C9.5461 15.3728 9.19549 15.5819 8.82901 15.76C8.54901 15.892 8.24801 16 8.00001 16C7.75201 16 7.45201 15.892 7.17101 15.76C6.80452 15.5819 6.45391 15.3728 6.12301 15.135C5.16603 14.4478 4.31759 13.621 3.60601 12.682C1.92801 10.487 0.545005 7.169 1.14101 2.692C1.17869 2.40474 1.29665 2.13394 1.48132 1.9107C1.666 1.68747 1.9099 1.52085 2.18501 1.43C3.1402 1.11681 4.10281 0.826725 5.07201 0.56Z" />-->
<!--                <path class="fill-secondary" d="M8 5.38462C8.21217 5.38462 8.41566 5.46566 8.56569 5.60992C8.71571 5.75418 8.8 5.94983 8.8 6.15385V6.53846H7.2V6.15385C7.2 5.94983 7.28429 5.75418 7.43431 5.60992C7.58434 5.46566 7.78783 5.38462 8 5.38462ZM9.2 6.53846V6.15385C9.2 5.84783 9.07357 5.55434 8.84853 5.33795C8.62348 5.12157 8.31826 5 8 5C7.68174 5 7.37652 5.12157 7.15147 5.33795C6.92643 5.55434 6.8 5.84783 6.8 6.15385V6.53846C6.58783 6.53846 6.38434 6.61951 6.23431 6.76376C6.08429 6.90802 6 7.10368 6 7.30769V9.23077C6 9.43478 6.08429 9.63044 6.23431 9.7747C6.38434 9.91896 6.58783 10 6.8 10H9.2C9.41217 10 9.61566 9.91896 9.76569 9.7747C9.91571 9.63044 10 9.43478 10 9.23077V7.30769C10 7.10368 9.91571 6.90802 9.76569 6.76376C9.61566 6.61951 9.41217 6.53846 9.2 6.53846Z" />-->
<!--              </svg>-->
<!--              <span class="ms-2">Security Documents</span>-->
<!--              <span class="arrow fa fa-angle-right ms-auto text-end"></span>-->
<!--            </a>-->
            <!-- Menu: Sub menu ul -->
<!--            <ul class="sub-menu collapse" id="menu-Authentication">-->
            <!--  <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-404.html">404</a></li>
<!--              <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-403.html">403</a></li>-->
<!--              <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-500.html">500</a></li>-->
<!--              <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-signin.html">Sign in</a></li>-->
<!--              <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-signup.html">Sign up</a></li>-->
<!--              <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-password-reset.html">Password reset</a></li>-->
<!--              <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-two-step.html">2-Step Authentication</a></li>-->
<!--              <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-lockscreen.html">Lockscreen</a></li>-->
<!--              <li><a class="ms-link" href="https://www.wrraptheme.com/templates/luno/auth-maintenance.html">Maintenance</a></li>-->
<!--               <li> <a class="m-link" href="#">-->
<!--                 <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--  <path class="fill-secondary" d="M12.5 1H3.5C2.67157 1 2 1.67157 2 2.5V13.5C2 14.3284 2.67157 15 3.5 15H12.5C13.3284 15 14 14.3284 14 13.5V2.5C14 1.67157 13.3284 1 12.5 1ZM10.5 2H12V3.5H10.5V2ZM11 13H4V3H11V13ZM4 14H11V15H4V14Z" />-->
<!--  <path d="M5 4H6V5H5V4ZM8 4H9V5H8V4ZM5 6H6V7H5V6ZM8 6H9V7H8V6ZM5 8H6V9H5V8ZM8 8H9V9H8V8ZM5 10H6V11H5V10ZM8 10H9V11H8V10ZM5 12H6V13H5V12ZM8 12H9V13H8V12Z" />-->
<!--</svg>-->
<!--<span class="ms-2">Legal Documnets</span>-->
<!--              </a></li> -->
<!--            </ul>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a class="m-link" href="https://www.wrraptheme.com/templates/luno/docs/index.html">-->
<!--              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--                <path class="fill-secondary" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />-->
<!--                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />-->
<!--                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />-->
<!--              </svg>-->
<!--              <span class="ms-2">Log Book</span>-->
<!--            </a>-->
<!--          </li>-->
          
<!--           <li class="collapsed">-->
<!--            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Account" href="#">-->
<!--              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />-->
<!--                <path class="fill-secondary" d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />-->
<!--              </svg>-->
<!--              <span class="ms-2">Account Info</span>-->
<!--              <span class="arrow fa fa-angle-right ms-auto text-end"></span>-->
<!--            </a>-->
            <!-- Menu: Sub menu ul -->
<!--            <ul class="sub-menu collapse" id="menu-Account">-->
<!--              <li>-->
<!--            <a class="m-link" href="account-settings.php">-->
<!--             <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--                <path class="fill-secondary" d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />-->
<!--                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />-->
<!--              </svg>-->
<!--              <span class="ms-2">Edit Info</span>-->
              
<!--            </a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a class="m-link" href="account-settings.php">-->
<!--             <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--  <path class="fill-secondary" d="M9.11 2.722C9.03455 2.2507 8.68259 2 8.24998 2C7.81738 2 7.46542 2.2507 7.38998 2.722L6.69 6.362C6.64503 6.62448 6.4761 6.8581 6.21718 6.9749L3.76858 8.0449C3.26474 8.25945 3 8.74263 3 9.27505V11.725C3 12.2543 3.27614 12.7376 3.76858 12.9551L6.21718 14.0251C6.47436 14.1425 6.64503 14.3752 6.69 14.638L7.38998 18.278C7.46542 18.7493 7.81738 19 8.24998 19C8.68259 19 9.03455 18.7493 9.11 18.278L9.80998 14.638C9.85495 14.3752 10.0256 14.1415 10.2828 14.0251L12.7314 12.9551C13.2239 12.7376 13.5 12.2543 13.5 11.725V9.27505C13.5 8.74263 13.2353 8.25945 12.7314 8.0449L10.2828 6.9749C10.0239 6.8581 9.85495 6.62448 9.80998 6.362L9.11 2.722ZM8.24998 4C8.7874 4 9.24998 4.46257 9.24998 5C9.24998 5.53743 8.7874 6 8.24998 6C7.71255 6 7.24998 5.53743 7.24998 5C7.24998 4.46257 7.71255 4 8.24998 4Z" />-->
<!--</svg>-->

<!--              <span class="ms-2">Settings</span>-->
              
<!--            </a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a class="m-link" href="account-settings.php">-->
<!--             <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
<!--  <path class="fill-secondary" d="M6 2H4v12h8V2H6zm0-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm1 3h6v2H7V3zm0 4h6v2H7V7zm0 4h6v2H7v-2z"/>-->
<!--</svg>-->

<!--              <span class="ms-2">Invoice List</span>-->
              
<!--            </a>-->
<!--          </li>-->
          
          </li>
        </ul>
      </div>
      <!-- sidebar: footer link -->
      <!-- sidebar: footer link -->
      <ul class="menu-list nav navbar-nav flex-row text-center menu-footer-link">
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal" data-bs-target="#ScheduleModal" title="My Schedule">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path class="fill-secondary" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
              <path class="fill-secondary" d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
            </svg>
          </a>
        </li>
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal" data-bs-target="#MynotesModal" title="My notes">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path class="fill-secondary" d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
              <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
            </svg>
          </a>
        </li>
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal" data-bs-target="#RecentChat">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
              <path class="fill-secondary" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
            </svg>
          </a>
        </li>
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="{{ route('agent.logout')}}" title="sign-out">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path d="M7.5 1v7h1V1h-1z" />
              <path class="fill-secondary" d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- start: body area -->
  <div class="wrapper">
    <!-- start: page header -->
    <header class="page-header sticky-top px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
      <div class="container-fluid">
        <nav class="navbar">
          <!-- start: toggle btn -->
          <div class="d-flex">
            <button type="button" class="btn btn-link d-none d-xl-block sidebar-mini-btn p-0 text-primary">
              <span class="hamburger-icon">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
              </span>
            </button>
            <button type="button" class="btn btn-link d-block d-xl-none menu-toggle p-0 text-primary">
              <span class="hamburger-icon">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
              </span>
            </button>
            <a href="{{ route('agent.dashboard') }}" class="brand-icon d-flex align-items-center mx-2 mx-sm-3 text-primary">
              <img src="{{asset('agent/assets/img/HomeyLo.png')}}" alt="Homey" height="50" width="150">
            </a>
          </div>
          <!-- start: search area -->
          <div class="header-left flex-grow-1 d-none d-md-block">
            <div class="main-search px-3 flex-fill">
              <input class="form-control" type="text" placeholder="Enter your search key word">
              <div class="card shadow rounded-4 search-result slidedown">
                <div class="card-body">
                  <small class="text-uppercase text-muted">Recent searches</small>
                  <div class="d-flex flex-wrap align-items-start mt-2 mb-4">
                    <a class="small rounded py-1 px-2 m-1 fw-normal bg-primary text-white" href="#">HRMS Admin</a>
                    <a class="small rounded py-1 px-2 m-1 fw-normal bg-secondary text-white" href="#">Hospital Admin</a>
                    <a class="small rounded py-1 px-2 m-1 fw-normal bg-info text-white" href="https://www.wrraptheme.com/templates/luno/app-project.html">Project</a>
                    <a class="small rounded py-1 px-2 m-1 fw-normal bg-dark text-white" href="https://www.wrraptheme.com/templates/luno/app-social.html">Social App</a>
                    <a class="small rounded py-1 px-2 m-1 fw-normal bg-danger text-white" href="#">University Admin</a>
                  </div>
                  <small class="text-uppercase text-muted">Suggestions</small>
                  <div class="card list-group list-group-flush list-group-custom mt-2">
                    <a class="list-group-item list-group-item-action text-truncate" href="https://www.wrraptheme.com/templates/luno//docs/doc-helperclass.html">
                      <div class="fw-bold">Helper Class</div>
                      <small class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                    </a>
                    <a class="list-group-item list-group-item-action text-truncate" href="https://www.wrraptheme.com/templates/luno//docs/element-daterange.html">
                      <div class="fw-bold">Date Range Picker</div>
                      <small class="text-muted">There are many variations of passages of Lorem Ipsum available</small>
                    </a>
                    <a class="list-group-item list-group-item-action text-truncate" href="https://www.wrraptheme.com/templates/luno//docs/element-imageinput.html">
                      <div class="fw-bold">Image Input</div>
                      <small class="text-muted">It is a long established fact that a reader will be distracted</small>
                    </a>
                    <a class="list-group-item list-group-item-action text-truncate" href="https://www.wrraptheme.com/templates/luno//docs/plugin-table.html">
                      <div class="fw-bold">DataTables for jQuery</div>
                      <small class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                    </a>
                    <a class="list-group-item list-group-item-action text-truncate" href="https://www.wrraptheme.com/templates/luno//docs/doc-setup.html">
                      <div class="fw-bold">Development Setup</div>
                      <small class="text-muted">Contrary to popular belief, Lorem Ipsum is not simply random text.</small>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- start: link -->
          <ul class="header-right justify-content-end d-flex align-items-center mb-0">
            <!-- start: notifications dropdown-menu -->
            <li>
              <div class="dropdown morphing scale-left notifications">
                <a class="nav-link dropdown-toggle after-none" href="#" role="button" data-bs-toggle="dropdown">
                  <span class="d-none d-xl-block me-2">Notification</span>
                  <svg class="d-inline-block d-xl-none" viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 1.91802L7.203 2.07902C6.29896 2.26322 5.48633 2.75412 4.90265 3.46864C4.31897 4.18316 4.0001 5.07741 4 6.00002C4 6.62802 3.866 8.19702 3.541 9.74202C3.381 10.509 3.165 11.308 2.878 12H13.122C12.835 11.308 12.62 10.51 12.459 9.74202C12.134 8.19702 12 6.62802 12 6.00002C11.9997 5.07758 11.6807 4.18357 11.097 3.46926C10.5134 2.75494 9.70087 2.26419 8.797 2.08002L8 1.91802ZM14.22 12C14.443 12.447 14.701 12.801 15 13H1C1.299 12.801 1.557 12.447 1.78 12C2.68 10.2 3 6.88002 3 6.00002C3 3.58002 4.72 1.56002 7.005 1.09902C6.99104 0.959974 7.00638 0.819547 7.05003 0.686794C7.09368 0.554041 7.16467 0.43191 7.25842 0.328279C7.35217 0.224647 7.4666 0.141815 7.59433 0.085125C7.72206 0.028435 7.86026 -0.000854492 8 -0.000854492C8.13974 -0.000854492 8.27794 0.028435 8.40567 0.085125C8.5334 0.141815 8.64783 0.224647 8.74158 0.328279C8.83533 0.43191 8.90632 0.554041 8.94997 0.686794C8.99362 0.819547 9.00896 0.959974 8.995 1.09902C10.1253 1.32892 11.1414 1.94238 11.8712 2.83552C12.6011 3.72866 12.9999 4.84659 13 6.00002C13 6.88002 13.32 10.2 14.22 12Z" />
                    <path class="fill-secondary" d="M9.41421 15.4142C9.03914 15.7893 8.53043 16 8 16C7.46957 16 6.96086 15.7893 6.58579 15.4142C6.21071 15.0391 6 14.5304 6 14H10C10 14.5304 9.78929 15.0391 9.41421 15.4142Z" fill="black" />
                  </svg>
                </a>
                <div id="NotificationsDiv" class="dropdown-menu shadow rounded-4 border-0 p-0 m-0">
                  <div class="card w380">
                    <div class="card-header p-3">
                      <h6 class="card-title mb-0">Notifications Center</h6>
                      <span class="badge bg-danger text-light">15</span>
                    </div>
                    <ul class="nav nav-tabs tab-card d-flex text-center" role="tablist">
                      <li class="nav-item flex-fill"><a class="nav-link active" data-bs-toggle="tab" href="#Noti-tab-Message" role="tab">Message</a></li>
                      <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab" href="#Noti-tab-Events" role="tab">Events</a></li>
                      <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab" href="#Noti-tab-Logs" role="tab">Logs</a></li>
                    </ul>
                    <div class="tab-content card-body custom_scroll">
                      <div class="tab-pane fade show active" id="Noti-tab-Message" role="tabpanel">
                        <ul class="list-unstyled list mb-0">
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="{{asset('agent/assets/img/xs/avatar5.jpg')}}" alt="">
                              <div class="flex-fill ms-3">
                                <p class="d-flex justify-content-between mb-0"><span>Olive Tree</span> <small>13MIN</small></p>
                                <span>making it over 2000 years old</span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="{{asset('agent/assets/img/xs/avatar6.jpg')}}" alt="">
                              <div class="flex-fill ms-3">
                                <p class="d-flex justify-content-between mb-0"><span>Del Phineum</span> <small>1HR</small></p>
                                <span>There are many variations of passages</span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="{{asset('agent/assets/img/xs/avatar1.jpg')}}"alt="">
                              <div class="flex-fill ms-3">
                                <p class="d-flex justify-content-between mb-0"><span>Rose Bush</span> <small>2MIN</small></p>
                                <span>changed an issue from "In Progress" to <span class="badge bg-success">Review</span></span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <div class="avatar rounded-circle no-thumbnail">PT</div>
                              <div class="flex-fill ms-3">
                                <p class="d-flex justify-content-between mb-0"><span>Pat Thettick</span> <small>13MIN</small></p>
                                <span>It is a long established fact that a reader will be distracted</span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="{{asset('agent/assets/img/xs/avatar3.jpg')}}" alt="">
                              <div class="flex-fill ms-3">
                                <p class="d-flex justify-content-between mb-0"><span>Eileen Dover</span> <small>1HR</small></p>
                                <span>There are many variations of passages</span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="{{asset('agent/assets/img/xs/avatar4.jpg')}}" alt="">
                              <div class="flex-fill ms-3">
                                <p class="d-flex justify-content-between mb-0"><span>Carmen Goh</span> <small>1DAY</small></p>
                                <span>Contrary to popular belief <span class="badge bg-danger">Code</span></span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="{{asset('agent/assets/img/xs/avatar7.jpg')}}" alt="">
                              <div class="flex-fill ms-3">
                                <p class="d-flex justify-content-between mb-0"><span>Karen Onnabit</span> <small>1DAY</small></p>
                                <span>The generated Lorem Ipsum</span>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" id="Noti-tab-Events" role="tabpanel">
                        <ul class="list-unstyled list mb-0">
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <div class="avatar rounded-circle no-thumbnail"><i class="fa fa-thumbs-up fa-lg"></i></div>
                              <div class="flex-fill ms-3">
                                <p class="mb-0">Your New Campaign <strong class="text-primary">Holiday Sale</strong> is approved.</p>
                                <small>11:30 AM Today</small>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <div class="avatar rounded-circle no-thumbnail"><i class="fa fa-pie-chart fa-lg"></i></div>
                              <div class="flex-fill ms-3">
                                <p class="mb-0">Website visits from Twitter is <strong class="text-danger">27% higher</strong> than last week.</p>
                                <small>04:00 PM Today</small>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <div class="avatar rounded-circle no-thumbnail"><i class="fa fa-info-circle fa-lg"></i></div>
                              <div class="flex-fill ms-3">
                                <p class="mb-0">Campaign <strong class="text-primary">Holiday Sale</strong> is nearly reach budget limit.</p>
                                <small>10:00 AM Today</small>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <div class="avatar rounded-circle no-thumbnail"><i class="fa fa-warning fa-lg"></i></div>
                              <div class="flex-fill ms-3">
                                <p class="mb-0"><strong class="text-warning">Error</strong> on website analytics configurations</p>
                                <small>Yesterday</small>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" id="Noti-tab-Logs" role="tabpanel">
                        <h4 class="color-400">No Logs right now!</h4>
                      </div>
                    </div>
                    <a href="#" class="btn btn-primary text-light rounded-0">View all notifications</a>
                  </div>
                </div>
              </div>
            </li>
            <!-- start: quick light dark -->
            <li class="d-none d-xl-inline-block">
              <a class="nav-link fullscreen" href="javascript:void(0);" onclick="toggleFullScreen(documentElement)">
                <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8279 10.172C5.73414 10.0783 5.60698 10.0256 5.4744 10.0256C5.34182 10.0256 5.21467 10.0783 5.1209 10.172L1.0249 14.268V11.5C1.0249 11.3674 0.972224 11.2402 0.878456 11.1464C0.784688 11.0527 0.657511 11 0.524902 11C0.392294 11 0.265117 11.0527 0.171349 11.1464C0.0775808 11.2402 0.0249023 11.3674 0.0249023 11.5V15.475C0.0249023 15.6076 0.0775808 15.7348 0.171349 15.8285C0.265117 15.9223 0.392294 15.975 0.524902 15.975H4.4999C4.63251 15.975 4.75969 15.9223 4.85346 15.8285C4.94722 15.7348 4.9999 15.6076 4.9999 15.475C4.9999 15.3424 4.94722 15.2152 4.85346 15.1214C4.75969 15.0277 4.63251 14.975 4.4999 14.975H1.7319L5.8279 10.879C5.92164 10.7852 5.9743 10.6581 5.9743 10.5255C5.9743 10.3929 5.92164 10.2658 5.8279 10.172ZM10.1719 10.172C10.2657 10.0783 10.3928 10.0256 10.5254 10.0256C10.658 10.0256 10.7851 10.0783 10.8789 10.172L14.9749 14.268V11.5C14.9749 11.3674 15.0276 11.2402 15.1213 11.1464C15.2151 11.0527 15.3423 11 15.4749 11C15.6075 11 15.7347 11.0527 15.8285 11.1464C15.9222 11.2402 15.9749 11.3674 15.9749 11.5V15.475C15.9749 15.6076 15.9222 15.7348 15.8285 15.8285C15.7347 15.9223 15.6075 15.975 15.4749 15.975H11.4999C11.3673 15.975 11.2401 15.9223 11.1463 15.8285C11.0526 15.7348 10.9999 15.6076 10.9999 15.475C10.9999 15.3424 11.0526 15.2152 11.1463 15.1214C11.2401 15.0277 11.3673 14.975 11.4999 14.975H14.2679L10.1719 10.879C10.0782 10.7852 10.0255 10.6581 10.0255 10.5255C10.0255 10.3929 10.0782 10.2658 10.1719 10.172ZM5.8279 5.82799C5.73414 5.92173 5.60698 5.97439 5.4744 5.97439C5.34182 5.97439 5.21467 5.92173 5.1209 5.82799L1.0249 1.73199V4.49999C1.0249 4.6326 0.972224 4.75978 0.878456 4.85355C0.784688 4.94732 0.657511 4.99999 0.524902 4.99999C0.392294 4.99999 0.265117 4.94732 0.171349 4.85355C0.0775808 4.75978 0.0249023 4.6326 0.0249023 4.49999V0.524994C0.0249023 0.392386 0.0775808 0.265209 0.171349 0.17144C0.265117 0.0776723 0.392294 0.0249939 0.524902 0.0249939H4.4999C4.63251 0.0249939 4.75969 0.0776723 4.85346 0.17144C4.94722 0.265209 4.9999 0.392386 4.9999 0.524994C4.9999 0.657602 4.94722 0.784779 4.85346 0.878547C4.75969 0.972315 4.63251 1.02499 4.4999 1.02499H1.7319L5.8279 5.12099C5.92164 5.21476 5.9743 5.34191 5.9743 5.47449C5.9743 5.60708 5.92164 5.73423 5.8279 5.82799Z" />
                  <path class="fill-secondary" d="M10.5253 5.97439C10.3927 5.97439 10.2655 5.92173 10.1718 5.82799C10.078 5.73423 10.0254 5.60708 10.0254 5.47449C10.0254 5.34191 10.078 5.21476 10.1718 5.12099L14.2678 1.02499H11.4998C11.3672 1.02499 11.24 0.972315 11.1462 0.878547C11.0525 0.784779 10.9998 0.657602 10.9998 0.524994C10.9998 0.392386 11.0525 0.265209 11.1462 0.17144C11.24 0.0776723 11.3672 0.0249939 11.4998 0.0249939H15.4748C15.6074 0.0249939 15.7346 0.0776723 15.8283 0.17144C15.9221 0.265209 15.9748 0.392386 15.9748 0.524994V4.49999C15.9748 4.6326 15.9221 4.75978 15.8283 4.85355C15.7346 4.94732 15.6074 4.99999 15.4748 4.99999C15.3422 4.99999 15.215 4.94732 15.1212 4.85355C15.0275 4.75978 14.9748 4.6326 14.9748 4.49999V1.73199L10.8788 5.82799C10.785 5.92173 10.6579 5.97439 10.5253 5.97439Z" />
                </svg>
              </a>
            </li>
            <!-- start: Language dropdown-menu -->
            <li class="d-none d-xl-inline-block">
              <div class="dropdown morphing scale-left Language">
                <a class="nav-link dropdown-toggle after-none" href="#" role="button" data-bs-toggle="dropdown">
                  <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path class="fill-secondary" d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z" />
                    <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z" />
                  </svg>
                </a>
                <div class="dropdown-menu rounded-4 shadow border-0 p-0" data-bs-popper="none">
                  <div class="card">
                    <div class="list-group list-group-custom" style="width: 200px;">
                      <a href="#" class="list-group-item"><span class="flag-icon flag-icon-gb me-2"></span>UK English</a>
                      <a href="#" class="list-group-item"><span class="flag-icon flag-icon-us me-2"></span>US English</a>
                      <a href="#" class="list-group-item"><span class="flag-icon flag-icon-de me-2"></span>Germany</a>
                      <a href="#" class="list-group-item"><span class="flag-icon flag-icon-in me-2"></span>Hindi</a>
                      <a href="#" class="list-group-item"><span class="flag-icon flag-icon-sa me-2"></span>Saudi Arabia</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <!-- start: Grid app dropdown-menu -->
            <li class="d-none d-lg-inline-block">
              <div class="dropdown morphing scale-left grid-menu">
                <a class="nav-link dropdown-toggle after-none" href="#" role="button" data-bs-toggle="dropdown">
                  <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 10H5C5.26522 10 5.51957 10.1054 5.70711 10.2929C5.89464 10.4804 6 10.7348 6 11V14C6 14.2652 5.89464 14.5196 5.70711 14.7071C5.51957 14.8946 5.26522 15 5 15H2C1.73478 15 1.48043 14.8946 1.29289 14.7071C1.10536 14.5196 1 14.2652 1 14V11C1 10.7348 1.10536 10.4804 1.29289 10.2929C1.48043 10.1054 1.73478 10 2 10ZM11 1H14C14.2652 1 14.5196 1.10536 14.7071 1.29289C14.8946 1.48043 15 1.73478 15 2V5C15 5.26522 14.8946 5.51957 14.7071 5.70711C14.5196 5.89464 14.2652 6 14 6H11C10.7348 6 10.4804 5.89464 10.2929 5.70711C10.1054 5.51957 10 5.26522 10 5V2C10 1.73478 10.1054 1.48043 10.2929 1.29289C10.4804 1.10536 10.7348 1 11 1ZM11 10C10.7348 10 10.4804 10.1054 10.2929 10.2929C10.1054 10.4804 10 10.7348 10 11V14C10 14.2652 10.1054 14.5196 10.2929 14.7071C10.4804 14.8946 10.7348 15 11 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V11C15 10.7348 14.8946 10.4804 14.7071 10.2929C14.5196 10.1054 14.2652 10 14 10H11ZM11 0C10.4696 0 9.96086 0.210714 9.58579 0.585786C9.21071 0.960859 9 1.46957 9 2V5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7H14C14.5304 7 15.0391 6.78929 15.4142 6.41421C15.7893 6.03914 16 5.53043 16 5V2C16 1.46957 15.7893 0.960859 15.4142 0.585786C15.0391 0.210714 14.5304 0 14 0L11 0ZM2 9C1.46957 9 0.960859 9.21071 0.585786 9.58579C0.210714 9.96086 0 10.4696 0 11L0 14C0 14.5304 0.210714 15.0391 0.585786 15.4142C0.960859 15.7893 1.46957 16 2 16H5C5.53043 16 6.03914 15.7893 6.41421 15.4142C6.78929 15.0391 7 14.5304 7 14V11C7 10.4696 6.78929 9.96086 6.41421 9.58579C6.03914 9.21071 5.53043 9 5 9H2ZM9 11C9 10.4696 9.21071 9.96086 9.58579 9.58579C9.96086 9.21071 10.4696 9 11 9H14C14.5304 9 15.0391 9.21071 15.4142 9.58579C15.7893 9.96086 16 10.4696 16 11V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H11C10.4696 16 9.96086 15.7893 9.58579 15.4142C9.21071 15.0391 9 14.5304 9 14V11Z" />
                    <path class="fill-secondary" d="M0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V5C0 5.53043 0.210714 6.03914 0.585786 6.41421C0.960859 6.78929 1.46957 7 2 7H5C5.53043 7 6.03914 6.78929 6.41421 6.41421C6.78929 6.03914 7 5.53043 7 5V2C7 1.46957 6.78929 0.960859 6.41421 0.585786C6.03914 0.210714 5.53043 0 5 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786Z" />
                  </svg>
                </a>
                <div class="dropdown-menu rounded-4 shadow border-0 p-0" data-bs-popper="none">
                  <div class="card">
                    <div class="row g-1 text-center p-3" style="width: 302px;">
                      <div class="col-6">
                        <a class="card p-3 color-600 lift align-items-center" href="https://www.wrraptheme.com/templates/luno/dashboard.html" title="">
                          <svg viewBox="0 0 16 16" width="30px" class="mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-secondary" d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                          </svg>
                          <p class="mb-0 color-600">Dashboard</p>
                          <small class="text-muted">View All</small>
                        </a>
                      </div>
                      <div class="col-6">
                        <a class="card p-3 color-600 lift align-items-center" href="https://www.wrraptheme.com/templates/luno/app.html" title="">
                          <svg viewBox="0 0 16 16" width="30px" class="mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                            <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                          </svg>
                          <p class="mb-0 color-600">Application</p>
                          <small class="text-muted">View All</small>
                        </a>
                      </div>
                      <div class="col-6">
                        <a class="card p-3 color-600 lift align-items-center" href="https://www.wrraptheme.com/templates/luno/crafted-page.html" title="">
                          <svg viewBox="0 0 16 16" width="30px" class="mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 4.5V9H13V4.5H11C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V9H2V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM13 12H14V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H4C3.46957 16 2.96086 15.7893 2.58579 15.4142C2.21071 15.0391 2 14.5304 2 14V12H3V14C3 14.2652 3.10536 14.5196 3.29289 14.7071C3.48043 14.8946 3.73478 15 4 15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V12Z" />
                            <path class="fill-secondary" d="M0.146447 10.1464C0.240215 10.0527 0.367392 10 0.5 10H15.5C15.6326 10 15.7598 10.0527 15.8536 10.1464C15.9473 10.2402 16 10.3674 16 10.5C16 10.6326 15.9473 10.7598 15.8536 10.8536C15.7598 10.9473 15.6326 11 15.5 11H0.5C0.367392 11 0.240215 10.9473 0.146447 10.8536C0.0526784 10.7598 0 10.6326 0 10.5C0 10.3674 0.0526784 10.2402 0.146447 10.1464Z" fill="black" />
                          </svg>
                          <p class="mb-0 color-600">Pages</p>
                          <small class="text-muted">Crafted Pages</small>
                        </a>
                      </div>
                      <div class="col-6">
                        <a class="card p-3 color-600 lift align-items-center" href="https://www.wrraptheme.com/templates/luno/layouts.html" title="">
                          <svg viewBox="0 0 16 16" width="30px" class="mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 2a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h12zM2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
                            <path class="fill-secondary" d="M3 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                          </svg>
                          <p class="mb-0 color-600">Layouts</p>
                          <small class="text-muted">Crafted Layout</small>
                        </a>
                      </div>
                    </div> <!-- .row end -->
                  </div>
                </div>
              </div>
            </li>
            <!-- start: My notes toggle modal -->
            <li class="d-none d-sm-inline-block d-xl-none">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#MynotesModal">
                <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path class="fill-secondary" d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                  <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                </svg>
              </a>
            </li>
            <!-- start: Recent Chat toggle modal -->
            <li class="d-none d-sm-inline-block d-xl-none">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#RecentChat">
                <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                  <path class="fill-secondary" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg>
              </a>
            </li>
            <!-- start: quick light dark -->
            <li>
              <a class="nav-link quick-light-dark" href="#">
                <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                  <path class="fill-secondary" d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                </svg>
              </a>
            </li>
            <!-- start: User dropdown-menu -->
            <li>
               @php
                      $item=DB::table('agent_basic_information')->where('agent_id','=', Auth::guard('agent')->user()->agent_id)->first();
                      @endphp
              <div class="dropdown morphing scale-left user-profile mx-lg-3 mx-2">
                <a class="nav-link dropdown-toggle rounded-circle after-none p-0" href="#" role="button" data-bs-toggle="dropdown">
                  <img class="avatar img-thumbnail rounded-circle shadow" src="{{url('/uploads/agents/'.$item->file)}}" alt=" " style=" float: center;">
                </a>
                <div class="dropdown-menu border-0 rounded-4 shadow p-0">
                  <div class="card border-0 w240">
                    <div class="card-body border-bottom d-flex">
                     
                      <img class="avatar rounded-circle" src="{{url('/uploads/agents/'.$item->file)}}" alt="">
                      <div class="flex-fill ms-3">
                        <h6 class="card-title mb-0">{{DB::table('agents')->where(['agent_id' => Auth::guard('agent')->user()->agent_id])->pluck('name')->first();}}</h6>
                        <span class="text-muted">{{DB::table('agents')->where(['agent_id' => Auth::guard('agent')->user()->agent_id])->pluck('agent_id')->first();}}</span>
                      </div>
                    </div>
                    <div class="list-group m-2 mb-3">
                      <a class="list-group-item list-group-item-action border-0" href="{{ route('agent.viewprofile') }}"><i class="w30 fa fa-user"></i>My Profile</a>
                      <a class="list-group-item list-group-item-action border-0" href="account-settings.html"><i class="w30 fa fa-gear"></i>Settings</a>
                      <a class="list-group-item list-group-item-action border-0" href="account-billing.html"><i class="w30 fa fa-credit-card"></i>Billing</a>
                      <a class="list-group-item list-group-item-action border-0" href="https://www.wrraptheme.com/templates/luno/page-teamsboard.html"><i class="w30 fa fa-users"></i>Manage Team</a>
                      <a class="list-group-item list-group-item-action border-0" href="https://www.wrraptheme.com/templates/luno/dashboard-enevt.html"><i class="w30 fa fa-calendar"></i>My Events</a>
                      <a class="list-group-item list-group-item-action border-0" href="https://www.wrraptheme.com/templates/luno/page-support-ticket.html"><i class="w30 fa fa-tag"></i>Support Ticket</a>
                    </div>
                    <a href="{{ route('agent.logout')}}" class="btn bg-secondary text-light text-uppercase rounded-0">Sign out</a>
                  </div>
                </div>
              </div>
            </li>
            <!-- start: Settings toggle modal -->
            <li>
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#SettingsModal" title="Settings">
                <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path class="fill-secondary" d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"></path>
                  <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"></path>
                </svg>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </header>