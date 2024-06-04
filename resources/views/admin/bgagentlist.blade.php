@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Agent List')
@section  ("content")
<div class="dashboard-content">
      <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
 <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                    @if(session('message'))   
                          <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                           @elseif(session('error'))
                           <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
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
                    <div class="card-header  border-0">
                        <h4 class="card-title">Background Agent List</h4>
                        
                            <a class="btn btn-primary btn-icon" href="{{ route('admin.bgadd')}}"  style="margin-left: 10px; size: 40px; text-align: right;">
                                               Add BG Agent
                                           </a>
                        <!-- <p>Total Agents: <b>{{$agentcount}}</b></p> -->
                        
                    </div>
                    <div class="card-body">
                        <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search BG Agent Name" value="">

                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-5">S.No</th>
                                        <th class="border-bottom-0 w-10">Agent Id</th>
                                        <th class="border-bottom-0 w-10">Agent Name</th>
                                        <th class="border-bottom-0">Agent Email</th>
                                        <th class="border-bottom-0">Agent Phone No</th>
                                        <th> Active / Deactive </th>
                                        <th class="border-bottom-0">Actions</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($agentlist as $key => $row)
                                    <tr>
                                     
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4">{{$row->agent_id}}</span></td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{DB::table('agent_basic_information')->where(['agent_id' => $row->agent_id])->pluck('phoneno')->first() }}</td>
                                         <td>
                                            @if($row->status==0)
                                            <a href="{{ route('admin.deactive-agent',$row->agent_id)}}" style="background-color: green;" class="tablebtn"><i class="fa fa-toggle-on"></i></a>
                                            @else
                                            <a href="{{ route('admin.active-agent',$row->agent_id)}}" class="tablebtn" style="background-color:red;"><i class="fa fa-toggle-off"></i></a>
                                            @endif
                                                   
                                         </td>
                                        <td>
                                               <a href="{{route('admin.admineditview',$row->agent_id)}}"  class="tablebtn color-bg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                               <a href="{{route('admin.delete-agent',$row->agent_id)}}" class="tablebtn" style="background-color:red;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                            {!! $agentlist->links() !!}
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