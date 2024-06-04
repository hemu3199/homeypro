@extends("user.layouts.homedashboard")

@section  ("content") 
<style type="text/css">
    .td{
        margin: 10px;
    }
</style>      
          
                <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                         @if(session('message'))   
                          <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
                           @elseif(session('error'))
                           <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
                        @endif
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Your Application Listings</span></div>
                              <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                      @php
                                $profilepic=DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->pluck('profile_pic')->first();
                                @endphp
                                @if(!empty(  $profilepic))
                                                           
                                    <img src="{{url('/uploads/user-profile/'.$profilepic)}}" alt="">
                                    @else
                                    <img src="{{asset('homey/images/dummy-profile-pic.png')}}" alt="">
                                    @endif
                                    <h4>Welcome, <span> {{ Auth::user()->name }}</span></h4>
                                </div>
                                <a href="{{('logout')}}" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
                            </div>
                            <!--Tariff Plan menu-->
                         <!--    <div class="tfp-det-container">
                                <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                                <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div>
                            </div> -->
                            <!--Tariff Plan menu end-->						
                        </div>
                        <!-- dashboard-title end -->


                
                       <div class="dasboard-wrapper fl-wrap">
                            
                            <div class="dasboard-widget-box fl-wrap">
                                <div class="dasboard-opt sl-opt fl-wrap">
                                    <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search" value="">

                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="table-responsive">
                                    <table class="table table-vcenter text-nowrap table-bordered border-bottom">
                                              <thead>
                                    <tr>
                                        <th class="border-bottom-0">S.NO</th>
                                            <th class="border-bottom-0">Property Name</th>
                                           <th class="border-bottom-0">User Name</th>
                                            <th class="border-bottom-0">Application </th>
                                            <th class="border-bottom-0">Application Received</th>
                                            <th class="border-bottom-0">Action</th>
                                             <th class="border-bottom-0">Application status</th>
                                            <th class="border-bottom-0">Property status</th>
                                       
                                    </tr>
                                </thead>
                               <tbody >
                                                        @forelse($application as $key => $row)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="#">{{DB::table('homeyproperties')->where('property_id','=', $row->property_id)->pluck('name')->first() }}</a></td>
                                                            <td>{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first() }}</td>
                                                             @php
                                                                    $applied=  DB::table('application')->where('user_id','=', Auth::guard('web')->user()->user_id)->where('property_id','=',$row->property_id)->pluck('application_status')->first();
                                                                    @endphp
                                                                    
                                                                                             @if ($applied == '1')
                                                            <td><a class="tablebtn color-bg">Application Submited</a></td>
                                                            @else
                                                            <td><a href="{{ route('users-edit-application',$row->property_id) }}" class="tablebtn" style="background-color:black; color:#fff;">
                                                            Submit Your Application
                                                            </a></td>
                                                            @endif
                                                            <td>{{DB::table   ('application')
                                            ->where('user_id', $row->user_id)
                                            ->where('property_id', $row->property_id)
                                            ->pluck(DB::raw('DATE(created_at)'))
                                            ->first()}}</td>
                                                            <td>
                                                                <a class="tablebtn color-bg" href="{{ route('users-view-application',$row->property_id) }}" aria-pressed="true"><i class='fa fa-eye'  ></i></a>
                                                                   @php
                                $details=DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->first();
                                @endphp
                                                    @if(!empty($details))
                                                       <a class="tablebtn color-bg" href="{{ route('users-edit-application',$row->property_id) }}" role="button" aria-pressed="true"><i class='fa fa-edit' ></i></a> 
                                                    @else
                                                       <a class="tablebtn color-bg" href="{{ route('users-profile-setting') }}" role="button" aria-pressed="true"><i class='fa fa-edit' ></i></a> 
                                                    @endif
                                                                
                                                                
                                                             
                                                                 <a class="tablebtn color-bg" style="background-color: red" href="{{ route('users-delete-application',$row->property_id) }}" role="button" aria-pressed="true"><i class='fas fa-trash-alt'></i></a>
                                                                 <!-- <a onclick="deletecareers('{{ optional($row)->property_id }}')" class="tablebtn color-bg" style="background-color: red"><i class="far fa-trash-alt" ></i> </a>  -->
                                                            </td>
                                                           
                                                                  @php
                                    $applied=  DB::table('application')->where('user_id','=', Auth::guard('web')->user()->user_id)->where('property_id','=',$row->property_id)->pluck('approval_status')->first();
                                    @endphp
                                    
                                                            <td> @if ($applied == 1)
                            <a class="tablebtn" style="background-color:green">Approved</a>
                            @elseif($applied == 2)
                            <a  class="tablebtn" style="background-color:red">
                            Rejected
                            </a>
                            @else
                            <a class="tablebtn" style="background-color:orange">Pending</a>
                            @endif
                            </td>
                            @php 
                            $active= DB::table('homeyproperties')->where('property_id','=',$row->property_id)->pluck('status')->first();

                            @endphp

                            @if($active == "0")
                            <td><a class="tablebtn" style="background-color:green">Active</a></td>
                            
                            @else
                            <td><a class="tablebtn" style="background-color:red">Inactive</a></td>
                            
                            @endif
                                                      

                                                              

                                                         
                                                        </tr>
                                                        @empty
                                                        <tr>

                                                            <td colspan="8" class="text-center">" No Data Found "</td>
                                                            <tr>

                                                        @endforelse

                                                    </tbody>
                                             
                                </table>
                            </div>
                                                                                    
                                </div>
                            </div>
                            <!-- pagination-->
                            
                            <!-- pagination end-->  
                        </div>
                    </div>
                    <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <span>Helpfull Links:</span>
                         <ul>
                                <li><a href="{{ route('users-about') }}">About </a></li>
                                <li><a href="{{ route('referal') }}">Pricing Plans</a></li>
                                <li><a href="{{ route('users-contact') }}">Contacts</a></li>
                                <li><a href="{{ route('helpfaq') }}">Help Center</a></li>
                            </ul>
                        </div>
                        <a href="#main" class="dashbord-totop custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end -->	

@endsection
@section('script')
<script type="text/javascript">
    function deletecareers(xxrpz) {
 axios.get("{{ route('users-delete-application') }}?xxrpz=" + xxrpz).then(response => {
 
 var data = response.data;
 if (data.success) notify(null, 'Application Deleted Successfully', 'top right', 'success', true, null,
 1000);
 else {
 for (var a in data['error']['message']) {
 notify(null, data['error']['message'][a][0], 'botton left');
 }
 }
 }).catch(error => {
 console.log(error);
 });
 }
</script>
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
@stop
              