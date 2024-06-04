@extends("admin.layouts.app")
@php 
use Carbon\Carbon;
@endphp
@php
use Illuminate\Support\Facades\DB;
@endphp
@section('title', 'Employee List')
@section  ("content")
<style type="text/css">
    .faqclose {
    position: absolute;
    top: 20px;
    right: 30px;
    cursor: pointer;
    z-index: 3;
    color: #3270fc;
    border-left: 1px solid rgba(255,255,255,0.11);
    font-size: 18px;
}
</style>
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

              <form method="post" action="{{route('admin.edit-agent-Contactus-response',$contact_edit_details->id)}}" id="form" enctype="multipart/form-data">
                                                @csrf
              <div class="card-header">
                <h6 class="card-title mb-0">Edit Agent Contact Us Response </h6>
              </div>
              <div class="card-body">
                <div class="custom-form">
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label>Name :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                    <input type="text" class="form-control form-control-lg" name="name"placeholder="Enter here"  value="{{$contact_edit_details->agent_name}}" disabled>
                  </div>
                  <div class="col-sm-6">
                     <label>Phone :<span class="dec-icon"><i class="far fa-user"></i></span></label>
                     <input type="text" class="form-control form-control-lg" name="phone" placeholder="Enter here"  value="{{$contact_edit_details->agent_phone}}">
                  </div>
                   <div class="col-sm-6">
                     <label>Date <span class="dec-icon"><i class="far fa-user"></i></span></label>
                     <!-- <input type="text" class="form-control form-control-lg" name="property" placeholder="Enter here"  > -->
                     <?php
                    $date = $contact_edit_details->date; // Your original date in 'Y-m-d' format

                    $new_date_format = date('m/d/Y', strtotime($date));
                    ?>  
                       <div class="date-container fl-wrap">
                            <input type="text" placeholder="" style="padding: 16px 5px 16px 60px;"     name="datepicker-here"   value="{{$new_date_format}}"/>
                        </div>
                  </div>
                  <div class="col-sm-6">
                     <label>Time</label>
                     <select data-placeholder="9 AM" name="time" class="chosen-select on-radius no-search-select">
                        <option value="09:00" {{$contact_edit_details->time == '09:00:00' ? 'selected' : ''}}>9 AM</option>
                        <option value="10:00" {{$contact_edit_details->time == '10:00:00' ? 'selected' : ''}}>10 AM</option>
                        <option value="11:00" {{$contact_edit_details->time == '11:00:00' ? 'selected' : ''}}>11 AM</option>
                        <option value="12:00" {{$contact_edit_details->time == '12:00:00' ? 'selected' : ''}}>12 AM</option>
                        <option value="13:00" {{$contact_edit_details->time == '13:00:00' ? 'selected' : ''}}>1 PM</option>
                        <option value="14:00" {{$contact_edit_details->time == '14:00:00' ? 'selected' : ''}}>2 PM</option>
                        <option value="15:00" {{$contact_edit_details->time == '15:00:00' ? 'selected' : ''}}>3 PM</option>
                        <option value="16:00" {{$contact_edit_details->time == '16:00:00' ? 'selected' : ''}}>4 PM</option>
                    </select>

                    
                  </div>
                  <div class="col-sm-12">
                      <label>Message</label>
                      <textarea name="message">{{$contact_edit_details->message}}</textarea>
                  </div>
                  <div class="col-sm-6">
                    <button type="submit" class="btn btn-icon btn-sm color-bg">Update</button>
                </div>
                <div class="col-sm-6">

                    <button type="button" class="btn btn-default" style="border:1px solid black;color: black;">Cancel</button>
                    
                  </div>
                  <!--<div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default">Cancel</button>
                  </div>-->
                </div>
            </div>
              </div>
            </form>
                    <div class="card-header  border-0">
                        <h4 class="card-title">Contact Us Agent's Response</h4>
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
                                        <th >S.No</th>
                                        <th>Agent ID</th>
                                        <th >Agent Name</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Response Recived At</th>
                                        <th>Actions</th>
                                       </tr>
                                </thead>
                                <tbody>
                                
                                <tbody>
                                
                                @foreach($agentcontacus as $key => $row)
                                     <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4">{{ $row->agent_id}}</span>
                                        </td>
                                        <td>{{$row->agent_name}}</td>
                                        <td>{{$row->agent_phone}}</td>
                                        <td>{{$row->message}}</td>
                                        <td>{{$row->date}}</td>
                                        <td>{{$row->time}}</td>
                                        <td>
                                            <span Style="padding:8px;" class="badge rounded-pill bg-success mt-2 ml-4"> {{ $row->created_at->format('Y-m-d') }}
                                            </span></td>

                                         <td>
                                         <a href="{{route('admin.edit-agent-Contactus-response',$row->id)}}" class="tablebtn color-bg"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                          <a href="{{route('admin.delete-agent-Contactus-response',$row->id)}}" class="tablebtn"  style="background-color:red"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
        <div class="main-register-wrap faq">
                <div class="reg-overlay"></div>
                <div class="main-register-holder ">
                    <div class="main-register-wrapper modal_main fl-wrap">
                        <div class="main-register"  style="width:100%;border-radius:10px ;">
                            <div class="faqclose"><i class="fal fa-times"></i></div>
                           
                             <div class="list-single-main-item fl-wrap" id="faq3">
                                            <div class="list-single-main-item-title big-lsmt fl-wrap">
                                                <h3>Reccomendations</h3>
                                            </div>
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How long does the sending process take? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat .</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">Can I use more than one payment method to pay for a reservation? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p> Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat .</p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->                                       
                                            <!--   accordion-lite -->
                                            <div class="accordion-lite-container fl-wrap">
                                                <div class="accordion-lite-header fl-wrap">How do I edit or remove a payment method? <i class="fas fa-plus"></i></div>
                                                <div class="accordion-lite_content fl-wrap">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt.  </p>
                                                </div>
                                            </div>
                                            <!--   accordion-lite end -->
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
                    <script type="text/javascript">
                          var faq = {};
    faq.hide = function () {
        $('.faq , .reg-overlay').fadeOut(200);
        $("html, body").removeClass("hid-body");
        $(".modal_main").removeClass("vis_mr");
    };
    $('.faq-open').on("click", function (e) {
        e.preventDefault();
        $('.faq , .reg-overlay').fadeIn(200);
        $(".modal_main").addClass("vis_mr");
        $("html, body").addClass("hid-body");
    });
    $('.faqclose , .reg-overlay').on("click", function () {
        faq.hide();
    });

                    </script>

        @endsection