<?php

namespace App\Http\Controllers\Agent;

use App\Models\Property_sale;
use App\Models\InterstedProperty;

use App\Http\Controllers\Controller;
use Validator,Auth,DB;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;

class PropertysaleController extends Controller
{
    public function create()
    {
       /* $code = Employees::orderBy('id', 'desc')->first();
       if($code == null){
        $id = "FASE00".+1;
       }else{
        $id = "FASE00".$code->id+1;
       }
       $designtion = Designation::get();
       $department = Department::get();
       $employees = Employees::get();*/
        //return view('agent.property-add-rent',compact('id','designtion','department','employees'));
        return view('agent.property-add-sale');
    }

    function store(Request $request){
        //dd($request->all());
        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
               'name'=>'required',
              'location'=>'required',
               'description'=>'required',
               'appartment_type'=>'required',
               'price'=>'required',
               'year'=>'required',
               'property_status'=>'required',
               'propertyadd'=>'required',
               'total_sqft'=>'required',
               
               
               'file'=>'nullable|nullable|mimes:doc,pdf,docx,zip,png,jpge,jpg',
            ];
            $validator = Validator::make($data,$rules);
            if($request->file('file') != ''){
                $imageName = time() .'_'.$request->file('file')->getClientOriginalName();
                $request->file('file')->move('uploads/property-rent/', $imageName); 
                }else{
                    $imageName = "-";
                }
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{

                $code = Property_rent::orderBy('id', 'desc')->first();
                if($code == null){
                 $id = "PROP".+1;
                }else{
                 $id = "PROP".$code->id+1;
                }
                $insert_array = array(


                    "property_id"=>$id,

                    "name" => $data['name'],
                    "location" => $data['location'],
                    "description" => $data['description'],
                    "price" => $data['price'],
                    "bedsqft" => $data['bedsqft'],
                    "sqft" => $data['sqft'],
                    "carparking" => $data['carparking'],
                    "year" => $data['year'],
                    "property_address" => $data['location'],
                    "property_type" => 'Sale',
                    "property_status" => $data['property_status'],
                    "appartment_type" => $data['appartment_type'],
                    "total_sqft" => $data['total_sqft'],
                    "kitchen" => $data['kitchen'],
                    "livingroom" => $data['livingroom'],
                    "masterbedroom" => $data['masterbedroom'],
                    "bedroom2" => $data['bedroom2'],
                    "other_room" => $data['other'],
                    "general" => json_encode($data['general']),
                    "file" => $data['image'],
                    "agent_id" =>  Auth::guard('agent')->user()->agent_id,
                );
                DB::table('properties')->insert($insert_array);
                /*if($request->file('file') != ''){
                $upload_file = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('uploads/rent/', $upload_file); 
                }else{
                $upload_file = "-";
                }*/
                $success = true;
                $message = array('success'=>array('Property Added successfully'));
            }
       return ResponseHelper::returnResponse(200,$success,$message);
        }
        //$employees = User::whereIn('type', [2,3])->get();
        //return view('employee.attendance.add-attendance',compact('employees'));
        return view('agent.dashboard');

    }






    // function property_sale_edit(Request $request,$id)
    //  {
    //     $property_details= Property_rent::where('id','=',$id)->first();
    //      if($request->isMethod('post')){
    //         $response_code = 200;
    //         $message = array('error'=>array('something went wrong'));
    //         $success = false ;
    //         $data = $request->all();
    //         $rules=[
        
    //             'name'=>'required',
              
    //          ];
    //          $validator = Validator::make($data,$rules);
    //          if($validator->fails()){
    //              $success = false;
    //              $message = $validator->errors();
    //          }else{
    //         if($request->file('image') != ''){
    //                 $image = time() .'_'.$request->file('image')->getClientOriginalName();
    //                 $request->file('image')->move('uploads/properties/', $image); 
    //                 }
    //                 else
    //                 {
    //                     $image = "-";
    //                 }
    //            $update_array = array(
    //                  "name" => $data['name'],
    //                  "location" => $data['location'],
    //                  "description" => $data['description'],
    //                  "price" => $data['price'],
    //                  "bedsqft" => $data['bedsqft'],
    //                  "sqft"=> $data['sqft'],
    //                  "carparking" => $data['carparking'],
    //                  "year" => $data['year'],
    //                  "property_address"=> $data['propertyadd'],
    //                 "property_type" => 'Sale',
    //                  "property_status" => $data['property_status'],
    //                  "appartment_type" => $data['appartment_type'],
    //                  "total_sqft" => $data['total_sqft'],
                     
    //                  // "general" => json_encode($data['general']),
    //                  "file" => $image,
                     
    //                 "status" => 0,
    //              );

    //             $affectedRows =Property_rent::where("agent_id",Auth::guard('agent')->user()->id)->where('id','=',$id)->update($update_array);
              
    //             $success = true;
    //             $message = array('success'=>array('Property updated successfull'));
    //         }
            
    //     return ResponseHelper::returnResponse(200,$success,$message);
    //     }


    //     return view('agent.property-edit-rent',compact('property_details'));

    //  }


    /*function store(Request $request){
        //dd($request->all());
        $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();
        $rules=[
              'name'=>'required',
              'location'=>'required',
               'description'=>'required',
               'appartment_type'=>'required',
               'price'=>'required',
               'year'=>'required',
               'property_status'=>'required',
               'propertyadd'=>'required',
               'total_sqft'=>'required',
               'property_type'=>'required',
               'image'=>'required',
          
                                            
        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            $success = false;
            $message = $validator->errors();
        }else{
            $agent = Auth::guard('agent')->user();
            // return $admin;
            $bus = new Property_rent();
            $bus->name = $data['name'];
            $bus->location = $data['location'];
            $bus->description = $data['description'];
            $bus->price = $data['price'];
            $bus->bedsqft = $data['bedsqft'];
            $bus->sqft = $data['sqft'];
            $bus->carparking = $data['carparking'];
            $bus->year = $data['year'];
            $bus->property_address = $data['propertyadd'];
            //$bus->course_status = 1;
            $bus->property_type = $data['property_type'];
            $bus->property_status = $data['property_status'];
            $bus->appartment_type = $data['appartment_type'];
            $bus->total_sqft = $data['total_sqft'];
            $bus->file = $data['image'];
            $path = $data['image'];
            if($request->file('image')!="" && $request->file('image')!=null) $path = $request->file('image')->store('uploads/rent/'.$agent->id,'public');
            $bus->file = $path;
            $bus->save();
            $success=true;
            $message=array('success'=>array('Course successfully created.'));


            return ResponseHelper::returnResponse($success,$message);
        }
    
        return ResponseHelper::returnResponse($success,$message);
    
}*/
}