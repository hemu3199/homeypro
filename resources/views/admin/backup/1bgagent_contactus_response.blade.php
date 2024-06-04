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
             @if(session('message'))   
  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
   @elseif(session('error'))
   <div class="alert alert-danger" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
@endif
             
 <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
  <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header  border-0">
                        <h4 class="card-title">Contact US response</h4>
                    </div>
                    <div class="card-body">
                        <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search" value="">

                                        <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th >S.No</th>
                                        <th >User Name</th>
                                        <th>Phone Number</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>created at</th>
                                        <th>Actions</th>
                                       
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($usercontacus as $key => $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->date}}</td>
                                        <td>{{$row->time}}</td>
                                        <td>{{$row->created_at}}</td>
                                         <td>
                                         <a href="{{route('admin.edit-Contactus-response',$row->contact_id)}}"  class="btn btn-icon btn-sm color-bg"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="{{route('admin.delete-Contactus-response',$row->contact_id)}}"  class="btn btn-icon btn-sm color-bg"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                     </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                            {!! $usercontacus->links() !!}
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
        td = tr[i].getElementsByTagName("td")[1]; // Change index to match the column you want to search (0-indexed)
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