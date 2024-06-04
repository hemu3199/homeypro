 //     }
    // }
    //   // if (!empty($data['wifi']))
    //                 //   {
    //                 //                     "wifi" => $data['wifi'],
    //                 //   }
    //                 // if (!empty($data['pool'])) 
    //                 //     {
    //                 //         "pool" => $data['pool'],
    //                 //     }
    //                 //                    if (!empty($data['security'])) {
    //                 //                     "security" => $data['security'],
    //                 //                 }
    //                 //                    if (!empty($data['laundry_room'])) {
    //                 //                     "laundry_room" => $data['laundry_room'],
    //                 //                 }
    //                 //                    if (!empty($data['equipped_kitchen'])) {
    //                 //                    "equipped_kitchen" => $data['equipped_kitchen'],
    //                 //                 }
    //                 //                    if (!empty($data['ac'])) {
    //                 //                     "ac" => $data['ac'],
    //                 //                 }
    //                 //                    if (!empty($data['parking'])) {
    //                 //                     "parking" => $data['parking'],
    //                 //                 }
                     
                       

    //               //   $property->r_image = $r_image;
    //               //  $property->p_image = $h_image;
    //               //    $property->properties_documents = $p_image;
    //               //  $property->approval_status = 0;
    //               //    $property->user_id = Auth::guard('web')->user()->user_id;
    //               //    $property->status =0;
    //               //    $property->featured = 0;
    //               // $result=   $property->updateMethod();
       
    //      // if($request->isMethod('post')){
    //      //    //dd($request->all());
    //      //    $response_code = 200;
    //      //    $message = array('error'=>array('something went wrong'));
    //      //    $success = false ;
    //      //    $data = $request->all();
    //      //    $rules=[
        
    //      //        'name'=>'required',
                
                
    //      //     ];
    //      //     $validator = Validator::make($data,$rules);
    //      //     if($validator->fails()){
    //      //         $success = false;
    //      //         $message = $validator->errors();
    //      //     }else{
           
    //      //        if($request->file('image') != ''){
    //      //            $image = $request->file('image')->getClientOriginalName();
    //      //            $request->file('image')->move('uploads/properties/', $image); 
    //      //            $property_details = DB::table('properties')->where('property_id','=',$id)->first();
    //      //            $path = public_path('uploads/properties/'.$property_details->file);
    //      //            @unlink($path);
    //      //        }else{
    //      //            $property_details = DB::table('properties')->where('property_id','=',$id)->first();    
    //      //                $image = $property_details->file;
    //      //            }   
                    
                   
    //      //        $update_array = array(
    //      //           "property_type" => $data['property_type'],
    //      //             "country_id"=>$data['country'],
    //      //             "name" => $data['name'],
    //      //             "location" => $data['location'],
    //      //             "description" => $data['description'],
    //      //             "price" => $data['price'],
    //      //             "bedsqft" => $data['bedsqft'],
    //      //             "sqft"=> $data['sqft'],
    //      //             "carparking" => $data['carparking'],
    //      //             "year" => $data['year'],
    //      //             "property_address"=> $data['propertyadd'],
    //      //             "payment_type" => "Rent", 
    //      //             "property_status" => $data['property_status'],
    //      //             "appartment_type" => $data['appartment_type'],
    //      //             "diningroom" => $data['diningroom'],
    //      //             "kitchen" => $data['kitchen'],
    //      //             "livingroom" => $data['livingroom'],
    //      //             "masterbedroom" => $data['masterbedroom'],
    //      //             "bedroom2" => $data['bedroom2'],
    //      //            "other_room" => $data['other'],
    //      //             "total_sqft" => $data['total_sqft'],
                     
    //      //             // "general" => json_encode($data['general']),
    //      //              "file" => $image,
                     
    //      //            "status" => 0,
    //      //              "featured" => 0,
    //      //         );

    //      //        $affectedRows =Property_rent::where("user_id",Auth::guard('web')->user()->user_id)->where('property_id','=',$id)->update($update_array);
              
    //      //        $success = true;
    //      //        $message = array('success'=>array('Property updated successfull'));
    //      //    }
            
    //     // return ResponseHelper::returnResponse(200,$success,$message);
    //     // }











     // dd($request->all());
      
     // if ($request->ajax()){
            $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
            $path = public_path('uploads/properties/'.$property_details->r_image);
            @unlink($path);
             $path1 = public_path('uploads/properties/'.$property_details->p_image);
            @unlink($path1);
            $mainimages= DB::table('property_images')->where('property_id','=',$id)->get();


            foreach($mainimages as $key => $row)
            {
                  $path = public_path('uploads/properties/'.$row->image_name);
            @unlink($path);
            }
            if ($property_details){
                $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->delete();
                $mainimages= DB::table('property_images')->where('property_id','=',$id)->get();
                   foreach($mainimages as $key => $row)
                   {
                     $mainimages= DB::table('property_images')->where('property_id','=',$id)->delete();

                   }

                return response()->json(array('success' => true));
            }
        // }






          if($request->isMethod('post')){
            // dd($request->all());
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
        
                'name'=>'required',
                
                
             ];
             $validator = Validator::make($data,$rules);
             if($validator->fails()){
                 $success = false;
                 $message = $validator->errors();
             }else{
           $update_array = array(
                   "name" => $data['name'],
                     "country"=>$data['country'],
                     "price" => $data['price'],
                     "categories" => $data['categories'],
                     "key_words" => $data['key_words'],
                     "address" => $data['address'],
                     "longitude" => $data['longitude'],
                     "latitude"=> $data['latitude'],
                     "city" => $data['city'],
                     "email_address" => $data['email_address'],
                     "phone_no"=> $data['phone_no'],
                     "website" => $data['website'], 
                     "area" => $data['area'],
                     "accomodation" => $data['accomodation'],
                     "yard_size" => $data['yard_size'],
                     "bedrooms" => $data['bedrooms'],
                     "bathrooms" => $data['bathrooms'],
                     "garage" => $data['garage'],
                     "room_title" => $data['room_title'],
                     "additional_room" => $data['additional_room'],
                     "room_details" => $data['room_details'],
                     "h_plan_title" => $data['h_plan_title'],
                     "h_plan_info" => $data['h_plan_info'],
                     "h_plan_details" => $data['h_plan_details'],
                     "approval_status" => 0,
                     "status" => 0,
                       "featured" => 0,
                   );
                $affectedRows =Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->update($update_array);
                 $success = true;
                $message = array('success'=>array('Property updated successfull'));
            }
        return ResponseHelper::returnResponse(200,$success,$message);
        }















        <div class="dasboard-wrapper fl-wrap no-pag">
                            <div class="dasboard-scrollnav-wrap scroll-to-fixed-fixed scroll-init2 fl-wrap">
                                <ul>
                                    <li><a href="#sec1" class="act-scrlink">Info</a></li>
                                    <li><a href="#sec2">Location</a></li>
                                    <li><a href="#sec3">Media</a></li>
                                    <li><a href="#sec4">Details</a></li>
                                    <li><a href="#sec5">Rooms</a></li>
                                    <li><a href="#sec6">Plans</a></li>
                                    <li><a href="#sec7">Widgets</a></li>
                                </ul>
                                <div class="progress-indicator">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="-1 -1 34 34">
                                        <circle cx="16" cy="16" r="15.9155"
                                            class="progress-bar__background" />
                                        <circle cx="16" cy="16" r="15.9155"
                                            class="progress-bar__progress 
                                            js-progress-bar" />
                                    </svg>
                                </div>
                            </div>
                            <!-- dasboard-widget-title -->
                            <div class="dasboard-widget-title fl-wrap" id="sec1">
                                <h5><i class="fas fa-info"></i>Basic Informations</h5>
                            </div>
                            <!-- dasboard-widget-title end -->
                            <!-- dasboard-widget-box  -->
                            <div class="dasboard-widget-box fl-wrap">
                                <div class="custom-form">
                                    <div class="row">
                                        <div class="col-sm-4">       
                                            <label>Listing Title  <span class="dec-icon"><i class="far fa-briefcase"></i></span></label>
                                            <input type="text" placeholder="Name of your business" name="name" value="{{$property_details->name}}"/>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Country</label>
                                            <div class="listsearch-input-item">
                                                <select data-placeholder="Country"  name="country" class="chosen-select no-search-select" >
                                                    <option label="Country">Country</option>
                                                    <option value="india" {{ $property_details->country == "india" ? 'selected' : '' }}>INDIA</option>
                                                    <option value="USA" {{ $property_details->country == "USA" ? 'selected' : '' }}>USA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">       
                                            <label>Listing Price  <span class="dec-icon"><i class="far fa-money-bill-wave"></i></span></label>
                                            <input type="text" placeholder="Listing Price" name="price" value="{{$property_details->price}}"/>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Category</label>
                                            <div class="listsearch-input-item">
                                                <select data-placeholder="Apartments" name="categories" class="chosen-select no-search-select" >
                                                    <option label="Categories">All Categories</option>
                                                    <option value="House" {{ $property_details->categories == "House" ? 'selected' : '' }}>House</option>
                                                    <option value="Apartment" {{ $property_details->categories == "Apartment" ? 'selected' : '' }}>Apartment</option>
                                                    <option value="Hotel" {{ $property_details->categories == "Hotel" ? 'selected' : '' }}>Hotel</option>
                                                    <option value="Villa" {{ $property_details->categories == "Villa" ? 'selected' : '' }}>Villa</option>
                                                    <option value="Office" {{ $property_details->categories == "Office" ? 'selected' : '' }}>Office</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>Keywords  <span class="dec-icon"><i class="far fa-key"></i></span></label>
                                            <input type="text" placeholder="Maximum 15 , should be separated by commas" name="key_words" value="{{$property_details->key_words}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- dasboard-widget-box  end-->
                            <!-- dasboard-widget-title -->
                            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec2">
                                <h5><i class="fas fa-street-view"></i>Location / Contacts</h5>
                            </div>
                            <!-- dasboard-widget-title end -->
                            <!-- dasboard-widget-box  -->
                            <div class="dasboard-widget-box   fl-wrap">
                                <div class="custom-form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Address <span class="dec-icon"><i class="far fa-map-marker"></i></span></label>
                                            <input type="text" name="address" placeholder="Address of your business" value="{{$property_details->address}}"/>
                                        </div>
                                        <div class="col-sm-4">       
                                            <label>Longitude (Drag marker on the map)  <span class="dec-icon"><i class="far fa-long-arrow-alt-right"></i></span></label>
                                            <input type="text" id="long" name="longitude" placeholder="Map Longitude" value="{{$property_details->longitude}}"/>
                                        </div>
                                        <div class="col-sm-4">       
                                            <label>Latitude (Drag marker on the map)<span class="dec-icon"><i class="far fa-long-arrow-alt-down"></i> </span></label>
                                            <input type="text" id="lat" name="latitude" placeholder="Map Latitude" value="{{$property_details->latitude}}"/>
                                        </div>                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="map-container">
                                        <div id="singleMap" class="drag-map" data-latitude="{{$property_details->latitude}}" data-longitude="{{$property_details->longitude}}"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>City<span class="dec-icon"><i class="far fa-map-marker"></i></span></label>
                                            <input type="text" placeholder="City Name" name="city" value="{{$property_details->city}}"/>
                                           <!--  <div class="listsearch-input-item">
                                                <select data-placeholder="Apartments" name="city" class="chosen-select no-search-select" >
                                                    <option label="All Cities">All Cities</option>
                                                    <option value="New York">New York</option>
                                                    <option value="London"> London</option>
                                                    <option value="Paris">Paris</option>
                                                    <option value="Kiev">Kiev</option>
                                                    <option value="Moscow">Moscow</option>
                                                    <option value="Dubai">Dubai</option>
                                                    <option value="Rome">Rome</option>
                                                    <option value="Beijing">Beijing</option>
                                                </select>
                                            </div> -->
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Email Address <span class="dec-icon"><i class="far fa-envelope"></i></span>  </label>
                                            <input type="text" placeholder="JessieManrty@domain.com" name="email_address" value="{{$property_details->email_address}}"/>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Phone <span class="dec-icon"><i class="far fa-phone"></i> </span> </label>
                                            <input type="text" placeholder="+7(123)987654" name="phone_no" value="{{$property_details->phone_no}}"/>
                                        </div>
                                        <div class="col-sm-6">
                                            <label> Website <span class="dec-icon"><i class="far fa-globe"></i> </span> </label>
                                            <input type="text" placeholder="themeforest.net" name="website" value="{{$property_details->website}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- dasboard-widget-box  end-->                            
                            <!-- dasboard-widget-title -->
                           <!-- <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec3">
                                <h5><i class="fas fa-image"></i>Header Media</h5>
                            </div>  -->
                            <!-- dasboard-widget-title end -->
                            <!-- dasboard-widget-box  -->
                        <!-- <div class="dasboard-widget-box   fl-wrap">
                                <div class="custom-form"> -->
                                  <!--  <div class="add-list-media-header"  >
                                        <label class="radio inline">
                                        <input type="radio" name="gender"   checked>
                                        <span>Carousel</span>
                                        </label>
                                    </div>
                                    <div class="add-list-media-header">
                                        <label class="radio inline">
                                        <input type="radio" name="gender">
                                        <span>Slider</span>
                                        </label>
                                    </div>
                                    <div class="add-list-media-header">
                                        <label class="radio inline">
                                        <input type="radio" name="gender"   >
                                        <span>  Background image</span>
                                        </label>
                                    </div> -->

                                <!--     <div class="clearfix"></div>
                                    <div class="listsearch-input-item fl-wrap">
                                        <form class="fuzone">
                                            <div class="fu-text">
                                                <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span>
                                                <div class="photoUpload-files fl-wrap"></div>
                                            </div>
                                            <input type="file" name="m_image[]"  class="upload" multiple>
                                        </form>
                                    </div>
                                    <div class="col-sm-12">
                                    <div class="row"> -->
                                       <!--  <div class="col-sm-3">
                                            <div style="height: 100px;padding: 20px;">
                                                <div style="width:30px;height: 30px;">
                                              <img src="{{asset('homey/images/bg/long/1.jpg')}}" >
                                          </div>

                                                
                                            </div>
                                            
                                        </div> -->
                                       <!--  <div  class="editcarousel">
                                             <div class="editcard" >
                                                  <div class="img1" style="height:50px">
                                                    <img src=" {{asset('homey/images/bg/long/1.jpg')}}" alt="img" draggable="false"></div>
                                                  
                                                  
                                                </div>
                                        </div>
                                          <div  class="col-sm-3">
                                             <div class="editcard" >
                                                  <div class="img1" style="height:50px">
                                                    <img src=" {{asset('homey/images/bg/long/1.jpg')}}" alt="img" draggable="false"></div>
                                                  
                                                  
                                                </div>
                                        </div>
                                      
                                    </div>
                                </div>
                                </div>
                            </div>  -->
                            <!-- dasboard-widget-box  end-->                        
                            <!-- dasboard-widget-title -->
                            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec4">
                                <h5><i class="fas fa-list"></i>Listing Details</h5>
                            </div>
                            <!-- dasboard-widget-title end -->
                            <!-- dasboard-widget-box  -->
                            <div class="dasboard-widget-box   fl-wrap">
                                <div class="custom-form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Area: <span class="dec-icon"><i class="far fa-sort-size-down-alt"></i></span></label>
                                                    <input type="text" placeholder="House Area" name="area" value="{{$property_details->area}}"/>                                          
                                                    <label>Accomodation: <span class="dec-icon"><i class="far fa-users"></i></span></label>
                                                    <input type="text" placeholder="Listing Accomodation" name="accomodation" value="{{$property_details->accomodation}}"/>                                                    
                                                    <label>Yard size: <span class="dec-icon"><i class="far fa-trees"></i></span></label>
                                                    <input type="text" placeholder="Yard size" name="yard_size" value="{{$property_details->yard_size}}"/>                                                  
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Bedrooms: <span class="dec-icon"><i class="far fa-bed"></i></span></label>
                                                    <input type="text" placeholder="House Bedrooms" name="bedrooms" value="{{$property_details->bedrooms}}"/>
                                                    <label>Bathrooms: <span class="dec-icon"><i class="far fa-bath"></i></span></label>
                                                    <input type="text" placeholder="House Bathrooms" name="bathrooms" value="{{$property_details->bathrooms}}"/>                                                
                                                    <label>Garage: <span class="dec-icon"><i class="far fa-warehouse"></i></span></label>
                                                    <input type="text" placeholder="Number of cars" name="garage" value="{{$property_details->garage}}"/>                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Details Text</label>
                                            <div class="listsearch-input-item">
                                                <textarea cols="40" rows="3" style="height: 235px" name="deatils_text" placeholder="Datails" spellcheck="false">{{$property_details->deatils_text}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <!-- <label>Amenities: </label> -->
                                   <!--  <div class=" add-list-tags fl-wrap">
                                        <!- Checkboxes ->
                                        <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                            <li>
                                                <input id="check-aaa5" type="checkbox" name="check" checked>
                                                <label for="check-aaa5"> Wi Fi</label>
                                            </li>
                                            <li>
                                                <input id="check-bb5" type="checkbox" name="check" checked>
                                                <label for="check-bb5">Pool</label>
                                            </li>
                                            <li>
                                                <input id="check-dd5" type="checkbox" name="check">
                                                <label for="check-dd5"> Security</label>
                                            </li>
                                            <li>
                                                <input id="check-cc5" type="checkbox" name="check">
                                                <label for="check-cc5"> Laundry Room</label>
                                            </li>
                                            <li>
                                                <input id="check-ff5" type="checkbox" name="check" checked>
                                                <label for="check-ff5"> Equipped Kitchen</label>
                                            </li>
                                            <li>
                                                <input id="check-c4" type="checkbox" name="check">
                                                <label for="check-c4">Air Conditioning</label>
                                            </li>
                                            <li>
                                                <input id="check-c18" type="checkbox" name="check">
                                                <label for="check-c18">Parking</label>
                                            </li>
                                        </ul>
                                        <!- Checkboxes end ->                                               
                                    </div> -->
                                </div>
                            </div>
                            <!-- dasboard-widget-box  end-->                        
                            <!-- dasboard-widget-title -->
                            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec5">
                                <h5><i class="fas fa-home-lg-alt"></i>Rooms</h5>
                                <!-- <div class="onoffswitch">
                                    <input type="checkbox" name="onoffswitch" name="room_title" class="onoffswitch-checkbox" id="myonoffswitch5" checked>
                                    <label class="onoffswitch-label" for="myonoffswitch5">
                                    <!- <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span> ->
                                    </label>
                                </div> -->
                            </div>
                            <!-- dasboard-widget-title end -->                                                  
                            <!-- dasboard-widget-box  -->
                            <div class="dasboard-widget-box   fl-wrap">
                                <div class="custom-form add_room-item-wrap">
                                    <div class="add_room-container fl-wrap">
                                        <!-- add_room-item   -->
                                        <div class="add_room-item fl-wrap" >
                                            <span class="remove-rp tolt" data-microtip-position="left"  data-tooltip="Remove Room"><i class="fal fa-times-circle"></i></span>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Room Title: <span class="dec-icon"><i class="fal fa-layer-group"></i></span></label>
                                                    <input type="text" name="room_title" placeholder="Standard Family Room" value="{{$property_details->room_title}}"/>              
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Additional Room: <span class="dec-icon"><i class="fal fa-layer-plus"></i></span></label>
                                                    <input type="text" name="additional_room" placeholder="Example: Sauna" value="{{$property_details->additional_room}}"/>               
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Room Details</label>
                                                    <div class="listsearch-input-item">
                                                        <textarea cols="40" rows="3" name="room_details" style="height: 175px;margin-bottom: 10px" placeholder="Datails" spellcheck="false">{{$property_details->room_details}}</textarea>
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
                                                    </div>  -->
                                                    <input type="file" name="r_image">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <!-- <label>Amenities: </label> -->
                                           <!--  <div class=" add-list-tags fl-wrap">
                                                <!- Checkboxes ->
                                                <ul class="fl-wrap filter-tags no-list-style ds-tg">
                                                    <li>
                                                        <input id="check-2aaa5" name="" type="checkbox" name="check" checked>
                                                        <label for="check-2aaa5">Air conditioner</label>
                                                    </li>
                                                    <li>
                                                        <input id="check-2bb5" name="" type="checkbox" name="check" checked>
                                                        <label for="check-2bb5">Tv Inside</label>
                                                    </li>
                                                    <li>
                                                        <input id="check-2dd5" name="" type="checkbox" name="check">
                                                        <label for="check-2dd5"> Ceramic bath</label>
                                                    </li>
                                                    <li>
                                                        <input id="check-2cc5" name="" type="checkbox" name="check" checked>
                                                        <label for="check-2cc5">Microwave</label>
                                                    </li>
                                                </ul>
                                                <!- Checkboxes end ->                                               
                                            </div> -->
                                        </div>
                                        <!--add_room-item end  -->
                                    </div>
                                    <!-- <a href="#" class="add-room-item">Add New <i class="fal fa-plus"></i> </a> -->
                                </div>
                            </div>
                            <!-- dasboard-widget-box  end-->
                            <!-- dasboard-widget-title -->
                            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec6">
                                <h5><i class="fas fa-ruler-combined"></i>House Plans </h5>
                                <!-- <div class="onoffswitch">
                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch22">
                                    <label class="onoffswitch-label" for="myonoffswitch22">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                    </label>
                                </div> -->
                            </div>
                            <!-- dasboard-widget-title end -->                                                  
                            <!-- dasboard-widget-box  -->
                            <div class="dasboard-widget-box   fl-wrap" >
                                <div class="custom-form add_room-item-wrap">
                                    <div class="add_room-container fl-wrap">
                                        <!-- add_room-item   -->
                                        <div class="add_room-item fl-wrap" >
                                            <span class="remove-rp tolt" data-microtip-position="left"  data-tooltip="Remove"><i class="fal fa-times-circle"></i></span>
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Plan Title: <span class="dec-icon"><i class="far fa-ruler-horizontal"></i></span></label>
                                                            <input type="text" name="h_plan_title" placeholder=" First Floor Plan " value="{{$property_details->h_plan_title}}"/>    
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Plan Optional info: <span class="dec-icon"><i class="far fa-ruler-horizontal"></i></span></label>
                                                            <input type="text" name="h_plan_info" placeholder="Example: 286 sq ft" value="{{$property_details->h_plan_info}}"/> 
                                                        </div>
                                                    </div>
                                                    <label>Plan Details</label>
                                                    <div class="listsearch-input-item">
                                                        <textarea cols="40" rows="3" name="h_plan_details" style="height: 85px;" placeholder="Datails" name="text1" spellcheck="false">{{$property_details->h_plan_details}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <label>Upload Images</label>
                                                    <!-- <input type="file"  name="h_image" class="upload"> -->
                                                   <!-- <div class="listsearch-input-item fl-wrap">
                                                        <form class="fuzone">
                                                            <div class="fu-text">
                                                                <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span>
                                                                <div class="photoUpload-files fl-wrap"></div>
                                                            </div>
                                                           
                                                        </form>

                                                    </div> 
 -->                                                     <input type="file"  name="h_image" class="upload" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <!--add_room-item end  -->
                                    </div>
                                    <!-- <a href="#" class="add-room-item">Add New <i class="fal fa-plus"></i> </a> -->
                                </div>
                            </div>
                            <!-- dasboard-widget-box  end-->
                            <!-- dasboard-widget-title -->
                            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec7">
                                <h5><i class="fas fa-sliders-h"></i>Content Widgets</h5>
                            </div>
                            <!-- dasboard-widget-title end -->                                                  
                            <!-- dasboard-widget-box  -->
                            <div class="dasboard-widget-box   fl-wrap">
                                <div class="custom-form">
                                    <div class="row">
                                        <!-- content-widget-switcher -->    
                                       <!--  <div class="col-md-4">
                                            <div class="content-widget-switcher fl-wrap">
                                                <span class="content-widget-switcher-title">Video Presentation</span>
                                                <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitchmc" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitchmc">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                                <div class="content-widget-switcher-item fl-wrap">                    
                                                    <label>Video Youtube: <span class="dec-icon"><i class="fab fa-youtube"></i></span></label>
                                                    <input type="text" placeholder="Youtube Or Vimeo" value=""/>
                                                    <label>Video VImeo: <span class="dec-icon"><i class="fab fa-vimeo-v"></i></span></label>
                                                    <input type="text" placeholder="Youtube Or Vimeo" value=""/>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- content-widget-switcher end-->                                   
                                        <!-- content-widget-switcher -->    
                                        <div class="col-md-4">
                                            <div class="content-widget-switcher fl-wrap">
                                                <span class="content-widget-switcher-title">Propertie Documents</span>
                                                <!-- <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitchmc523" name="p_image" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitchmc523">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div> -->
                                                <div class="content-widget-switcher-item fl-wrap">
                                                    <div class="fuzone">
                                                        <div class="fu-text">
                                                            <span><i class="far fa-cloud-upload-alt"></i> Click here or drop files to upload</span>
                                                            <div class="photoUpload-files fl-wrap"></div>
                                                        </div>
                                                        <input type="file"  name="p_image" class="upload" multiple>
                                                    </div>
                                                    <!-- </form>                                                   -->
                                                       <!-- <input type="file" name="p_image"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content-widget-switcher end-->                                       
                                        <!-- content-widget-switcher -->    
                                       <!--  <div class="col-md-4">
                                            <div class="content-widget-switcher fl-wrap">
                                                <span class="content-widget-switcher-title">Mortgage Calculator</span>
                                                <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitchmc423" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitchmc423">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="content-widget-switcher fl-wrap" style="margin-top: 20px">
                                                <span class="content-widget-switcher-title">Google Map</span>
                                                <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitchmc923">
                                                    <label class="onoffswitch-label" for="myonoffswitchmc923">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="content-widget-switcher fl-wrap" style="margin-top: 20px">
                                                <span class="content-widget-switcher-title">Contact Form</span>
                                                <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitchmc`23">
                                                    <label class="onoffswitch-label" for="myonoffswitchmc`23">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- content-widget-switcher end-->
                                    </div>
                                </div>
                            </div>
                            <!-- dasboard-widget-box  end-->
                            <button class="btn    color-bg  float-btn">Save Changes</button>
                        </div>