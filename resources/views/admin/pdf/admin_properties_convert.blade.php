@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Properties List')
@section  ("content")
 <div class="dashboard-content">
     <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
 <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
            <!--         @if(session('message'))   
  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
   @elseif(session('error'))
   <div class="alert alert-success" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
@endif -->
                    <div class="card-header  border-0">
                        <h4 class="card-title">Properties List</h4>
                        
                     <!--        <a class="btn btn-primary btn-icon" href="{{route('admin.properties-pdf-download')}}"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>
                         -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-5">S.No</th>
                                        <th class="border-bottom-0 w-10">Property Name</th>
                                        <th class="border-bottom-0 w-10">Property Address</th>
                                        <th class="border-bottom-0">Property Status</th>
                                        <!-- <th class="border-bottom-0">Rent/Sale</th> -->
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date</th>
                                        <th class="border-bottom-0">Agent Id</th>
                                        <!-- <th class="border-bottom-0">Actions</th> -->
                                        <th class="border-bottom-0">View Details</th>
                                        <th>Featured</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($totalproperties as $key => $row)
                                    <tr>
                                     
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}">{{$row->name}}</a></td>
                                        <td>{{$row->address}}</td>
                                        <td>{{$row->property_status}}</td>
                                        <!-- <td>{{$row->property_type}}</td> -->
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>{{DB::table('agents')->where(['agent_id' => $row->agent_id])->pluck('agent_id')->first()}}</td>
                                        
                                        <!-- <td>edit</td> -->
                                        <td><a href="{{ route('admin.properties_details',$row->property_id)}}">View Details</a></td>
                                         @if($row->featured==0)
                                        <td>
                                        <a href="{{ route('admin.featured',$row->property_id)}}"  class="btn btn-icon btn-sm color-bg"><i class="fa fa-star" aria-hidden="true"></i></a></td>
                                        @else
                                         <td>
                                        <a href="{{ route('admin.removefeatured',$row->property_id)}}"  class="btn btn-icon btn-sm" style="background-color: #3CB371;"><i class="fa fa-star-o" style="color:white;" aria-hidden="true"></i></a></td>
                                        @endif

                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                           
                  
                 
         
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <span>Helpfull Links:</span>
                            <ul>
                                <li><a href="about.html">About  </a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="help.html">Help Center</a></li>
                            </ul>
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div>
                    <!-- dashboard-footer end --> 
    </div>
        @endsection