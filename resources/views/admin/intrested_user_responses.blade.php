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
 <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div> <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                    @if(session('message'))   
                      <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                       @elseif(session('error'))
                       <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                    @endif
                    <div class="card-header  border-0">
                        <h4 class="card-title">Send Application For BackGround Check</h4>
                        
                            <!--<a class="btn btn-primary btn-icon" href="http://127.0.0.1:8000/product/pdf"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>-->
                        <!--<p>Total Intrested Applications: <b></b></p>-->
                        
                    </div>
                    <div class="card-body">
                        <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search Property Name" value="">

                                        <button type="submit"><i class="fa fa-search"></i></button>
                        </div>

                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-5">S.No</th>
                                        <th class="border-bottom-0 w-10">Property Name</th>
                                        <th class="border-bottom-0 w-10">User Name</th>
                                        <th class="border-bottom-0 w-10">Present Address</th>
                                        <th class="border-bottom-0">Email Id</th>
                                        <th class="border-bottom-0" >Select State To Transfer Application</th>
                                        <th class="border-bottom-0">Agent Name</th>
                                        <th>Transferd Bg Agent Name </th>
                                        <th>Actions </th>
                                        <th >Edit Agent To Transferd Application </th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($intresteduserresponse as $key => $row)
                                   <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td><a href="{{ route('admin.properties_details', $row->property_id) }}">{{ DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first() }}</a></td>
                                <td>{{ DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first() }}</td>
                                <td>
                                    <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4">{{ DB::table('application')->where(['user_id' => $row->user_id])->pluck('present_address')->first() }}</span>
                                </td>
                                <td>
                                  {{ DB::table('users')->where(['user_id' => $row->user_id])->pluck('email')->first() }}
                                    </td>
                                <td class="text-center">
                                    @php
                                    $applications=DB::table('application')->where(['user_id' => $row->user_id])->where(['property_id' => $row->property_id])->pluck('transfered_to')->first();
                                    @endphp
                                    @if($applications == 'Admin')
                                        <h4 class="tablebtn" style="background-color:#000; color: #fff;padding: 8px;"
                                         
                                        >Admin Has Approved These Application</h4>  
                                    @else
                                        <div class="custom-form">
                                            <form  method="post" action="{{ route('admin.transferto') }}" id="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-12">
                                                    <label>Enter State Name <span class="dec-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span></label>
                                                    <input type="text" name="location">
                                                    <input type="text" name="user_id" value="{{ $row->user_id }}" hidden>
                                                    <input type="text" name="property_id" value="{{ $row->property_id }}" hidden>
                                                    <button type="submit" class="tablebtn color-bg" name="submit" style="float: left;">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @php
                                    $agent = DB::table('agents')->where(['agent_id' => $row->agent_id])->pluck('name')->first();
                                    if(empty($agent)) {
                                        $user = DB::table('users')->where(['user_id' => $row->agent_id])->pluck('name')->first();
                                        $name = !empty($user) ? $user : 'Admin';
                                    } else {
                                        $name = $agent;
                                    }
                                    @endphp
                            
                                   <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4">  {{ $name }}</span> 
                                </td>
                                <td class="text-center">
                                    @php 
                                    $bgname=DB::table('agents')->where(['agent_id' => $row->transfered_to])->pluck('name')->first();
                                    @endphp
                                    @if(!empty($bgname))
                                        <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4"> {{ $bgname }}</span>
                                    @else
                                        <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4"> Admin
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.viewapplication', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}" class="tablebtn  color-bg" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                    @if($applications != 'Admin')
                                        <a href="{{ route('admin.editapplication', $row->ID) }}"  class="tablebtn color-bg"><i class="fa fa-pencil" aria-hidden="true"></i>
                                    @endif
                                    </a>
                                        <a href="{{ route('admin.delete-application-response', $row->ID) }}" class="tablebtn" style="background-color:red;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                                <td class="text-center">
                                    @if($applications != 'Admin')
                                        <div class="custom-form">
                                            <form  method="post" action="{{ route('admin.edit-transfer-bg-agent', $row->ID) }}" id="form" enctype="multipart/form-data"  >
                                                @csrf
                                                <div class="col-md-12">
                                                    <label>Enter Bg Agent ID<span class="dec-icon"><i class="fa fa-user" aria-hidden="true"></i></span></label>
                                                    <input type="text" name="agent_id" value="{{ $row->transfered_to }}">
                                                    <button type="submit" class="tablebtn color-bg" name="submit" style="float: left;">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                      <span Style="padding:8px;" class="badge rounded-pill bg-primary mt-2 ml-4">  Admin</span>
                                    @endif
                                </td>
                            </tr>

                                    @endforeach
                                
                                </tbody>
                                             </div>
                            
                            </table>
                                {!! $intresteduserresponse->links() !!}   
                            <nav aria-label="Page navigation"></nav>
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