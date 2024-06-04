<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Validator,Auth,DB;
use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;
use App\Models\User;
use App\Models\InterstedProperty;
use App\Models\Property_rent;
use App\Models\Projects;
use App\Models\Contactus;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\BookmarkProperty;
use App\Models\Homeyproperties;
use App\Models\Room;
use App\Models\Property_images;
use App\Models\Room_images;
use App\Models\House;

class OwnerController extends Controller
{
	public function ownerdashboard()
    {
        $propertys = Homeyproperties::where("user_id",Auth::guard('web')->user()->user_id)->where('approval_status','=', 1 )->where('property_deleted', 0)->count();
        if($propertys>= 1)
        { 
        $propertys =  Homeyproperties::where("user_id",Auth::guard('web')->user()->user_id)->where('approval_status','=', 1 )->where('status', 0)->where('property_deleted', 0)->count();
        $intersted = InterstedProperty::where('agent_id',auth()->user()->user_id)->count();
        $bookmark =   DB::table('bookmark_property')->where('agent_id',auth()->user()->user_id)->count();
        $application = DB::table('application')->where('agent_id',auth()->user()->user_id)->where('approval_status',1)->count();
        $latest_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('user_id',auth()->user()->user_id)->latest()->take(6)->get();
        
         return view('user.ownerdashboard',compact('propertys','intersted','bookmark','application','latest_properties'));
        }
        else
        {
         
       
         return redirect()->route('users-dashboard');

        }

    }
     function intrested_users_list()
     {
         $propertys =  Homeyproperties::where("user_id",Auth::guard('web')->user()->user_id)->where('approval_status','=', 1 )->count();
        if($propertys>= 1)
        { 
             $intersted = InterstedProperty::where('agent_id',auth()->user()->user_id)->latest()->get();
    return view('user.intrested_users_list',compact('intersted'));
        }
        else
        {
         return redirect()->route('users-dashboard');

        }
       
     }
       public function ownerproperties_list()
    {
         $propertys = Homeyproperties::where('user_id',auth()->user()->user_id)->where('approval_status','=', 1 )->count();
        if($propertys>= 1)
        { 
              $intersted = DB::table('homeyproperties')->where('user_id',auth()->user()->user_id)->where('property_deleted', 0)->latest()->get();
    return view('user.ownerproperties',compact('intersted'));
        }
        else
        {
       return redirect()->route('users-dashboard');

        }
      
    }
     
     public function ownersapplication()
    {
         $propertys = Homeyproperties::where("user_id",Auth::guard('web')->user()->user_id)->where('approval_status','=', 1 )->count();
        if($propertys>= 1)
        {  $application = DB::table('application')->where('agent_id',auth()->user()->user_id)->get();
    return view('user.ownersapplication',compact('application'));
        }
        else
        {
         return redirect()->route('users-dashboard');

        }
      
    }

    function usersagreement()
    {
         $propertys =  Homeyproperties::where("user_id",Auth::guard('web')->user()->user_id)->where('approval_status','=', 1 )->count();
        if($propertys>= 1)
        { 


             $agreement= Agreement::where('member_id',auth()->user()->user_id )->paginate(10);
        return view('user.usersagreement',compact('agreement'));
        }
        else
        {
         return redirect()->route('users-dashboard');

        }
       
    }

    public function add_property_view()
     {
        return view('user.ownersproperty_add');
     }
     public function add_propertyfun(Request $request)
    {
              //dd($request->all());
                $data = $request->all();
                $rules=[
                         'name'=>'required',
                        ];
                $validator = Validator::make($data,$rules);
               if ($validator->fails()) {
                    return redirect('properties_list')->with('error', 'Validation failed!');
                }
                else
                {
                    try{
                         $code = Homeyproperties::orderBy('id', 'desc')->first();
                            if($code == null)
                            {
                             $id = "PROP".+1;
                            }
                            else
                            {
                             $id = "PROP".$code->id+1;
                            }
                            if($request->file('p_image') != '')
                            {
                             $p_image = $id.time() .'_'.$request->file('p_image')->getClientOriginalName();
                             $request->file('p_image')->move('uploads/properties/', $p_image); 
                            }
                            else
                            {
                             $p_image = "-";
                            }
                         $property = new Homeyproperties();
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
                         $property->area=$data['area'];
                         $property->accomodation = $data['accomodation'];
                         $property->yard_size = $data['yard_size'];
                         $property->bedrooms = $data['bedrooms'];
                         $property->bathrooms = $data['bathrooms'];
                         $property->garage = $data['garage'];
                         $property->deatils_text = $data['deatils_text'];
                         $property->video_link =$data['video_link'];
                             if (!empty($data['wifi'])) 
                             {
                               $property->wifi = $data['wifi'];
                             }
                            if (!empty($data['pool'])) 
                            {
                             $property->pool = $data['pool'];
                            }
                            if (!empty($data['security'])) 
                            {
                             $property->security = $data['security'];
                            }
                            if (!empty($data['laundry_room'])) 
                            {
                              $property->laundry_room = $data['laundry_room'];
                            }
                            if (!empty($data['equipped_kitchen'])) 
                            {
                               $property->equipped_kitchen = $data['equipped_kitchen'];
                            }
                            if (!empty($data['ac'])) 
                            {
                             $property->ac = $data['ac'];
                            }
                            if (!empty($data['parking'])) 
                            {
                            $property->parking = $data['parking'];
                            }
                         $property->properties_documents = $p_image;
                         $property->approval_status = 0;
                         $property->user_id = Auth::guard('web')->user()->user_id;
                         $property->status =0;
                         $property->featured = 0;
                         $property->property_deleted=0;
                         $property->save();
                         if ($request->has('room')) 
                         {
                                foreach ($request->room as $key => $value) {
                                    if(!empty($value))



                                    {
                                        $code = Room::orderBy('id', 'desc')->first();
                                        if($code == null){
                                         $roomid = "room".+1;
                                        }else{
                                         $roomid = "room".$code->id+1;
                                        }
                                       
                                    $room = new Room();
                                    $room->property_id = $id;
                                    $room->room_id = $roomid;
                                    $room->room_title = $value['room_title'];
                                    $room->additional_room = $value['additional_room'];
                                    $room->room_details = $value['room_details'];
                                      if (!empty($value['ac'])) {
                                        $room->ac = $value['ac'];
                                    }
                                    if (!empty($value['tv'])) {
                                        $room->tv = $value['tv'];
                                    }
                                      if (!empty($value['cbath'])) {
                                        $room->cbath = $value['cbath'];
                                    }
                                      if (!empty($value['mic'])) {
                                        $room->mic = $value['mic'];
                                    }

                                    $room->save();
                                    // $success = true;
                                    // $message = array('success' => array('Added successfully'));
                                   

                                    if ($request->hasFile('room.' . $key)) {
                                        foreach ($request->file('room.' . $key) as $m_image) {
                                            $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                                            $room_images = new Room_images();
                                            $room_images->property_id = $id;
                                            $room_images->room_id = $roomid;
                                            $room_images->image_name = $m_imagename;
                                            $room_images->save();
                                        }
                                    } 
                                    }
                                     

                                }
                         }
                 
                         if ($request->has('house')) 
                         {
                            foreach ($request->input('house') as $key => $value) 
                            {
                                if ($request->hasFile('house.' . $key)) {
                                    $h_image =$id.'_'. time() . '_' . $request->file('house.' . $key)->getClientOriginalName();
                                    $request->file('house.' . $key)->move('uploads/properties/', $h_image);
                                } else {
                                    $h_image = "-";
                                }

                                $room = new House();
                                $room->property_id = $id;
                                $room->plan_title = $value['h_plan_title'];
                                $room->plan_optional_info = $value['h_plan_info'];
                                $room->plan_details = $value['h_plan_details'];
                                $room->plan_image = $h_image;
                                $room->save();
                            }

                            // $success = true;
                            // $message = ['success' => ['Added successfully']];
                         }
                         if($request->has('m_image'))
                         {
                            foreach ($request->file('m_image')as $m_image) 
                            {
                                   $m_imagename =$id.'m'.time() .'_'.$m_image->getClientOriginalName();
                              $m_image->move(public_path('uploads/properties'), $m_imagename); 
                               $property_images = new Property_images();
                               $property_images->property_id=$id;
                               $property_images->image_name=$m_imagename;
                                $property_images->added_by=Auth::guard('web')->user()->user_id;
                               $property_images->save();
                            }
                         }

                      return redirect('ownerproperties_list')->with('message', 'Property Added Successfully!!');

                     }
                   
                      catch (\Exception $e) {
            // Handle the exception and display the error message
                     return redirect('ownerproperties_list')->with('error', 'An error occurred: ' . $e->getMessage());
                        }
                         // $success=true;
                         // $message=array('success'=>array('Course successfully created.'));
                       
                         //return ResponseHelper::returnResponse($success,$message);
                         }
     
    }

     


      function edit_properties(Request $request,$id)
                {
                    $property_details= Homeyproperties::where('property_id','=',$id)->first();
                    $room=Room::where('property_id','=',$id)->get();
                    $roomcount = Room::where('property_id','=',$id)->count();
                    $houseplans=House::where('property_id','=',$id)->get();
                    $houseplanscount=House::where('property_id','=',$id)->count();
                   
                    return view('user.ownersproperties_edit',compact('property_details','room','roomcount','houseplanscount','houseplans'));

                }
    function editproperties(Request $request,$id )
    { 
    if($request->isMethod('post'))
    {
        //DD($request->all());
         $response_code=200;
            $message=array('error'=>array('something went wrong'));
            $success=false;
             $data=$request->all();
             $rules=[
                     'name'=>'required',
                    ];
            $validator = Validator::make($data,$rules);
               if ($validator->fails()) 
               {
                return redirect('properties_list')->with('error', 'Validation failed!');
                 }
                else
            {
                 try
             {



              if ($request->hasFile('p_image')) 
            {
                                    $p_image = $id.time() . '_' . $request->file('p_image')->getClientOriginalName();
                                    $request->file('p_image')->move('uploads/properties/', $p_image);
                                    $prop=DB::table('homeyproperties')->where('property_id',$id)->first();
                                      $path = public_path('uploads/properties/'.$prop->p_image);
                                            @unlink($path);
            } 
            else 
            {
                                    $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();    
                                      $p_image = $property_details->p_image;
             }
              if (!empty($data['wifi'])) 
            {
              $wifi = $data['wifi'];
            }
             else
            {
                $wifi="";
            }
            if (!empty($data['pool'])) 
            {
            $pool = $data['pool'];
            }
            else
            {
            $pool="";
            }
            if (!empty($data['security'])) 
            {
            $security = $data['security'];
            }
            else
            {
            $security="";
            }
            if (!empty($data['laundry_room'])) 
            {
             $laundry_room = $data['laundry_room'];
            }
            else
           {
            $laundry_room="";
            }
            if (!empty($data['equipped_kitchen'])) 
            {
            $equipped_kitchen = $data['equipped_kitchen'];
            }
            else 
            {
            $equipped_kitchen="";
            }
            if (!empty($data['ac'])) 
            {
            $ac = $data['ac'];
            }
            else
            {
            $ac="";
            }
            if (!empty($data['parking'])) 
            {
            $parking = $data['parking'];
            }
            else
            {
            $parking="";
            }
              $update_array = array
              (
                    "name" => $data['name'],
                    "country"=>$data['country'],
                    "price" => $data['price'],
                    "categories" => $data['categories'],
                    "key_words" => $data['key_words'],
                    "address" => $data['address'],
                    "longitude" => $data['longitude'],
                    "latitude" => $data['latitude'],
                    "city" => $data['city'],
                    "email_address" => $data['email_address'],
                    "phone_no" => $data['phone_no'],
                    "website" => $data['website'],
                    "area"=> $data['area'],
                    "accomodation" => $data['accomodation'],
                    "yard_size" => $data['yard_size'],
                    "bedrooms" => $data['bedrooms'],
                    "bathrooms" => $data['bathrooms'],
                    "garage" => $data['garage'],
                    "deatils_text" => $data['deatils_text'],
                    "video_link" => $data['video_link'],
                    "p_image"=>$p_image,
                    "wifi" => $wifi,
                    "pool"=>$pool,
                    "laundry_room"=>$laundry_room,
                    "security"=>$security,
                    "equipped_kitchen"=>$equipped_kitchen,
                    "parking"=>$parking,
                    "ac"=>$ac,
                     "status" =>1,
                     "approval_status"=>0,
                    
                );
              if($request->has('m_image'))
                     {
                        foreach ($request->file('m_image')as $m_image) {
                               $m_imagename = $id.'m'.time() .'_'.$m_image->getClientOriginalName();
                     $m_image->move(public_path('uploads/properties'), $m_imagename); 
                           $property_images = new Property_images();
                           $property_images->property_id=$id;
                           $property_images->image_name=$m_imagename;
                            $property_images->added_by=Auth::guard('web')->user()->user_id;
                           $property_images->save();
                       }
                     }
                       if ($request->has('house')) {
                            foreach ($request->input('house') as $key => $value) {
                                if ($request->hasFile('house.' . $key)) {
                                    $h_image = $id.'_'.time() . '_' . $request->file('house.' . $key)->getClientOriginalName();
                                    $request->file('house.' . $key)->move('uploads/properties/', $h_image);
                                } else {
                                    $h_image = "-";
                                }

                                $room = new House();
                                $room->property_id = $id;
                                $room->plan_title = $value['h_plan_title'];
                                $room->plan_optional_info = $value['h_plan_info'];
                                $room->plan_details = $value['h_plan_details'];
                                $room->plan_image = $h_image;
                                $room->save();
                            }
                        }
                          if ($request->has('house1')) {
                            foreach ($request->input('house1') as $key => $value) {
                                if ($request->hasFile('house1.' . $key)) {
                                    $h_image = $id.'_'.time() . '_' . $request->file('house1.' . $key)->getClientOriginalName();
                                    $request->file('house1.' . $key)->move('uploads/properties/', $h_image);
                                } else {
                                    $property_details = DB::table('houseplan')->where('property_id','=',$id)->where('id',$value['id'])->first();    
                                      $h_image = $property_details->plan_image;
                                }

                                $update_house=array(
                                    "plan_title" => $value['h_plan_title'],
                                    "plan_optional_info" => $value['h_plan_info'],
                                    "plan_details" => $value['h_plan_details'],
                                    "plan_image" => $h_image,
                                );
                                $affaect= House::where('property_id','=',$id)->where('id',$value['id'])->update($update_house);

                              }

                           
                        }
                         if ($request->has('room')) 
                    {
                                foreach ($request->room as $key => $value) {
                                      $code = Room::orderBy('id', 'desc')->first();
                                        if($code == null){
                                         $roomid = "room".+1;
                                        }else{
                                         $roomid = "room".$code->id+1;
                                        }
                                       
                                    $room = new Room();
                                    $room->property_id = $id;
                                    $room->room_id = $roomid;
                                    $room->room_title = $value['room_title'];
                                    $room->additional_room = $value['additional_room'];
                                    $room->room_details = $value['room_details'];
                                      if (!empty($value['ac'])) {
                                        $room->ac = $value['ac'];
                                    }
                                    if (!empty($value['tv'])) {
                                        $room->tv = $value['tv'];
                                    }
                                      if (!empty($value['cbath'])) {
                                        $room->cbath = $value['cbath'];
                                    }
                                      if (!empty($value['mic'])) {
                                        $room->mic = $value['mic'];
                                    }

                                    $room->save();
                   
                                   

                                    if ($request->hasFile('room.' . $key)) {
                                        foreach ($request->file('room.' . $key) as $m_image) {
                                            $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                                            $room_images = new Room_images();
                                            $room_images->property_id = $id;
                                            $room_images->room_id = $roomid;
                                            $room_images->image_name = $m_imagename;
                                            $room_images->save();
                                        }
                                    }

                                }
                    }
                       if ($request->has('room1')) 
                    {
                                foreach ($request->room1 as $key => $value) {
                                      if (!empty($value['ac'])) {
                                        $ac = $value['ac'];
                                    }
                                    else
                                    {
                                        $ac="";
                                    }
                                    if (!empty($value['tv'])) {
                                        $tv = $value['tv'];
                                    }
                                    else
                                    {
                                        $tv="";
                                    }
                                    if (!empty($value['cbath'])) {
                                        $cbath = $value['cbath'];
                                    }
                                    else
                                    {
                                        $cbath="";
                                    }
                                      if (!empty($value['mic'])) {
                                        $mic = $value['mic'];
                                    }
                                    else
                                    {
                                        $mic="";
                                    }
                                   $update_room=array(
                                    "room_title" => $value['room_title'],
                                    "additional_room" => $value['additional_room'],
                                    "room_details" => $value['room_details'],
                                    "ac"=>$ac,
                                    "tv"=>$ac,
                                    "cbath"=>$cbath,
                                    "mic"=>$mic,
                                );
                                    
                                     if ($request->hasFile('room1.' . $key)) {
                                        foreach ($request->file('room1.' . $key) as $m_image) {
                                            $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                                            $room_images = new Room_images();
                                            $room_images->property_id = $id;
                                            $room_images->room_id = $roomid;
                                            $room_images->image_name = $m_imagename;
                                            $room_images->save();
                                        }
                                    }
                                    $affected=DB::table('rooms_list')->where('room_id',$value['room_id'])->update($update_room);

                                }
                    }
                 
                 $affectedRows = Homeyproperties::where("user_id",Auth::guard('web')->user()->user_id)->where('property_id',$id)->update($update_array);

                    $success = true;
                $message = array('success'=>array('Property updated successfull'));
                   return back()->with('message', 'Property Updated Successfully!!');


                }
            
                
                catch (\Exception $e) {
                        // Handle the exception and display the error message
                        return back()->with('error', 'An error occurred: ' . $e->getMessage());
                 }
        }

    }
}
















}

