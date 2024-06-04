<?php

namespace App\Http\Controllers;
use Validator,Auth,DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;
use App\Models\User;
use App\Models\InterstedProperty;
use App\Models\Projects;
use App\Models\Contactus;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\BookmarkProperty;
use App\Models\AddAgent;
use App\Models\Homeyproperties;
use App\Models\Property_images;
use App\Models\BecomeAMember;
use App\Models\Room_images;
use App\Models\House;
use App\Models\Room;
use App\Models\Compare;

class UserApi extends Controller
{
    
    public function dashboard()
    {
        try
        {
            $latest_properties = DB::table('homeyproperties')->where('approval_status','=', 1)->latest()->take(6)->get();
            $featured_properties = DB::table('homeyproperties')->where('approval_status','=', 1)->where('featured','=',1)->latest()->take(6)->get();
            $agents = AddAgent::latest()->take(5)->get();
            $bookmarked_properties = BookmarkProperty::where('user_id',auth()->user()->user_id)->get();
            $added_to_compare = Compare::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
            $latest_properties_images = [];
            $featured_properties_images = [];

            foreach($latest_properties as $property) {
                $property_images = Property_images::where('property_id', $property->property_id)->get();
                if ($property_images->isNotEmpty()) {
                    $latest_properties_images[$property->property_id] = $property_images;
                }
            }

            foreach($featured_properties as $property) {
                $property_images = Property_images::where('property_id', $property->property_id)->get();
                if ($property_images->isNotEmpty()) {
                    $featured_properties_images[$property->property_id] = $property_images;
                }
            }

            $response = [
                'latest_properties' => $latest_properties,
                'featured_properties' => $featured_properties,
                'agents' => $agents,
                'bookmarked_properties' => $bookmarked_properties,
                'added_to_compare' => $added_to_compare,
                'latest_properties_images' => $latest_properties_images,
                'featured_properties_images' => $featured_properties_images,
            ];

            return response()->json($response);


        }
        catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }

    public function property_list()
    {
        $Properties_list = DB::table('homeyproperties')->where('approval_status','=', 1)->latest()->get();
        $bookmarked_properties = BookmarkProperty::where('user_id', auth()->user()->user_id)->get();
        $added_to_compare = Compare::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
        $properties_images = [];

        foreach($Properties_list as $property) {
            $property_images = Property_images::where('property_id', $property->property_id)->get();
            if ($property_images->isNotEmpty()) {
                $properties_images[$property->property_id] = $property_images;
            }
        }

        $response = [
            'Properties_list' => $Properties_list,
            'bookmarked_properties' => $bookmarked_properties,
            'added_to_compare' => $added_to_compare,
            'properties_images' => $properties_images,
        ];

        return response()->json($response);

    }

     public function featured_properties_list()
    {
        $featured_properties_list = DB::table('homeyproperties')->where('approval_status','=', 1)->where('featured','=',1)->latest()->get();
        $bookmarked_properties = BookmarkProperty::where('user_id', auth()->user()->user_id)->get();
        $added_to_compare = Compare::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
        $featured_properties_list_images = [];

        foreach($featured_properties_list as $property) {
            $property_images = Property_images::where('property_id', $property->property_id)->get();
            if ($property_images->isNotEmpty()) {
                $featured_properties_list_images[$property->property_id] = $property_images;
            }
        }

        $response = [
            'featured_properties_list' => $featured_properties_list,
            'bookmarked_properties' => $bookmarked_properties,
            'added_to_compare' => $added_to_compare,
            'featured_properties_list_images' => $featured_properties_list_images,
        ];

        return response()->json($response);

    }

