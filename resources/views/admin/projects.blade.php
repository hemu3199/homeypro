@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Employee List')
@section  ("content")
 <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header  border-0">
                        <h4 class="card-title">Projects List</h4>
                        
                       <!--      <a class="btn btn-primary btn-icon" href="http://127.0.0.1:8000/product/pdf"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a> -->
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-5">S.No</th>
                                        <th class="border-bottom-0 w-5">Project Id</th>
                                        <th class="border-bottom-0 w-10">Project Name</th>
                                        <th class="border-bottom-0 w-10">Project Address</th>
                                        <th class="border-bottom-0">Project Status</th>
                                        <th class="border-bottom-0">Project Type</th>
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date</th>
                                        <th class="border-bottom-0">Agent Name</th>
                                        <!-- <th class="border-bottom-0">Actions</th>
                                        <th class="border-bottom-0">View Details</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($projects as $key => $row)
                                    <tr>
                                     
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->project_id }}</td>
                                        <td><a href="{{ route('admin.project_details',$row->project_id)}}">{{$row->project_name}}</a></td>
                                        <td>{{$row->project_location}}</td>
                                        <td>{{$row->project_status}}</td>
                                        <td>{{$row->project_type}}</td>
                                        <td>{{$row->avg_price}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>{{DB::table('agents')->where(['agent_id' => $row->agent_id])->pluck('name')->first();}}</td>
                                        
                                        <!-- <td><a href="#">Edit Details</a></td>
                                        <td><a href="#">View Details</a></td> -->
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            
                            </table>
                            <nav aria-label="Page navigation"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection