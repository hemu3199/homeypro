<?php

namespace App\Http\Controllers\Agent;

use App\Models\Property_rent;
use App\Models\Application;
use App\Models\Amenities;
use App\Models\InterstedProperty;

use App\Http\Controllers\Controller;
use Validator,Auth,DB;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;
use App\Models\Homeyproperties;
use App\Models\Property_images;
use App\Models\Room;
use App\Models\Room_images;
use App\Models\House;


class PropertyrentController extends Controller
{
    public function create()
    {
        return view('agent.property-add-rent');
    }




    function store(Request $request)
    {

                $data = $request->all();
                $rules=[
                     'name'=>'required',
                     ];
                     $validator = Validator::make($data,$rules);
        if($validator->fails())
        {
         return back()->withErrors($validator)->withInput();
                   
        }
        else
        {
         try{

            $code = Homeyproperties::orderBy('id', 'desc')->first();
                if($code == null){
                 $id = "PROP".+1;
                }else{
                 $id = "PROP".$code->id+1;
                }
                   if($request->file('p_image') != '')
                     {
                     $p_image = $id.time() .'_'.$request->file('p_image')->getClientOriginalName();
                     $request->file('p_image')->move('uploads/properties/', $p_image); 
                     }
                     else{
                     $p_image = "-";
                     }

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
                     $property->area=$data['area'];
                     $property->accomodation = $data['accomodation'];
                    $property->yard_size = $data['yard_size'];
                   $property->bedrooms = $data['bedrooms'];
                   $property->bathrooms = $data['bathrooms'];
                   $property->garage = $data['garage'];
                    $property->deatils_text = $data['deatils_text'];
                    $property->video_link =$data['video_link'];
                       if (!empty($data['wifi'])) {
                                        $property->wifi = $data['wifi'];
                                    }
                                       if (!empty($data['pool'])) {
                                        $property->pool = $data['pool'];
                                    }
                                       if (!empty($data['security'])) {
                                        $property->security = $data['security'];
                                    }
                                       if (!empty($data['laundry_room'])) {
                                        $property->laundry_room = $data['laundry_room'];
                                    }
                                       if (!empty($data['equipped_kitchen'])) {
                                        $property->equipped_kitchen = $data['equipped_kitchen'];
                                    }
                                       if (!empty($data['ac'])) {
                                        $property->ac = $data['ac'];
                                    }
                                       if (!empty($data['parking'])) {
                                        $property->parking = $data['parking'];
                                    }
                     $property->properties_documents = $p_image;
                   $property->approval_status = 0;
                     $property->agent_id = Auth::guard('agent')->user()->agent_id;
                     $property->status =1;
                     $property->featured = 0;
                     $property->property_deleted=0;
                     $property->save();
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
                   if($request->has('m_image'))
                     {
                        foreach ($request->file('m_image')as $m_image) {
                               $m_imagename = $id.'m'.time() .'_'.$m_image->getClientOriginalName();
                     $m_image->move(public_path('uploads/properties'), $m_imagename); 
                           $property_images = new Property_images();
                           $property_images->property_id=$id;
                           $property_images->image_name=$m_imagename;
                            $property_images->added_by=Auth::guard('agent')->user()->agent_id;
                           $property_images->save();
                       }
                     }
           return redirect('agent/agent_properties')->with('message', 'Property Added Successfully!!');

         }
          catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

                   
        }



    }



     function property_rent_edit(Request $request,$id)
     {

        $property_details= Homeyproperties::where('property_id','=',$id)->first();
    $room=Room::where('property_id','=',$id)->get();
    $roomcount = Room::where('property_id','=',$id)->count();
    $houseplans=House::where('property_id','=',$id)->get();
    $houseplanscount=House::where('property_id','=',$id)->count();
      
        return view('agent.property-edit-rent',compact('property_details','room','roomcount','houseplanscount','houseplans')); 
    }

    function propertyeditfn(Request $request,$id)
    {
       if($request->isMethod('post'))
    {
        //DD($request->all());
      try{
         $data=$request->all();
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
                    "status"=>1,
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
                            $property_images->added_by=Auth::guard('agent')->user()->agent_id;
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
                 
                 $affectedRows = Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id',$id)->update($update_array);
                     return redirect('agent/agent_properties')->with('message', 'Property Updated Successfully!!');


         }

       catch (\Exception $e) {
                  // Handle the exception and display the error message
                  return back()->with('error', 'An error occurred: ' . $e->getMessage());
              }
             


      }
  
   }

Function deleteimages(Request $request,$id)
{
    // dd($request->all());
   try{
       $data = $request->all();
     $imagename=DB::table('property_images')->where('ID',$id)->first();
      $path = public_path('uploads/properties/'.$imagename->image_name);
            @unlink($path);
     $images=DB::table('property_images')->where('id',$id)->delete();
    return back()->with('message', 'Image Deleted Successfully!!');

     }
      catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
       
}
Function deleteroomimages(Request $request,$id)
{
    try{
      $data = $request->all();
     $imagename=DB::table('room_images')->where('ID',$id)->first();
      $path = public_path('uploads/properties/'.$imagename->image_name);
            @unlink($path);
     $images=DB::table('room_images')->where('ID',$id)->delete();
    return back()->with('message', 'Image Deleted Successfully!!');

     }
      catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
        
}
Function deletehouseimages(Request $request,$id)
{
    // dd($request->all());
    try{
       $data = $request->all();
     $imagename=DB::table('houseplan')->where('ID',$id)->first();
      $path = public_path('uploads/properties/'.$imagename->plan_image);
            @unlink($path);
     $images=DB::table('houseplan')->where('ID',$id)->update(['plan_image' => null]);
    return back()->with('message', 'Image Deleted Successfully!!');

     }
      catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
       
}
Function deletehousesection(Request $request,$id)
{
    // dd($request->all());
    try{
       $data = $request->all();
     $imagename=DB::table('houseplan')->where('ID',$id)->first();
      $path = public_path('uploads/properties/'.$imagename->plan_image);
            @unlink($path);
     $images=DB::table('houseplan')->where('ID',$id)->delete();
    return back()->with('message', 'House Plans Deleted Successfully!!');

     }
      catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
       
}
Function deleteroomsection(Request $request,$id)
{
    // dd($request->all());
     try{
      $data = $request->all();
        $roomimages=DB::table('room_images')->where('room_id',$id)->get();
        Foreach( $roomimages as $key => $imagesname)
        {
            $path = public_path('uploads/properties/'.$imagesname->image_name);
            @unlink($path);
             $imagesdel=DB::table('room_images')->where('id',$imagesname->id)->delete();
        }
     $affect=DB::table('rooms_list')->where('room_id',$id)->delete();
    return back()->with('message', 'Room Deleted Successfully!!');

     }
      catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
 
        
}




