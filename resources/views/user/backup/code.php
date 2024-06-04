   $property = new Homeyproperties();
                     $property->remember_token=$data["_token"];
                     $property->property_id = $id;
                     $property->name = $data['name'];
                     $property->country=$data['country'];
                    $property->type= 'Rent';
                     $property->price = $data['price'];
                     $property->categories = $data['categories'];
                     $property->key_words = $data['key_words'];
                     $property->address = $data['address'];
                     $property->longitude = $data['longitude'];
                     $property->latitude = $data['latitude'];
                     $property->city = $data['city'];
                     $property->email_address = $data['email_address'];
                     $property->phone_no = $data['phone_no'];
                     $property->website = $data['website'];
                     // $property->image = $m_image;
                     $property->area=$data['area'];
                     $property->accomodation = $data['accomodation'];
                    $property->yard_size = $data['yard_size'];
                   $property->bedrooms = $data['bedrooms'];
                   $property->bathrooms = $data['bathrooms'];
                   $property->garage = $data['garage'];
                    $property->deatils_text = $data['deatils_text'];
                     //$rent->general = $data['general'];
                     // $property->amenities = $data['amenities'];
                     $property->room_title = $data['room_title'];
                     $property->additional_room = $data['additional_room'];
                     $property->room_details = $data['room_details'];
                     $property->r_image = $r_image;
                     $property->h_plan_title = $data['h_plan_title'];
                     $property->h_plan_info = $data['h_plan_info'];
                     $property->h_plan_details = $data['h_plan_details'];
                     $property->p_image = $h_image;
                     $property->properties_documents = $p_image;
                     // $property->googlemap = $data['googlemap'];
                     // $property->mortgage_cal = $data['mortgage_cal'];
                     // $property->contact_form = $data['contact_form'];
                     $property->approval_status = 0;
                     $property->agent_id = Auth::guard('agent')->user()->agent_id;
                     $property->status =0;
                     $property->save();









                       // $amenities = Amenities::where('property_id','=',$property_details->property_id)->first();
       
        //  if($request->isMethod('post')){
        //     $response_code = 200;
        //     $message = array('error'=>array('something went wrong'));
        //     $success = false ;
        //     $data = $request->all();
        //     $rules=[
        
        //         'name'=>'required',
                
                
        //      ];
        //      $validator = Validator::make($data,$rules);
        //      if($validator->fails()){
        //          $success = false;
        //          $message = $validator->errors();
        //      }else{
           
        //         if($request->file('image') != ''){
        //             $image = $request->file('image')->getClientOriginalName();
        //             $request->file('image')->move('uploads/properties/', $image); 
        //             $property_details = DB::table('properties')->where('property_id','=',$id)->first();
        //             $path = public_path('uploads/properties/'.$property_details->file);
        //             @unlink($path);
        //         }else{
        //             $property_details = DB::table('properties')->where('property_id','=',$id)->first();    
        //                 $image = $property_details->file;
        //             }   
                    
                   
        //         $update_array = array(
        //            "property_type" => $data['property_type'],
        //              "country_id"=>$data['country'],
        //              "name" => $data['name'],
        //              "location" => $data['location'],
        //              "description" => $data['description'],
        //              "price" => $data['price'],
        //              "bedsqft" => $data['bedsqft'],
        //              "sqft"=> $data['sqft'],
        //              "carparking" => $data['carparking'],
        //              "year" => $data['year'],
        //              "property_address"=> $data['propertyadd'],
        //              "payment_type" => $data['payment_type'], 
        //              "property_status" => $data['property_status'],
        //              "appartment_type" => $data['appartment_type'],
        //              "diningroom" => $data['diningroom'],
        //              "kitchen" => $data['kitchen'],
        //              "livingroom" => $data['livingroom'],
        //              "masterbedroom" => $data['masterbedroom'],
        //              "bedroom2" => $data['bedroom2'],
        //             "other_room" => $data['other'],
        //              "total_sqft" => $data['total_sqft'],
                     
        //              // "general" => json_encode($data['general']),
        //               "file" => $image,
                     
        //             "status" => 0,
        //          );
        //         $update = array(
        //             "a1" => $data['a1'],
        //             "a2" => $data['a2'],
        //             "a3" => $data['a3'],
        //             "a4" => $data['a4'],
        //             "a5" => $data['a5'],
        //             "a6" => $data['a6'],
        //             "a7" => $data['a7'],
        //             "a8" => $data['a8'],
        //             "a9" => $data['a9'],
        //            "a10" => $data['a10'],
        //             "a11" => $data['a11'],
        //             "a12" => $data['a12'],
        //         );

        //         $affectedRows =Property_rent::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->update($update_array);
        //          $affected =Amenities::where('property_id','=',$id)->update($update);
              
        //         $success = true;
        //         $message = array('success'=>array('Property updated successfull'));
        //     }
            
        // return ResponseHelper::returnResponse(200,$success,$message);
        // }



        $property_details= Homeyproperties::where('property_id','=',$id)->first();
      

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

           // $update_array = array(
                $edit = Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->first();
                  $edit->name = $data['name'];
                   $edit->country=$data['country'],
                     $edit->price = $data['price'],
                     $edit->categories = $data['categories'],
                     $edit->key_words = $data['key_words'],
                     $edit->address = $data['address'],
                     $edit->longitude = $data['longitude'],
                     $edit->latitude"= $data['latitude'],
                     $edit->city = $data['city'],
                     $edit->email_address = $data['email_address'],
                     $edit->phone_no= $data['phone_no'],
                     $edit->website = $data['website'], 
                     $edit->area = $data['area'],
                     $edit->accomodation = $data['accomodation'],
                     $edit->yard_size = $data['yard_size'],
                     $edit->bedrooms = $data['bedrooms'],
                     $edit->bathrooms = $data['bathrooms'],
                     $edit->garage = $data['garage'],
                     $edit->room_title = $data['room_title'],
                     $edit->additional_room = $data['additional_room'],
                     $edit->room_details = $data['room_details'],
                     $edit->h_plan_title = $data['h_plan_title'],
                     $edit->h_plan_info = $data['h_plan_info'],
                     $edit->h_plan_details = $data['h_plan_details'],
                     $edit->approval_status = 0,
                     $edit->status => 0,
                   // );
                $affectedRows =Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->update($update_array);
                 $success = true;
                $message = array('success'=>array('Property11 updated successfull'));
            }
        return ResponseHelper::returnResponse(200,$success,$message);
        }
        return view('agent.property-edit-rent',compact('property_details')); 
    }





 //    function edit(Request $request,$id){
 //                     if($request->isMethod('post')){
                     
 //                     $response_code = 200;
 //                     $message = array('error'=>array('something went wrong'));
 //                     $success = false ;
 //                     $data = $request->all();
 //                     $rules=[
 //                     'name'=>'required',
 //                     'position'=>'required',
 //                     'price'=>'required',
 //                     'categories'=>'required',
 //                     'key_words'=>'required',
 //                     'address'=>'required',
 //                     'longitude'=>'required',
 //                     'latitude'=>'required',
 //                     'city'=>'required',
 //                      'email_address'=>'required',
 //                       'phone_no'=>'required',
 //                       'website'=>'required',
 //                       'area'=>'required',
 //                       'accomodation'=>'required',
 //                       'bedrooms'=>'required',
 //                       'bathrooms'=>'required',
 //                       'garage'=>'required',
 //                       'deatils_text'=>'required',
 //                       'room_title'=>'required',
 //                       'additional_room'=>'required',
 //                       'room_details'=>'required',
 //                       'h_plan_title'=>'required',
 //                       'h_plan_info'=>'required',
 //                       'h_plan_details'=>'required',
 //                       'h_plan_info'=>'required',
 //                       'h_plan_info'=>'required',
 //                       'h_plan_info'=>'required',
 //                     // 'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
                     
                     
 //                     ];
 //                     $validator = Validator::make($data,$rules);
 //                     if($validator->fails()){
 //                     $success = false;
 //                     $message = $validator->errors();
 //                     }else{
 //                     // $user = Auth::guard('user')->user();
                     
 //                     $bus = Careers::where('id',$id)->first();
 //                     $bus->job_title = $request->job_title;
 //                     $bus->position = $request->position;
 //                     $bus->experience = $request->experience;
 //                     $bus->location = $request->location;
 //                     $bus->role = $request->role;
 //                     $bus->skills = $request->skills;
 //                     $bus->job_description = $request->job_description;
 //                     $bus->requirements = $request->requirements;
 //                     $bus->image = $request->image;
                     
 //                     if(isset($data['image']) && $data['image'] != ''){
 //                     $imageName = time() .'_'.$request->file('image')->getClientOriginalName(); 
 //                     $path = $request->file('image')->move('storage/uploads/careers/' ,$imageName);
 //                     $bus->image = 'uploads/careers/'.$imageName;
 //                     }

 //                     $bus->save();
                     
                     
 //                     $success=true;
 //                     $message=array('success'=>array('Slider successfully updated.'));
 //                     }
                     
 //                     return ResponseHelper::returnResponse($response_code,$success,$message,$cat ?? []);
 //                     }else {
 //                     $careers = Careers::where('id','=',$id)->first();
                     
 //                     return view('admin.careers.edit',compact('careers'));
                     
 //                     }
 // }






     function property_hide(Request $request,$id)
     {
        $totalproperties= Homeyproperties::where('agent_id','=',Auth::guard('agent')->user()->agent_id)->paginate(10);
 
       $update_array = array(
                   
                    "status" => 1,
                 );

                $affectedRows =Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->update($update_array);
              
                // $success = true;
                // $message = array('success'=>array('Property Hided successfull'));
             return view('agent.agent_properties',compact('totalproperties'));

     }



      function property_show(Request $request,$id)
     {
        $totalproperties= Homeyproperties::where('agent_id','=',Auth::guard('agent')->user()->agent_id)->paginate(10);
 
       $update_array = array(
                   
                    "status" => 0,
                 );

                $affectedRows =Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->update($update_array);
              
                // $success = true;
                // $message = array('success'=>array('Property Hided successfull'));
             return view('agent.agent_properties',compact('totalproperties'));

     }

