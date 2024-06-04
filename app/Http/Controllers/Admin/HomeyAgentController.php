<?php
    

namespace App\Http\Controllers\Admin;
use App\Models\AddAgent;
use App\Models\Agent;
use App\Models\InterstedProperty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Validator,Auth,DB,Hash;
use App\Facades\ResponseHelper;
use App\Models\Homeyproperties;
use App\Models\Property_images;

class HomeyAgentController extends Controller
{

    public function addagent_form()
        {
            // view Agent application form
        return view('admin.addagent');
        }

    public function agentlist()
        {
            // retriving agents list based on agent id : HOMEYAG
            $agentlist=Agent::where('agent_id', 'like', 'HOMEYAG'.'%')->latest('id')->paginate(8);
            $agentcount=Agent::get()->count();
            return view('admin.agentlist',compact('agentlist','agentcount'));
        }

        // Adding Agent Function
    public function addagent(Request $request)
        {
            if($request->isMethod('post'))
            {
               // DD(request->all());
                $response_code = 200;
                $message = array('error'=>array('something went wrong'));
                $success = false ;
                // all the inputs were storing into variable data
                $data = $request->all();
                // makeing these feilds mandatory
                $rules=[
                    'fname'=>'required',
                    'lname'=>'required',
                   'dob'=>'required',
                   'gender'=>'required',
                   'mobile'=>'required',
                   'email'=>'required',
                   'agentlocation'=>'required',
                   'agentaddress'=>'required',
                  'agentlocpincode'=>'required',
                //   'username'=>'required',
                  'phoneno'=>'required',
                   'password'=>'required',
                   'cpassword'=>'required',
                //   'file'=>'required',
                   'company_email'=>'required',
                ];
                $validator = Validator::make($data,$rules);
                // verifying the inputs
               if($validator->fails())
                {
                    return redirect('admin/agentlist')->withErrors($validator)->withInput();
                }
                else{
                            try
                            {
                                    # creating a unique id for the agent
                                   $code = AddAgent::orderBy('id', 'desc')->first();
                                    if($code == null){
                                     $id = "HOMEYAG".+1;
                                    }else{
                                     $id = "HOMEYAG".$code->id+1;
                                    }
                                    // moving file to storage folder 
                                    if($request->file('file') != '')
                                         {
                                         $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                         $request->file('file')->move('uploads/agents/', $file); 
                                         }
                                         else{
                                         $file = "dummy-profile-pic.png";
                                         }
                                          if($request->file('background_image') != '')
                                         {
                                         $background_image = time() .'_'.$request->file('background_image')->getClientOriginalName();
                                         $request->file('background_image')->move('uploads/agents/', $background_image); 
                                         }
                                         else{
                                         $background_image = "-";
                                         }
                                     $insert_array = array(
                                        "agent_id" => $id,
                                        "fname" => $data['fname'],
                                        "lname" => $data['lname'],
                                        "dateofbirth" => $data['dob'],
                                        "gender" => $data['gender'],
                                        "speciality" => $data['speciality'],
                                        "mobile" => $data['mobile'],
                                        "a_email" => $data['email'],
                                        "url" => $data['url'],
                                         "country_id"=>$data['country'],
                                        "state" => $data['state'],
                                        "description" => $data['description'],
                                         "username" =>$data['fname'].' '.$data['lname'] , 
                                        "phoneno" => $data['phoneno'],
                                        "agentlocation" => $data['agentlocation'],
                                        "agentaddress" => $data['agentaddress'],
                                        "agentlocpincode" => $data['agentlocpincode'],
                                        "password" => $data['password'],
                                        "cpassword" => $data['cpassword'],
                                        "facebook" => $data['face'],
                                        "twitter" => $data['twitter'],
                                        "google" => $data['google'],
                                        "linkedin" => $data['linkedin'],
                                        "file" => $file,
                                        "background_image"=>$background_image,
                                        );
                                     // inserting the details into agent and agent basic information table
                                    $login_data=array('agent_id'=>$id,"name"=>$data['fname'].' '.$data['lname'],'email'=>$data['company_email'],"password"=> Hash::make($data['password']),'status'=> 0,'role'=>0);
                                    DB::table('agents')->insert($login_data);
                                    DB::table('agent_basic_information')->insert($insert_array);
                                    return redirect('admin/agentlist')->with('message', 'Agent Added Successfully!!');
                            }
                            catch (\Exception $e) 
                            {
                                    // Handle the exception and display the error message
                                    return back()->with('error', 'An error occurred: ' . $e->getMessage());
                            }
                    }
            }
        }

