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

              <form method="post" action="sendagentagreement" id="form" enctype="multipart/form-data">
                                                @csrf
              <div class="card-header">
                <h6 class="card-title mb-0"> Send Agent Agreement</h6>
              </div>
              <div class="card-body">
                <div class="custom-form">
                <div class="row g-3">
                  <div class="col-sm-12">
                  	 <label>Aggrement:</label>
                      <input type="File" class="form-control form-control" name="file" placeholder="Enter here">
                  </div>
                  <div class="col-sm-6">
                    
                    	<label>Agent ID * <span class="dec-icon"><i class="far fa-user"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="user" placeholder="Enter here" >
                      
                    
                  </div>
                  <div class="col-sm-6">
                  	 <label>Property ID <span class="dec-icon"><i class="far fa-user"></i></span></label>
                    
                      <input type="text" class="form-control form-control-lg" name="property" placeholder="Enter here">
                     
                    
                  </div>
                  <div class="col-sm-6">
                  	<button type="submit" class="btn btn-icon btn-sm color-bg ">Send</button>
                  </div>
                  <div class="col-sm-6">
                    <button type="button" class="btn btn-default" style="border:1px solid black;color: black;">Cancel</button>
                    
                  </div>
                </div>
            </div>
              </div>
            </form>
            </div>
          </div>	 <div class="card-header  border-0">
                        <h4 class="card-title">Agreement List</h4>
                        
                            <!--<a class="btn btn-primary btn-icon" href="http://127.0.0.1:8000/product/pdf"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>-->
                       
                        
                    </div>
                    <div class="card-body">
                          <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search Agent Name" value="">

                                        <button type="submit"><i class="fa fa-search"></i></button>
                         </div>
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-5">S.No</th>
                                        <th class="border-bottom-0 w-10">Agent Id</th>
                                        <th class="border-bottom-0 w-10">Agent Name</th>
                                        <th class="border-bottom-0 w-10">Property ID</th>
                                        <th class="border-bottom-0">File</th>
                                        <th class="border-bottom-0">Actions</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                
                                @foreach($agreement as $key => $row)
                                    <tr>
                                     
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4">{{$row->member_id}}
                                            </span></td>
                                        <td>{{DB::table('agents')->where(['agent_id' => $row->member_id])->pluck('name')->first()}}</td>
                                        <td>  @if(!empty($row->property_id))
                                            <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4">{{$row->property_id}}
                                            </span>
                                            @else
                                           <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4"> General Document </span>
                                            @endif</td>
                                        <td> {{$row->file}}</td>
                                        <td><a href="{{url('uploads/agreement/'.$row->file)}}"  class="tablebtn color-bg" target=”_blank”><i class="fa fa-eye" aria-hidden="true"></i></a>
                                         <a href="{{route('admin.edit-agent-agreement',$row->id)}}"   class="tablebtn color-bg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('admin.delete-user-agreement',$row->id)}}"  class="tablebtn" style="background-color:red;"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                     
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            
                               
                            
                            </table>
                            {!! $agreement->links() !!}
                            <nav aria-label="Page navigation"></nav>
                        </div>
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