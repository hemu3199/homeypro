<?php

namespace App\Http\Controllers\Agent;

use App\Models\Projects;
use App\Http\Controllers\Controller;
use Validator,Auth,DB;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;

class ProjectController extends Controller
{
	 public function create()
    {
      
        return view('agent.add-project');
    }

    public function add_project(Request $request)
    {
         if($request->isMethod('post'))
         {
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'project_name'=>'required',
                'project_location'=>'required',
                'project_description'=>'required',
                'project_type'=>'required',
                'project_status'=>'required',
                'project_payment_type'=>'required',
                'avg_price'=>'required',
                'project_area'=>'required',
                'launch_date'=>'required',
                'project_address'=>'required',
                // 'project_image'=>'required'
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{
                $code = Projects::orderBy('id', 'desc')->first();
                if($code == null){
                 $id = "PROJ".+1;
                }else{
                 $id = "PROJ".$code->id+1;
                }
                if($request->file('project_image') != ''){
                    $project_image = time() .'_'.$request->file('project_image')->getClientOriginalName();
                    $request->file('project_image')->move('uploads/project_image/', $project_image); 
                    }else{
                        $project_image = "-";
                    }
                     if($request->file('project_broucher') != ''){
                    $project_broucher = time() .'_'.$request->file('project_broucher')->getClientOriginalName();
                    $request->file('project_broucher')->move('uploads/project_broucher/', $project_broucher); 
                    }
                    else
                    {
                        $project_broucher = "-";
                    }
                $insert_array = array(

                    "project_id" => $id,
                    "project_name" => $data['project_name'],
                    "project_location" => $data['project_location'],
                    "project_description" => $data['project_description'],
                    "project_type" => $data['project_type'],
                    "project_status" => $data['project_status'],
                    "project_payment_type" => $data['project_payment_type'],
                    "avg_price" => $data['avg_price'],
                    "portion_sizes" => $data['portion_sizes'],
                    "project_area" => $data['project_area'],
                    "configurations" => $data['configurations'],
                    "launch_date" => $data['launch_date'],
                    "project_address" => $data['project_address'],
                    "general_amenities" =>json_encode($data['general']),
                    "project_image" => $project_image,
                    "project_broucher" => $project_broucher,
                    
                    "agent_id"  => Auth::guard('agent')->user()->agent_id,
                );
                DB::table('projects')->insert($insert_array);
                $success = true;
                $message = array('success'=>array('Project Added successfull'));
            }
        return ResponseHelper::returnResponse(200,$success,$message);
        }
        //$employees = User::whereIn('type', [2,3])->get();
        //return view('employee.attendance.add-attendance',compact('employees'));
        return back()->with('message', 'Details added successfully!!');

    }

    function projects_total_list()
    {
        $projects= Projects::get();
        return view('agent.agent_total_projects',compact('projects'));
    }


    function projects_list()
    {
        $projects= Projects::where('agent_id','=',Auth::guard('agent')->user()->agent_id)->get();
        return view('agent.agent_projects',compact('projects'));
    }
    public function project_deatils(Request $request,$id)
    {


        $projectviewdetails =  Projects::where('project_id','=',$id)->first();
       
   return view('agent.agent_project_view',compact('projectviewdetails'));
    }



     public function project_edit_deatils(Request $request,$id)
    {


        $projectviewdetails =  Projects::where('project_id','=',$id)->first();

        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
        
                'project_name'=>'required',
                // 'email'=>'required',
                // 'phone_no'=>'required',
                // 'address'=>'required',
                // 'nationality'=>'required',
                //'profile_pic'=>'required',
                
             ];
             $validator = Validator::make($data,$rules);
             if($validator->fails()){
                 $success = false;
                 $message = $validator->errors();
             }else{
            // if($request->file('project_image') != ''){
            //         $project_image = time() .'_'.$request->file('project_image')->getClientOriginalName();
            //         $request->file('project_image')->move('uploads/project_image/', $project_image); 
            //         }else{
            //             $project_image = "-";
            //         }
            //          if($request->file('project_broucher') != ''){
            //         $project_broucher = time() .'_'.$request->file('project_broucher')->getClientOriginalName();
            //         $request->file('project_broucher')->move('uploads/project_broucher/', $project_broucher); 
            //         }
            //         else
            //         {
            //             $project_broucher = "-";
            //         }


                     if($request->file('project_image') != ''){
                    $project_image = $request->file('project_image')->getClientOriginalName();
                    $request->file('project_image')->move('uploads/project_image/',$project_image); 
                    $property_details = DB::table('projects')->where('project_id','=',$id)->first();
                    $path = public_path('uploads/project_image/'.$property_details->project_image);
                    @unlink($path);
                }else{
                    $property_details =  Projects::where('project_id','=',$id)->first();    
                        $project_image = $property_details->project_image;
                    } 
                     if($request->file('project_broucher') != ''){
                    $project_broucher = $request->file('project_broucher')->getClientOriginalName();
                    $request->file('project_broucher')->move('uploads/project_broucher/',$project_broucher); 
                    $property_details = DB::table('projects')->where('project_id','=',$id)->first();
                    $path = public_path('uploads/properties/'.$property_details->project_broucher);
                    @unlink($path);
                }else{
                    $property_details =  Projects::where('project_id','=',$id)->first();    
                        $project_broucher = $property_details->project_broucher;
                    }     

                $update_array = array(

                   
                    "project_name" => $data['project_name'],
                    "project_location" => $data['project_location'],
                    "project_description" => $data['project_description'],
                    "project_type" => $data['project_type'],
                    "project_status" => $data['project_status'],
                    "project_payment_type" => $data['project_payment_type'],
                    "avg_price" => $data['avg_price'],
                    "portion_sizes" => $data['portion_sizes'],
                    "project_area" => $data['project_area'],
                    "configurations" => $data['configurations'],
                    "launch_date" => $data['launch_date'],
                    "project_address" => $data['project_address'],
                    // "general_amenities" =>json_encode($data['general']),
                    "project_image" => $project_image,
                    "project_broucher" => $project_broucher,
                    "updated_at"=>date('Y-m-d H:i:s'),
               );
                $affectedRows =Projects::where("agent_id",Auth::guard('agent')->user()->agent_id)->where('project_id','=',$id)->update($update_array);
              
                $success = true;
                $message = array('success'=>array('Project updated successfull'));
            }
            
        return ResponseHelper::returnResponse(200,$success,$message);
        }
  
   return view('agent.agent_edit_project',compact('projectviewdetails'));
    }
    







}
