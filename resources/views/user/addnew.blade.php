@extends("user.layouts.homedashboard")

@section  ("content")       
 <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                    <form method="post" action="{{route('addnewpropertyfn')}}" id="form" enctype="multipart/form-data">	
                             @csrf
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Add Listing</span></div>
                       	</div>
                        <!-- dashboard-title end -->	
                     
                         <div class="dasboard-wrapper fl-wrap no-pag">
                            <!-- dasboard-widget-title -->
                            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec5">
                                <h5><i class="fas fa-home-lg-alt"></i>Rooms</h5>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch5" checked>
                                    <label class="onoffswitch-label" for="myonoffswitch5">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- dasboard-widget-title end -->													
                            <!-- dasboard-widget-box  -->
                            <div class="dasboard-widget-box   fl-wrap">
                                <div class="custom-form add_room-item-wrap">
                                    <div id="room-sections-container">
                                        <!-- add_room-item   -->
                                        <div class="add_room-item fl-wrap" >
                                            <span class="remove-rp tolt" data-microtip-position="left"  data-tooltip="Remove Room"><i class="fal fa-times-circle"></i></span>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Room Title: <span class="dec-icon"><i class="fal fa-layer-group"></i></span></label>
                                                    <input type="text" placeholder="Standard Family Room"name="rooms[][room_title]">				
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Additional Room: <span class="dec-icon"><i class="fal fa-layer-plus"></i></span></label>
                                                    <input type="text" placeholder="Example: Sauna"  name="rooms[][additional_room]" >				
                                                </div>
                                            </div>
                                           
                                            <div class="clearfix"></div>
                                          
                                        </div>
                                        <!--add_room-item end  -->
                                    </div>
                                      <button type="button" id="add-room-section">Add New <i class="fal fa-plus"></i></button>
                                </div>
                            </div>
                            <!-- dasboard-widget-box  end-->
                             <div class="dasboard-widget-box   fl-wrap">
                                <!-- <div class="custom-form add_room-item-wrap"> -->
                              <div id="dynamicAddRemove_Education">
                                <div class="custom-form add_room-item-wrap">
                                    <div class="add_room-container fl-wrap">
                                        <div class="add_room-item fl-wrap" >
                                            <span class="remove-rp tolt" data-microtip-position="left"  data-tooltip="Remove Room"><i class="fal fa-times-circle"></i></span>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Room Title: <span class="dec-icon"><i class="fal fa-layer-group"></i></span></label>
                                                    <input type="text" name="room[0][room_title]" placeholder="Standard Family Room" value=""/>				
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Additional Room: <span class="dec-icon"><i class="fal fa-layer-plus"></i></span></label>
                                                    <input type="text" name="room[0][additional_room]" placeholder="Example: Sauna" value=""/>				
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Room Details</label>
                                                    <div class="listsearch-input-item">
                                                        <textarea cols="40" rows="3" name="room[0][room_details]" style="height: 175px;margin-bottom: 10px" placeholder="Datails" spellcheck="false"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Room Images</label>
                                                    <!-- <div class="listsearch-input-item fl-wrap">
                                                        <form class="fuzone">
                                                            <div class="fu-text">
                                                                <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span>
                                                                <div class="photoUpload-files fl-wrap"></div>
                                                            </div>
                                                            <input type="file" name="r_image" class="upload" >
                                                        </form>
                                                    </div> -->
                                                    <input type="file" name="room[0][r_image]">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                   
                                        </div>
                                      
                                    </div>
                                    <button type="button"  name="add" id="add_btn_Education" class="add-room-item1">Add New <i class="fal fa-plus"></i> </button>
                                </div>
                            </div>
                            <button type="button" name="add" id="add_btn_Education" class="btn btn-primary">Add More</button>
                                <!-- </div> -->
                            </div>
                          
                        </div>
                            <a href="{{route('addnewpropertyfn')}}" type="submit" class="btn  color-bg float-btn">Save Changes </a>
  					  </form>
                    </div>
                    <div class="limit-box fl-wrap"></div>
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
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.getElementById("room-sections-container");
        const addButton = document.getElementById("add-room-section");

        let sectionIndex = 0;

        addButton.addEventListener("click", function() {
            const section = createRoomSection(sectionIndex);
            container.appendChild(section);
            sectionIndex++;
        });

        container.addEventListener("click", function(event) {
            if (event.target.classList.contains("remove-room-section")) {
                event.target.parentElement.remove();
            }
        });

        function createRoomSection(index) {
            const section = document.createElement("div");
            section.className = "add_room-item fl-wrap";

            section.innerHTML = `
              <span class="remove-rp tolt" data-microtip-position="left"  data-tooltip="Remove Room"><i class="fal fa-times-circle"></i></span>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Room Title: <span class="dec-icon"><i class="fal fa-layer-group"></i></span></label>
                                                    <input type="text" placeholder="Standard Family Room"name="rooms[${index}][room_title]">				
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Additional Room: <span class="dec-icon"><i class="fal fa-layer-plus"></i></span></label>
                                                    <input type="text" placeholder="Example: Sauna"  name="rooms[${index}][additional_room]" >				
                                                </div>
                                            </div>
                                           
                                            <div class="clearfix"></div>
                <input type="text" name="rooms[][room_title]" placeholder="Room Title" value=""/>
                <input type="text" name="rooms[${index}][additional_room]" placeholder="Additional Room" value=""/>
                <!-- Other fields for the room section -->
                <button class="remove-room-section">Remove</button>
            `;

            return section;
        }
    });