    public function users_property_rent_details_api($id)
    {
        $Property_details = DB::table('homeyproperties')->where('property_id', '=', $id)->get();
        $Property_images = Property_images::where('property_id', '=', $id)->get();
        $categories = DB::table('homeyproperties')->where('property_id', '=', $id)->pluck('categories')->first();
        $Property_room_list = DB::table('rooms_list')->where('property_id', $id)->get();
        $Property_room_count=DB::table('rooms_list')->where('property_id',$id)->count();
        $property_room_images_count=[];
         $Property_room_images=[];
        $Property_floor_plans = DB::table('houseplan')->where('property_id', $id)->get();
        $featured_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('featured', '=', 1)->latest()->take(3)->get();
        $similar_properties = DB::table('homeyproperties')->where('categories', '=', $categories)->where('approval_status', '=', 1)->take(5)->get();
        $featured_properties_images = [];
        $similar_properties_images=[];
        $intrested_response = InterstedProperty::where('user_id', auth()->user()->id)->first();
       if (!empty($intrested_response)) {
            $intrested_message  = "User Already Showed interest show applied Button";
        } else {
            $intrested_message  = "Show intrest Button";
        }
        foreach ($featured_properties as $key => $featured_property) 
        {
             $property_images = Property_images::where('property_id', $featured_property->property_id)->get();
            if ($property_images->isNotEmpty()) {
                $featured_properties_images[$featured_property->property_id] = $property_images;
            }
        }
         foreach ($similar_properties as $key => $similar_property) 
        {
             $property_images = Property_images::where('property_id', $similar_property->property_id)->get();
            if ($property_images->isNotEmpty()) {
                $similar_properties_images[$similar_property->property_id] = $property_images;
            }
        }
        foreach ($Property_room_list as $key => $room) 
        { 
            $room_images=DB::table('rooms_list')->where('room_id',$room->room_id)->get();

            foreach ($room_images as $key => $room_image) {
                $property_images = Room_images::where('room_id', $room_image->room_id)->get();
                $room_images_count=Room_images::where('room_id', $room_image->room_id)->count();
                $property_room_images_count[$room_image->room_id]=$room_images_count;
            if ($property_images->isNotEmpty()) {
                $Property_room_images[$room_image->room_id] = $property_images;
            }

            }
           
        }
        $responseData = [
            'Property_details' => $Property_details,
            'Property_images' => $Property_images,
            'categories' => $categories,
            'Property_room_count'=>$Property_room_count,
            'Property_room_list' => $Property_room_list,
            'property_room_images_count'=>$property_room_images_count,
             'Property_room_images' =>$Property_room_images,
            'Property_floor_plans' => $Property_floor_plans,
            'featured_properties' => $featured_properties,
            'featured_properties_images'=>$featured_properties_images,
            'similar_properties' => $similar_properties,
            'similar_properties_images'=>$similar_properties_images,
            'intrested_message'=>$intrested_message,
           ];

        return response()->json($responseData);
    }


