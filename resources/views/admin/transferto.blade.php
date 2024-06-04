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
 <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div> <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                <div class="col-lg-12col-md-6 col-sm-12">
           <!--  <div class="card">
              <form method="post" action="sendagreement" id="form" enctype="multipart/form-data">
                                                @csrf
              <div class="card-header">
                <h6 class="card-title mb-0"> Send Agreement</h6>
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
                      <input type="text" class="form-control form-control-lg" name="user" placeholder="Enter here" required>
                  </div>
                  <div class="col-sm-6">
                     <label>Property ID <span class="dec-icon"><i class="far fa-user"></i></span></label>
                      <input type="text" class="form-control form-control-lg" name="property" placeholder="Enter here">
                  </div>
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="submit" class="btn btn-default" style="border:1px solid black;color: black;">Cancel</button>
                  </div>
                </div>
            </div>
              </div>
            </form>
            </div> -->
          </div>
            <div class="card-header  border-0">
                        <h4 class="card-title">Background Agent List </h4>
                        <!--<a class="btn btn-primary btn-icon" href="http://127.0.0.1:8000/product/pdf"  style="margin-left: 10px; size: 40px;">
                                               <i class="feather feather-download" data-bs-toggle="tooltip"
                                                   data-original-title="#"> Export to PDF</i>
                                           </a>-->
            </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-5">S.No</th>
                                        <th class="border-bottom-0 w-10">Agent Id</th>
                                        <th class="border-bottom-0 w-10">Agent Name</th>
                                        <th class="border-bottom-0 w-10">Agent Location</th>
                                        <th class="border-bottom-0">Number of Applications</th>
                                        <th class="border-bottom-0">Actions</th>
                                        <!--<th class="border-bottom-0"></th>
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Date</th>
                                        <th class="border-bottom-0">Agent Id</th>
                                        <th class="border-bottom-0">Actions</th>
                                        <th class="border-bottom-0">View Details</th>-->
                                    </tr>
                                </thead>
                                 <tbody>
                                @forelse($agentlist as $key => $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$row->agent_id}}</td>
                                        <td>{{$row->fname}}</td>
                                        <td>{{$row->state}}</td>
                                        <td>0</td>
                                        <td><div class="custom-form">
                                            <form  method="post" action="{{route('admin.transfer')}}" id="form" enctype="multipart/form-data"  >
                                                @csrf
                                                <div class="col-md-12">
                                                    <input type="text" name="agent_id" value="{{$row->agent_id}}" hidden>
                                                      <input type="text" name="user_id" value="{{$user_id}}" hidden>
                                                        <input type="text" name="property_id" value="{{$property_id}}" hidden>
                                                    <button type="submit" class="btn btn-primary" name="submit" style="float: left;">Transfer</button>
                                                </div>
                                         </form>
                                     </div></td>
                                    </tr>
                                    @empty
                                    <tr>
                                                            <td colspan="6" class="text-center">" No Data Found "</td>
                                   </tr>
                                  @endforelse
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