    public function editagentprofile(Request $request,$id)
    {
        //dd($request->all());
          $profile_details = AddAgent::where('agent_id','=', $id)->first();
        if($request->isMethod('post'))
        {
        // {  $response_code = 200;
        //         $message = array('error'=>array('something went wrong'));
        //         $success = false ;
        //         // all the inputs were storing into variable data
        //         $data = $request->all();
        //         // makeing these feilds mandatory
        //         $rules=[
        //             'fname'=>'required',
        //             'lname'=>'required',
        //           'dob'=>'required',
        //           'gender'=>'required',
        //           'mobile'=>'required',
        //           'email'=>'required',
        //           'agentlocation'=>'required',
        //           'agentaddress'=>'required',
        //           'agentlocpincode'=>'required',
        //         //   'username'=>'required',
        //           'phoneno'=>'required',
        //           'password'=>'required',
        //           'cpassword'=>'required',
                   
        //         ];
        //         $validator = Validator::make($data,$rules);
        //         // verifying the inputs
        //       if($validator->fails())
        //         {
        //             return redirect('admin/agentlist')->withErrors($validator)->withInput();
        //         }
        //         else{
                        try{
                              $data = $request->all();
                         if($request->file('file') != ''){
                                $image = $request->file('file')->getClientOriginalName();
                                $request->file('file')->move('uploads/agents/', $image); 
                                $property_details = DB::table('agent_basic_information')->where('agent_id','=',$id )->first();
                                $path = public_path('uploads/agents/'.$property_details->file);
                                @unlink($path);
                            }
                            else
                            {
                                $property_details = DB::table('agent_basic_information')->where('agent_id','=',$id  )->first();    
                                    $image = $property_details->file;
                                } 
            
                                  if($request->file('background_image') != ''){
                                $background_image = $request->file('background_image')->getClientOriginalName();
                                $request->file('background_image')->move('uploads/agents/', $background_image); 
                                $property_details = DB::table('agent_basic_information')->where('agent_id','=',$id  )->first();
                                $path = public_path('uploads/agents/'.$property_details->background_image);
                                @unlink($path);
                            }else{
                                $property_details = DB::table('agent_basic_information')->where('agent_id','=',$id  )->first();    
                                    $background_image = $property_details->background_image;
                                }   
                        $update_arr = array(
                                "fname" => $data['fname'],
                                "lname" => $data['lname'],
                                "dateofbirth" => $data['dob'],
                                "gender" => $data['gender'],
                                "speciality" => $data['speciality'],
                                "mobile" => $data['mobile'],
                                "a_email" => $data['email'],
                                "url" => $data['url'],
                                "description" => $data['description'],
                                // "username" => $data['username'], 
                                "phoneno" => $data['phoneno'],
                                "agentlocation" => $data['agentlocation'],
                                "agentaddress" => $data['agentaddress'],
                                "agentlocpincode" => $data['agentlocpincode'],
                                // "password" => $data['password'],
                                // "cpassword" => $data['cpassword'],
                                "facebook" => $data['face'],
                                "twitter" => $data['twitter'],
                                "google" => $data['google'],
                                "linkedin" => $data['linkedin'],
                               "file" => $image,
                               "background_image" =>$background_image,
                                 "country_id"=>$data['country'],
                                 "state" => $data['state'],
                            );
                            $affectedRows = AddAgent::where("agent_id",$id )->update($update_arr);
                              return back()->with('message', 'Profile Updated Successfully!!');
            
                        }
                

                 catch (\Exception $e) {
                            // Handle the exception and display the error message
                            return back()->with('error', 'An error occurred: ' . $e->getMessage());
                        }
                // }


                      }
             return view('admin.admin-edit-agent-profile',compact('profile_details'));
    }

    public function delete_agent(Request $request,$id)
    {
        try{
            $agent_details= AddAgent::where('agent_id',$id)->first();
            $agent=Agent::where('agent_id',$id)->first();

            $path = public_path('uploads/agents/'.$agent_details->file);
            @unlink($path);
            $path1 = public_path('uploads/agents/'.$agent_details->background_image);
            @unlink($path1);
           

            $affectedRows =AddAgent::where('agent_id','=',$id)->delete();
            $deleteaggent=Agent::where('agent_id',$id)->delete();
         return back()->with('message', 'Agent Deleted successfully!!');

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function active_agent(Request $request,$id)
    {
        try{
              $update_array = array(
                   
                    "status" => 0,
                 );

                $affectedRows =Agent::where('agent_id','=',$id)->update($update_array);
                return back()->with('message', 'Agent Actived successfully!!');

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function deactive_agent(Request $request,$id)
    {
       try{
           $update_array = array(
                   
                    "status" => 1,
                 );

                
                $affectedRows =Agent::where('agent_id','=',$id)->update($update_array);
         return back()->with('message', 'Agent Deactivated successfully!!');

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
}
