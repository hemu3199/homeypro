@extends("agent.bg-layouts.bgagenthomey")
@section  ("content") 
<style type="text/css">
    .td{
        margin: 10px;
    }
</style>      
          
                <div class="dashboard-content">
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
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Report List</span></div>
                            
                                                       <!--Tariff Plan menu-->
                          
                            <!--Tariff Plan menu end-->						
                        </div>
                        <!-- dashboard-title end -->		
                       <div class="dasboard-wrapper fl-wrap">
                        <div class="dashboard-search-listing">
                                        <input type="text" onkeyup="search()" id="search-item-table" placeholder="Search By Name" value="">

                                        <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                         <a href="{{route('agent.application-list-pdf-download')}}" class="gradient-bg dashboard-addnew_btn color-bg btn btn-primary btn-icon" >Export to Pdf</a>	
                            
                            <div class="dasboard-widget-box fl-wrap">
                                
                                <div class="row">
                                    <div class="table-responsive">
                                    <table class="table table-vcenter text-nowrap table-bordered border-bottom">
                                              <thead>
                                    <tr>
                                        <th class="border-bottom-0">S.NO</th>
                                        <th class="border-bottom-0">Property Id</th>
                                            <th class="border-bottom-0">Property Name</th>
                                                <th class="border-bottom-0">Property Status</th>
                                           <th class="border-bottom-0">User Name</th>
                                            <!-- <th class="border-bottom-0">Application Status</th> -->
                                            <th class="border-bottom-0">Application Received</th>
                                            <th class="border-bottom-0">View Applications</th>
                                             <th class="border-bottom-0">Actions</th>
                                             <th>Remakes</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($applications as $key => $row)
                                    <tr>
                                        <td>{{$loop->iteration}}
                                        </td>
                                        <td><span class="badge rounded-pill bg-success " style="padding:8px;font-size:12px;">{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('property_id')->first();}}</span>
                                        </td>
                                        <td>{{DB::table('homeyproperties')->where(['property_id' => $row->property_id])->pluck('name')->first();}}
                                        </td>
                                        @php
                                        $status=DB::table('homeyproperties')->where(['property_id' => $row->property_id])->first();
                                        @endphp
                                        @if($status->status == 0)
                                        
                                        <td><a class="tablebtn" style="background-color:green">Active</a></td>
                                        @else
                                        @if($status->status == 1 && $status->property_deleted == 0)
                                        
                                        <td><a class="tablebtn" style="background-color:orange">Inactive</a></td>
                                        @else
                                        
                                        <td><a class="tablebtn" style="background-color:red">Deleted</a></td>
                                        @endif
                                        @endif
                                        <td>{{DB::table('users')->where(['user_id' => $row->user_id])->pluck('name')->first();}}</td>
                                        <td>
                                        {{ date('Y-m-d', strtotime($row->updated_at)) }}
                                        </td>
                                        <td> <a href="{{ route('agent.bgviewapplication', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}"
                                          class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>
                                             </td>
                                             <td>
                                              @if($row->approval_status == 0)
                                            <a class="btn btn-primary btn-icon "  href="{{route('agent.bgapprove',['id' => $row->user_id, 'property_id' => $row->property_id])}}">Approve</a>
                                            <a class="btn btn-primary btn-icon"  href="{{ route('agent.bgreject', ['id' => $row->user_id, 'property_id' => $row->property_id]) }}" >Rejected</a>
                                            @elseif($row->approval_status == 1)
                                            <a class="btn btn-primay btn-icon color-bg">Approved</a>
                                            @elseif($row->approval_status == 2)
                                            <a class="btn btn-danger btn-icon">Rejected</a>

                                            @endif 
                                             </td>
                                             <td>
                                                 <form method="post" id="form" action="{{route('agent.remark', ['id'=>$row->user_id,'property_id' => $row->property_id ])}}">
                                                    @csrf
                                                    <div class="frmremark">
                                                    <textarea type="text" name="remarks">{{DB::table('application')->where(['property_id' => $row->property_id])->where(['user_id' => $row->user_id])->pluck('remarks')->first();}}</textarea>
                                                   <button type="submit" class="btn btn-primary" name="submit" style="float: left;">Submit</button>
                                                 </form>
                                             </td>
                                    </tr>
                                    @endforeach

                                </tbody> 
                            
                                </table>
                                {!! $applications !!}
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
                            <!--<span>Helpfull Links:</span>-->
                            <!--<ul>-->
                            <!--    <li><a href="about.html">About  </a></li>-->
                            <!--    <li><a href="blog.html">Blog</a></li>-->
                            <!--    <li><a href="pricing.html">Pricing Plans</a></li>-->
                            <!--    <li><a href="contacts.html">Contacts</a></li>-->
                            <!--    <li><a href="help.html">Help Center</a></li>-->
                            <!--</ul>-->
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end -->
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
 
@stop
              