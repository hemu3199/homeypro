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

              <form method="post" action="{{route('admin.edit-agent-agreement',$agreement->id)}}" id="form" enctype="multipart/form-data">
                                                @csrf
              <div class="card-header">
                <h6 class="card-title mb-0"> Update Agent Agreement</h6>
              </div>
              <div class="card-body">
                <div class="custom-form">
                <div class="row g-3">
                  <div class="col-sm-12">
                  	 <label>Update Aggrement:</label>
                      <input type="File" class="form-control form-control" name="file" placeholder="Enter here">
                      <div>
                        <label>Preview Old Document</label>
                       <a href="{{url('uploads/agreement/'.$agreement->file)}}" class="btn btn-icon btn-sm color-bg" target=”_blank”>View</a></div>
                  </div>
                  <div class="col-sm-6">
                    
                    	<label>Update Agent ID * <span class="dec-icon"><i class="far fa-user"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="user" value="{{$agreement->member_id}}" placeholder="Enter here" >
                      
                    
                  </div>
                  <div class="col-sm-6">
                  	 <label>Update Property ID <span class="dec-icon"><i class="far fa-user"></i></span></label>
                    
                      <input type="text" class="form-control form-control-lg" name="property" value="{{$agreement->property_id}}" placeholder="Enter here">
                     
                    
                  </div>
                  <div class="col-sm-6">
                  	<button type="submit" class="btn btn-icon btn-sm color-bg">Update</button>
                  </div>
                    <div class="col-sm-6">
                    <button type="button" class="btn btn-default" style="border:1px solid black;color: black;">Cancel</button>
                    
                  </div>
                  <!--<div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default">Cancel</button>
                  </div>-->
                </div>
            </div>
              </div>
            </form>
            </div>
          </div>	 
         
                  
                </div>
            </div>
        </div>
        <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                       <!--  <div class="dashboard-footer-links fl-wrap">
                            <span>Helpfull Links:</span>
                            <ul>
                                <li><a href="about.html">About  </a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="help.html">Help Center</a></li>
                            </ul>
                        </div> -->
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