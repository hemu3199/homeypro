@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Employee List')
@section  ("content")
<div class="dashboard-content">
      <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
 <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header  border-0">
                        <h4 class="card-title">Become Agent List</h4>
                        
                          
                        
                    </div>
                    <div class="card-body">
                         <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search Application ID" value="">

                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th >S.No</th>
                                        <th>Application Id</th>
                                        <th >Name</th>
                                        <th >email</th>
                                        <th>Mobile No</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($agent as $key => $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4">{{$row->application_id}}
                                        </span></td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->mobile_no}}</td>
                                        <td>{{$row->city}}</td>
                                     </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                            <nav aria-label="Page navigation"> 
                  
                    {!! $agent->links('pagination::bootstrap-4') !!}
                </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                           <!--  -->
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