// public function property_rent_edit(Request $request,$id)
// {
//     $property_details=  Property_rent::where('agent_id','=',Auth::guard('agent')->user()->agent_id)->where('id','=',$id)->first();

//  // if($request->isMethod('post')){
//  //                     $response_code = 200;
//  //                    $message = array('error'=>array('something went wrong'));
//  //                    $success = false ;
//  //                    $data = $request->all();
                    
//  //                    $update_arr = array(
//  //                    "name" => $data['name'],
//  //                     "location" => $data['location'],
//  //                     "description" => $data['description'],
//  //                     "price" => $data['price'],
//  //                     "bedsqft" => $data['bedsqft'],
//  //                     "sqft"=> $data['sqft'],
//  //                     "carparking" => $data['carparking'],
//  //                     "year" => $data['year'],
//  //                     "property_address"=> $data['propertyadd'],
                  
//  //                     "property_type" => 'Rent',
//  //                     "property_status" => $data['property_status'],
//  //                     "appartment_type" => $data['appartment_type'],
//  //                     "total_sqft" => $data['total_sqft'],
                     
//  //                     "general" => json_encode($data['general']),
//  //                     "file" => $imageName,
                     
//  //                    "status" => 0,
//  //                 );
//  //                     $affectedRows = AddAgent::where("agent_id",Auth::guard('agent')->user()->agent_id )->update($update_arr);
//  //                $success = true;
//  //                $message = array('success'=>array('profile updated successfully'));
            
//  //            return ResponseHelper::returnResponse(200,$success,$message);
//  //            }
            
//  //            $profile_details = AddAgent::where('agent_id','=', Auth::guard('agent')->user()->agent_id)->first();
            
        
//         return view('agent.property-edit-rent',compact('property_details'));
    
                    
 
// }