    public function addProperty(Request $request)
    {
          //dd($request->all());
            $data = $request->all();
            $rules=[
                     'name'=>'required',
                    ];
            $validator = Validator::make($data,$rules);
           if ($validator->fails()) 
           {
               return response()->json(['error' => 'Validation failed'], 422);
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
                         $property->user_id = auth()->user()->user_id;
                         $property->status =0;
                         $property->featured = 0;
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
                                $property_images->added_by=auth()->user()->user_id;
                               $property_images->save();
                            }
                         }
                         return response()->json(['message' => 'Property added successfully'], 201);
                    }
                catch (\Exception $e) 
                {
           
                     return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
                }
                    
            }
    }


    public function edit_properties(Request $request, $id)
    {
        $property_details = Homeyproperties::where('property_id', '=', $id)->first();
        $room = Room::where('property_id', '=', $id)->get();
        $roomcount = Room::where('property_id', '=', $id)->count();
        $houseplans = House::where('property_id', '=', $id)->get();
        $houseplanscount = House::where('property_id', '=', $id)->count();

        return response()->json([
            'property_details' => $property_details,
            'room' => $room,
            'roomcount' => $roomcount,
            'houseplans' => $houseplans,
            'houseplanscount' => $houseplanscount,
        ], 200);
    }
            
     public function updateProperty(Request $request, $id)
    {
        if ($request->isMethod('put')) 
        {
            $response_code = 200;
            $message = array('error' => array('something went wrong'));
            $success = false;
            $data = $request->all();
            $rules = [
                'name' => 'required',
                // Add more validation rules as needed
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return response()->json(['error' => 'Validation failed'], 400);
            } else {
                try {
                   
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
                    
                );
              if($request->has('m_image'))
                     {
                        foreach ($request->file('m_image')as $m_image) {
                               $m_imagename = $id.'m'.time() .'_'.$m_image->getClientOriginalName();
                     $m_image->move(public_path('uploads/properties'), $m_imagename); 
                           $property_images = new Property_images();
                           $property_images->property_id=$id;
                           $property_images->image_name=$m_imagename;
                            $property_images->added_by=auth()->user()->user_id;
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
                 
                 $affectedRows = Homeyproperties::where("user_id",auth()->user()->user_id)->where('property_id',$id)->update($update_array);

                    $success = true;
                    $message = array('success' => array('Property updated successfully'));
                    return response()->json(['message' => $message], $response_code);
                } catch (\Exception $e) {
                    // Handle the exception and return an error response
                    return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
                }
            }
        }
    
    }

    function deleteimages(Request $request, $id)
    {
        try {
            $imagename = DB::table('property_images')->where('ID', $id)->first();
            $path = public_path('uploads/properties/' . $imagename->image_name);
            @unlink($path);
            $images = DB::table('property_images')->where('id', $id)->delete();

            $message = array('success' => array('Image deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deleteroomimages(Request $request, $id)
    {
        try {
            $imagename = DB::table('room_images')->where('ID', $id)->first();
            $path = public_path('uploads/properties/' . $imagename->image_name);
            @unlink($path);
            $images = DB::table('room_images')->where('ID', $id)->delete();

            $message = array('success' => array('Image deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deletehouseimages(Request $request, $id)
    {
        try {
            $imagename = DB::table('houseplan')->where('ID', $id)->first();
            $path = public_path('uploads/properties/' . $imagename->plan_image);
            @unlink($path);
            $images = DB::table('houseplan')->where('ID', $id)->update(['plan_image' => null]);

            $message = array('success' => array('Image deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deleteroomsection(Request $request, $id)
    {
        try {
            $roomimages = DB::table('room_images')->where('room_id', $id)->get();

            foreach ($roomimages as $imagesname) {
                $path = public_path('uploads/properties/' . $imagesname->image_name);
                @unlink($path);
                DB::table('room_images')->where('id', $imagesname->id)->delete();
            }

            $affect = DB::table('rooms_list')->where('room_id', $id)->delete();

            $message = array('success' => array('Room deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deletehousesection(Request $request, $id)
    {
        try {
            $imagename = DB::table('houseplan')->where('ID', $id)->first();
            $path = public_path('uploads/properties/' . $imagename->plan_image);
            @unlink($path);

            $images = DB::table('houseplan')->where('ID', $id)->delete();

            $message = array('success' => array('House deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deleteproperty(Request $request, $id)
    {
      try {
            $deleteproperty = DB::table('homeyproperties')->where('property_id', $id)->delete();
            $rooms = DB::table('rooms_list')->where('property_id', $id)->get();

            foreach ($rooms as $room) {
                DB::table('rooms_list')->where('room_id', $room->room_id)->delete();

                $roomimages = DB::table('room_images')->where('room_id', $room->room_id)->get();

                foreach ($roomimages as $imagesname) {
                    $path = public_path('uploads/properties/' . $imagesname->image_name);
                    @unlink($path);
                    DB::table('room_images')->where('id', $imagesname->id)->delete();
                }
            }

            $houseplans = DB::table('houseplan')->where('property_id', $id)->get();

            foreach ($houseplans as $value) {
                $imagename = DB::table('houseplan')->where('ID', $value->id)->first();
                $path = public_path('uploads/properties/' . $imagename->plan_image);
                @unlink($path);
                DB::table('houseplan')->where('ID', $value->id)->delete();
            }

            $message = array('success' => array('Property deleted successfully!!'));
            return response()->json(['message' => $message], 200); // Changed response_code to 200

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    public function user_added_properties()
    {
        try
        {
            $userproperties=Homeyproperties::where('user_id',Auth::guard('sanctum')->user()->user_id)->get();
            return response()->json($userproperties);


        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
  

    }

    public function user_bookmarked_properties()
    {
        try
        {
            $user_bookmarked_properties=BookmarkProperty::where('user_id',Auth::guard('sanctum')->user()->user_id)->get();
           $properties = [];
                $images = [];

                foreach ($user_bookmarked_properties as $user_bookmarked_propertie) {
                    $property = Homeyproperties::where('property_id', $user_bookmarked_propertie->property_id)->first();
                    $property_images = Property_images::where('property_id', $user_bookmarked_propertie->property_id)->get();

                    if ($property) {
                        $properties[] = $property;
                    }

                    if ($property_images) {
                        $images[$user_bookmarked_propertie->property_id] = $property_images;
                    }
                }

                $response = [
                    'user_bookmarked_properties' => $user_bookmarked_properties,
                    'properties' => $properties,
                    'images' => $images,
                ];

                return response()->json($response);


        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
  

    }

    public function user_application_responses()
    {
         try
        {
            $user_application=Application::where('user_id',auth()->user()->user_id)->get();
            return response()->json($user_application);


        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
        
    }

    public function user_intrested_properties()
    {
        try
            {
                // $user_intrested_properties = InterstedProperty::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
                // $user_intrested_properties_list = [];
                // $properties_images = [];

                // foreach ($user_intrested_properties as $user_intrested_propertie) {
                //     $property = Homeyproperties::where('property_id', $user_intrested_propertie->property_id)->first();
                //     $property_images = Property_images::where('property_id', $user_intrested_propertie->property_id)->get();

                //     if ($property) {
                //         $user_intrested_properties_list[] = $property;
                //     }

                //     if ($property_images) {
                //         $properties_images[$user_intrested_propertie->property_id] = $property_images;
                //     }
                // }

                // $response = [
                //     'user_intrested_properties' => $user_intrested_properties,
                //     'user_intrested_properties_list' => $user_intrested_properties_list,
                //     'properties_images' => $properties_images,
                // ];

                // return response()->json($response);
                 $user_applications = InterstedProperty::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
                $properties = [];
                $images = [];

                foreach ($user_applications as $user_application) {
                    $property = Homeyproperties::where('property_id', $user_application->property_id)->first();
                    $property_images = Property_images::where('property_id', $user_application->property_id)->get();

                    if ($property) {
                        $properties[] = $property;
                    }

                    if ($property_images) {
                        $images[$user_application->property_id] = $property_images;
                    }
                }

                $response = [
                    'user_application' => $user_applications,
                    'properties' => $properties,
                    'images' => $images,
                ];

                return response()->json($response);
            }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
    }

    public function user_dashboard()
    {
        try
        {
         
         $propertyCount =  DB::table('homeyproperties')->where('approval_status',1)->count();
         $intersted = InterstedProperty::where('user_id',auth()->user()->user_id)->count();
         $bookmark =   DB::table('bookmark_property')->where('user_id',auth()->user()->user_id)->count();
         $response=
         [
            'propertyCount'=>$propertyCount,
             'intersted' =>$intersted,
             'bookmark'=> $bookmark,
         ];
         return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

        
    }

    public function owner_dashboard()
    {
        try
        {
        $propertys =  Homeyproperties::where("user_id",Auth::guard('sanctum')->user()->user_id)->where('approval_status','=', 1 )->count();
        $intersted = InterstedProperty::where('agent_id',auth()->user()->user_id)->count();
        $bookmark =   DB::table('bookmark_property')->where('agent_id',auth()->user()->user_id)->count();
        $application = DB::table('application')->where('agent_id',auth()->user()->user_id)->count();
         $response=
         [
            'propertys'=>$propertys,
             'intersted' =>$intersted,
             'bookmark'=> $bookmark,
             'application'=>$application,
         ];
         return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
    }

    public function owner_intrested_properties()
    {
        try
        {
            $intersted = InterstedProperty::where('agent_id',auth()->user()->user_id)->get();
            return response()->json($intersted);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
        
    }

    public function owner_application_responses()
    {
         try
        {
            $application = Application::where('agent_id',auth()->user()->user_id)->get();
            return response()->json($application);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    public function owner_aggrement_details()
    {
       $propertys = Homeyproperties::where("user_id",auth()->user()->user_id)->where('approval_status','=', 1 )->count();
      if($propertys>= 1)
      {
        try
      
        {
            $application = Application::where('agent_id',auth()->user()->user_id)->get();
            return response()->json($application);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
      }
      else
      {
         return response()->json(['error' => 'An error occurred: '], 500);

      }
    }


    public function show_intrest(Request $request, $id)
    {
        try
        {
            $property = InterstedProperty::get();
          $verify=Homeyproperties::where('property_id','=',$id)->first();
          if($verify->agent_id != '' )
          {
            $vid=$verify->agent_id;
          }
          else
          {
            $vid=$verify->user_id;
          }

        $apply = new InterstedProperty();
        $apply->property_id = $id;
        $apply->user_id = auth()->user()->user_id;
        $apply->agent_id = $vid;
        // $apply->property_type = Homeyproperties::where('id','=',$id)->pluck('property_type')->first();
        $apply->status = 'Intersted';
        $apply->save();
        $message= 'Intrest submitted successfully';
        return response()->json($message,200);

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function user_contact_us(Request $request)
    {
        try{
             $data = $request->all();
        $formattedDate = date('Y-m-d', strtotime($data['datepicker-here']));
        $contact = new Contactus();
        $contact->name = $data['name'];
        $contact->user_id=auth()->user()->user_id;
        $contact->phone = $data['phone'];
        $contact->date=$formattedDate;
        $contact->time=$data['time'];
        $contact->save();
        $message="We will get Back Soon...!!!";
            
        return response()->json($message,200);

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);       
             }
       
    }

    public function compare_properties(Request $request,$id)
  {
    try {
    $count = Compare::where('user_id', auth()->user()->user_id)->count();
    if ($count <= 4) {
        $compare_list = Compare::where('user_id', auth()->user()->user_id)->where('property_id', $id)->first();

        if (!empty($compare_list)) {
            $message = 'Already added to Compare';
            return response()->json(['message' => $message], 500);
        } else {
            $data = $request->all();
            $insert_array = [
                "user_id" => auth()->user()->user_id,
                "property_id" => $id,
            ];
            DB::table('compare')->insert($insert_array);
            $message = ['success' => ['Compare Added successfully']];
            return response()->json($message, 200);
        }
    } else {
        return response()->json(['error' => 'Property container have been full']);
    }
} catch (\Exception $e) {
    // Handle the exception and display the error message
    return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
}

  }

   public function user_profile_details()
    {
        try
        {
            $userinfo = UserInfo::where('user_id', auth()->user()->user_id)->first();
            $user = User::where('user_id', auth()->user()->user_id)->first();

            if (!$userinfo || !$user) {
                return response()->json(['error' => 'User information not found'], 404);
            }

            $response = [
                'userinfo' => $userinfo,
                'user' => $user,
            ];

            return response()->json($response, 200);   
        }
        catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }



     public function bookmark_property(Request $request,$id)
    {
      try {
            $bookmark_property = BookmarkProperty::where('user_id', auth()->user()->user_id)->where('property_id', $id)->get();

            if (!$bookmark_property->isEmpty()) {
                $success = false;
                $message = 'Already added to Bookmark';
                return response()->json(['message' => $message, 'success' => $success], 500);
            } else {
                $property = DB::table('bookmark_property')->get();
                $verify = Homeyproperties::where('property_id', $id)->first();

                if ($verify->agent_id != '') {
                    $vid = $verify->agent_id;
                } else {
                    $vid = $verify->user_id;
                }

                $apply = new BookmarkProperty();
                $apply->property_id = $id;
                $apply->user_id = auth()->user()->user_id;
                $apply->agent_id = $vid;
                $apply->property_type = "RENT";
                $apply->status = 'Success';
                $apply->save();

                $success = true;
                $message = ['success' => ['User Details Added successfully']];
                return response()->json(['message' => $message, 'success' => $success], 200);
            }
        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }

    }
 
     function user_profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'address' => 'required',
                'nationality' => 'required',
                'profile_pic' => 'required',
            ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            try 
            {
                if($request->file('profile_pic') != '')
                         {
                            $imageName = time() .'_'.$request->file('profile_pic')->getClientOriginalName();
                            $request->file('profile_pic')->move('uploads/user-profile/', $imageName); 
                            }else{
                                $imageName = "-";
                            }
                            if($request->file('cover_pic') != ''){
                             $cover_pic = time() .'_'.$request->file('cover_pic')->getClientOriginalName();
                            $request->file('cover_pic')->move('uploads/user-profile/', $cover_pic); 
                            }else{
                                $cover_pic = "-";
                            }

                $insert_array = [
                    "user_id" => auth()->user()->user_id,
                    "first_name" => $request->input('first_name'),
                    "last_name" => $request->input('last_name', ''), // You can set default values here
                    "email" => $request->input('email'),
                    "address" => $request->input('address'),
                    "gender" => $request->input('gender', ''), // Add default value if needed
                    "profile_pic" => $imageName,
                    "cover_pic" => $cover_pic, // Assuming there's no cover pic in API request
                    "note" => $request->input('note', ''), // Add default value if needed
                    "phone_no" => $request->input('phone_no'),
                    "nationality" => $request->input('nationality'),
                ];

                DB::table('user_basic_info')->insert($insert_array);

                return response()->json(['message' => 'Profile added successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);
    }


      public function Compare_list(Request $request)
    {
        $compare = Compare::select('property_id')
                          ->where('user_id', auth()->user()->user_id)
                          ->get();
                          
        $properties = [];
        $images = [];

        foreach ($compare as $compare_item) {
            $property = Homeyproperties::where('property_id', $compare_item->property_id)->first();
            $property_images = Property_images::where('property_id', $compare_item->property_id)->get();

            if ($property) {
                $properties[] = $property;
            }

            if ($property_images->isNotEmpty()) {
                $images[$compare_item->property_id] = $property_images;
            }
        }

        return response()->json(['properties' => $properties, 'images' => $images], 200);
    }
     public function removecompare(Request $request, $id)
    {
        // dd($request->all());
      
        $data = $request->all();
        
        // Delete the entry from the 'compare' table
        DB::table('compare')
            ->where('user_id', Auth::guard('web')->user()->user_id)
            ->where('property_id', $id)
            ->delete();

        $success = true;
        $message = ['success' => ['Compare Deleted successfully']];

        // Return a JSON response for the API
        return response()->json([ 'success' => $success, 'message' => $message], 200);
    }

    // delete intrested properties
      public function delete_intrested_property(Request $request, $id)
    {
         

        try{
          $affectedRows = InterstedProperty::where("user_id",auth()->user()->user_id)->where('property_id','=',$id)->delete();
           $success = true;
           $message=['success'=>['Intersted Property Deleted Successfully']];
           return response()->json([ 'success' => $success, 'message' => $message], 200);
        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

       public function delete_bookmarkd_property(Request $request, $id)
    {
         

        try{
          $affectedRows = BookmarkProperty::where("user_id",auth()->user()->user_id)->where('property_id','=',$id)->delete();
           $success = true;
           $message=['success'=>['Bookmarked Property Deleted Successfully']];
           return response()->json([ 'success' => $success, 'message' => $message], 200);
        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


}