</script>


<script type="text/javascript">
var i = 0;
$("#add_btn_Education").click(function() {
    ++i;
    $("#dynamicAddRemove_Education").append('<div class="custom-form add_room-item-wrap"> <div class="add_room-container fl-wrap"> <div class="add_room-item fl-wrap" > <span class="remove-rp tolt" data-microtip-position="left"  data-tooltip="Remove Room"><i class="fal fa-times-circle"></i></span> <div class="row"> <div class="col-sm-6"> <label>Room Title: <span class="dec-icon"><i class="fal fa-layer-group"></i></span></label> <input type="text" name ="room['+i+'][room_title]" placeholder="Standard Family Room" value=""/> </div> <div class="col-sm-6"> <label>Additional Room: <span class="dec-icon"><i class="fal fa-layer-plus"></i></span></label> <input type="text" name="room['+i+'][additional_room]" placeholder="Example: Sauna" value=""/> </div> </div> <div class="row"> <div class="col-sm-6"> <label>Room Details</label> <div class="listsearch-input-item"> <textarea cols="40" rows="3" name="room['+i+'][room_details]" style="height: 175px;margin-bottom: 10px" placeholder="Datails" spellcheck="false"></textarea></div></div> <div class="col-sm-6"> <label>Room Images</label> <div class="listsearch-input-item fl-wrap"> <form class="fuzone"> <div class="fu-text"> <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span> <div class="photoUpload-files fl-wrap"></div>  </div> <input type="file" name="room['+i+'][r_image]" class="upload"> </form> </div> <input type="file" name="r_image"> </div>  </div> <div class="clearfix"></div> </div> </div> <button type="button"  name="add" id="add_btn_Education" class="add-room-item1">Add New <i class="fal fa-plus"></i> </button><button type="button" class="remove-tr">Remove</button> </div>');




       
});
$(document).on('click', 'remove-tr', function() {
    $(this).parents('.add_room-item-wrap').remove();
});
</script>
 <!-- <div class="form-group"><div class="form-group"> <div class="row"> <div class="col-md-3"> <label class="form-label mb-0 mt-2">{{ __('Degree') }}</label> </div> <div class="col-md-3"> <input type="text"  name="education['+i+'][degree]" class="form-control" placeholder="{{ __('Degree') }}"> </div> <div class="col-md-3"> <label class="form-label mb-0 mt-2">{{ __('Branch / Specialization') }}</label> </div> <div class="col-md-3"> <input type="text" name="education['+i+'][specialization]" class="form-control" placeholder="{{ __('Branch / Specialization') }}"> </div> </div> </div> <div class="form-group"> <div class="row"> <div class="col-md-3"> <label class="form-label mb-0 mt-2">{{ __('Year of Joining') }}</label> </div> <div class="col-md-3"> <input type="text" name="education['+i+'][year_of_joining]" class="form-control" placeholder="{{ __('Year of Joining') }}"> </div> <div class="col-md-3"> <label class="form-label mb-0 mt-2">{{ __('Year of Completion') }}</label> </div> <div class="col-md-3"> <input type="text" name="education['+i+'][year_of_completion]" class="form-control" placeholder="{{ __('Year of Completion') }}"> </div> </div> </div> <div class="form-group"> <div class="row"> <div class="col-md-3"> <label class="form-label mb-0 mt-2">{{ __('CGPA / Percentage') }}</label> </div> <div class="col-md-3"> <input type="text"  name="education['+i+'][cgpa]" class="form-control" placeholder="{{ __('CGPA / Percentage') }}"> </div> <div class="col-md-3"> <label class="form-label mb-0 mt-2">{{ __('University / College') }}</label> </div> <div class="col-md-3"> <input type="text" name="education['+i+'][college]" class="form-control" placeholder="{{ __('University / College') }}"> </div> </div> </div> <div class="form-group"> <div class="row"> <div class="col-md-3"> <div class="form-label mb-0 mt-2">{{ __('Attachments') }}</div> </div> <div class="col-md-3"> <div class="form-group"> <label class="form-label"></label> <input class="form-control" name="education['+i+'][attachment]" type="file"> </div> </div> </div> </div><button type="button" class="btn btn-danger remove-tr">Remove</button></div>'); -->


@endsection