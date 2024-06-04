@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Agreement List')
@section  ("content")
<div class="dashboard-content">
       <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
 <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                <div class="col-lg-12col-md-6 col-sm-12">
            <div class="card">
                @if(session('message'))   
                  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                   @elseif(session('error'))
                   <div class="alert alert-danger" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                @endif
                 @if ($errors->any())
                   <div class="alert alert-danger">
                            <ul >
                               @foreach ($errors->all() as $error)
                           <li style="color:red">{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div>
                 @endif
              <form method="post" action="{{route('admin.edit-cities',$city->id)}}" id="form" enctype="multipart/form-data">
                                                @csrf
              <div class="card-header">
                <h6 class="card-title mb-0"> Add City</h6>
              </div>
              <div class="card-body">
                <div class="custom-form">
                <div class="row g-3">
                  <div class="col-sm-12">
                  	 <label>City Image :</label>
                      <input type="File" class="form-control form-control" name="city_image" placeholder="Enter here">
                      <label>Old City Image</label>
                      <a href="{{url('uploads/cities/'.$city->city_image)}}" class="btn btn-icon btn-sm color-bg" target=”_blank”>View</a>
                  </div>
                  <div class="col-sm-6">
                    
                    	<label>Name :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="city_name" value="{{$city->city_name}}" placeholder="Enter here" >
                      
                    
                  </div>
                  <div class="col-sm-6">
                  	 <label>Description :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                    
                      <input type="text" class="form-control form-control-lg" name="city_description" value="{{$city->city_description}}" placeholder="Enter here">
                     
                    
                  </div>
                      <div class="col-sm-6">
                      	<button type="submit" class="btn btn-icon btn-sm color-bg">Send</button>
                      </div>
                      <div class="col-sm-6">
                        <button type="button" href="#" class="btn btn-default" style="background:red; color: black;">Cancel</button>
                    </div>
                </div>
            </div>
              </div>
            </form>
            </div>
          </div>	 <div class="card-header  border-0">
                       
                        
                            <!--<a class="btn btn-primary btn-icon" href="http://127.0.0.1:8000/product/pdf"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>-->
                       
                        
                    </div>
                    <div class="card-body">
                    
                      
                    </div>
                </div>
            </div>
        </div>
         <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                          
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end --> 
    </div>
      <script type="text/javascript">
                        function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search-item-table");
    filter = input.value.toUpperCase();
    table = document.getElementsByClassName("table")[0]; // Assuming there's only one table
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; // Change index to match the column you want to search (0-indexed)
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
                    </script>


@endsection