     function property_hide(Request $request,$id)
     {
       

        try{
              $update_array = array(
                   
                    "status" => 1,
                 );

                $affectedRows =Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->update($update_array);
                return back()->with('message', 'Property Hided Successfully!!');

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
 
     }



      function property_show(Request $request,$id)
     {
       try{
           $update_array = array(
                   
                    "status" => 0,
                 );

                $affectedRows =Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->update($update_array);
         return back()->with('message', 'Property Show Successfully!!');

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
 

     }




public function properties_deatils(Request $request,$id)
    {
      $property_rent_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
          $images = Property_images::where('property_id','=',$id)->get();
          $property = Homeyproperties::where('id','=',$id)->first();
          $categories = DB::table('homeyproperties')->where('property_id','=',$id)->pluck('categories')->first();
          $room = DB::table('rooms_list')->where('property_id',$id)->get();
          $house=DB::table('houseplan')->where('property_id',$id)->get();
        $property_rent = DB::table('homeyproperties')->where('approval_status','=', 1 )->where('featured','=',1)->latest()->take(3)->get();

        
        $similar = DB::table('homeyproperties')->where('categories','=',$categories)->where('approval_status','=', 1 )->take(5)->get();


                $sharebutton=\Share::page( 
                 url('/').'/users-property-rent-details/'.$id, 
                 'here is the text'.$property_rent_details->name,
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();
       
   return view('agent.property_details',compact('property_rent_details','property_rent','property','images','room','house','similar','sharebutton'));
    }
    public function allproperties_deatils(Request $request,$id)
    {


         $property_rent_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
          $images = Property_images::where('property_id','=',$id)->get();
          $property = Homeyproperties::where('id','=',$id)->first();
          $categories = DB::table('homeyproperties')->where('property_id','=',$id)->pluck('categories')->first();
          $room = DB::table('rooms_list')->where('property_id',$id)->get();
          $house=DB::table('houseplan')->where('property_id',$id)->get();
        $property_rent = DB::table('homeyproperties')->where('approval_status','=', 1 )->where('featured','=',1)->latest()->take(3)->get();

        
        $similar = DB::table('homeyproperties')->where('categories','=',$categories)->where('approval_status','=', 1 )->take(5)->get();


                $sharebutton=\Share::page( 
                 url('/').'/users-property-rent-details/'.$id, 
                 'here is the text'.$property_rent_details->name,
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();

       
   return view('agent.allproperty_details',compact('property_rent_details','property_rent','property','images','room','house','similar','sharebutton'));
    }

 public function properties()
    {
        //$totalproperties =  ::query()->ger();

        $totalproperties =  Homeyproperties::where('approval_status','=',1)->where('property_deleted',0)->latest()->paginate(10);
 
        return view('agent.Properties',compact('totalproperties'));
    }



    function agent_properties()
    {
        $totalproperties= Homeyproperties::where('agent_id','=',Auth::guard('agent')->user()->agent_id)->where('property_deleted',0)->latest()->paginate(5);
        return view('agent.agent_properties',compact('totalproperties'));
    }




     public function properties_report()
    {
          $totalproperties_report = InterstedProperty::where('agent_id',Auth::guard('agent')->user()->agent_id)->get();
         $totalproperties_intrestedreport = InterstedProperty::where('status','=','Intersted')->where('agent_id',Auth::guard('agent')->user()->agent_id)->get()->count();
        
        return view('agent.Properties_report',compact('totalproperties_report','totalproperties_intrestedreport'));
    }
    


   
    function application(Request $request,$id)
    {
      try
      {
         $property_id=$request->query('property_id');
  
        $details = new Application ();
        $details->user_id = $id;
        $details->agent_id =Auth::guard('agent')->user()->agent_id;
       $details->property_id= $property_id;
       $details->application_status = 0;
       $details->created_at = date('Y-m-d H:i:s');
        $details->save();
       return back()->with('message', 'Application Sent Successfully!!');

      }
        catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

         public function viewapplication(Request $request,$id )
    {
          
          $property_id=$request->query('property_id');
           $application_details = Application::where('user_id','=',$id)->where('property_id','=',$property_id)->first();
        
        return view('agent.viewapplication',compact('application_details'));
    }



    public function property_delete(Request $request, $id)
    {
      
    // $deleteproperty=DB::table('homeyproperties')->where('property_id',$id)->delete();
    // $rooms=DB::table('rooms_list')->where('property_id',$id)->get();
    // foreach($rooms as $key=> $rooms)
    // {
    //     DB::table('rooms_list')->where('room_id',$rooms->room_id)->delete();
    //      $roomimages=DB::table('room_images')->where('room_id',$rooms->room_id)->get();
    //     Foreach( $roomimages as $key => $imagesname)
    //     {
    //         $path = public_path('uploads/properties/'.$imagesname->image_name);
    //         @unlink($path);
    //          $imagesdel=DB::table('room_images')->where('id',$imagesname->id)->delete();
    //     }

    // }
    // $houseplans=DB::table('houseplan')->where('property_id',$id)->get();
    // foreach ($houseplans as $key => $value) 
    // {
    //      $imagename=DB::table('houseplan')->where('ID',$value->id)->first();
    //   $path = public_path('uploads/properties/'.$imagename->plan_image);
    //         @unlink($path);
    //  $images=DB::table('houseplan')->where('ID',$value->id)->delete();

    // }
    // return back()->with('message', 'Property Deleted successfully!!');
    try{
           $update_array = array(
                   
                    "property_deleted" => 1,
                    "status"=>1,
                 );

                $affectedRows =Homeyproperties::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('property_id','=',$id)->update($update_array);
    return back()->with('message', 'Property Deleted Successfully!!'); 
    }
     catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
   
    }



 
    
    public function show(Request $request,$id )
 { 
     $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
    if($property_details->properties_documents != '-')
    {
        $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
            $path = public_path('uploads/properties/'.$property_details->properties_documents);
             return Response()->download($path);
    }
    else
    {
         $totalproperties= Homeyproperties::where('agent_id','=',Auth::guard('agent')->user()->agent_id)->paginate(10);
        return view('agent.agent_properties',compact('totalproperties'));

    }
  
   
 } 
    















}