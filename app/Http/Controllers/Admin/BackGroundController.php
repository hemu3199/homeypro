<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
use Validator,Auth,DB,Hash;
use App\Models\Application;
use App\Facades\ResponseHelper;
use App\Models\AddAgent;
use App\Models\Agent;


class BackGroundController extends Controller
{
	public function bgadd()
        {

        return view('admin.bg-add');
        
        }


           function bgaddagent(Request $request)
        {
        
                if($request->isMethod('post'))
                         {
           
            $data = $request->all();
            $rules=[

                'fname'=>'required',
                'lname'=>'required',
               'dob'=>'required',
               'gender'=>'required',
               'mobile'=>'required',
               'email'=>'required',
               'agentlocpincode'=>'required',
            //   'username'=>'required',
              'phoneno'=>'required',
               'password'=>'required',
               'cpassword'=>'required',
            //   'file'=>'required',
               'company_email'=>'required',
              

            ];

            $validator = Validator::make($data,$rules);
           
            if($validator->fails()){
                return redirect('admin/bgagentlist')->withErrors($validator)->withInput();
            }else{
                try{
                    $code = AddAgent::orderBy('id', 'desc')->first();
                if($code == null){
                 $id = "HOMEYBG".+1;
                }else{
                 $id = "HOMEYBG".$code->id+1;
                }
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
                     $background_image = "dummy-profile-pic.png";
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
                    "agentlocpincode" => $data['agentlocpincode'],
                    "agentaddress" => $data['agentaddress'],
                    "file" => $file,
                    "country_id"=>$data['country'],
                    "state" => $data['state'],
                    "username" => $data['fname'].' '.$data['lname'], 
                    "phoneno" => $data['phoneno'],
                   "password" => $data['password'],
                    "cpassword" => $data['cpassword'],
                    "background_image" =>$background_image,
                    
                    
                    
                );
                 $login_data=array('agent_id'=>$id,"name"=>$data['fname'].' '.$data['lname'],'email'=>$data['company_email'],"password"=> Hash::make($data['password']),'status'=> 0,'role'=>1);
                DB::table('agents')->insert($login_data);
                DB::table('agent_basic_information')->insert($insert_array);

                return redirect('admin/bgagentlist')->with('message', 'BGAgent Added Successfully!!');

                }

         catch (\Exception $e) {
                    // Handle the exception and display the error message
                    return back()->with('error', 'An error occurred: ' . $e->getMessage());
                }
            }
      
        }
        

    }
        public function bgagentlist()
        {
            $agentlist=Agent::where('agent_id', 'like', 'HOMEYBG'.'%')->latest('id')->paginate(10);
            $agentcount=Agent::get()->count();
            

        return view('admin.bgagentlist',compact('agentlist','agentcount'));
        }

        function transferto(Request $request)
        {
            // dd($request->all());
            $location=$request->all();
            $user_id =$location['user_id'];
            $property_id = $location['property_id'];
            if(!empty($location['location']))
            {
           $agentlist= DB::table('agent_basic_information')->where('agent_id', 'like', 'HOMEYBG'.'%')->where('state', 'like',$location['location'].'%')->paginate(10);
            }
            else
            {
                 $agentlist=  DB::table('agent_basic_information')->where('agent_id', 'like', 'HOMEYBG'.'%')->where('state', 'like','hsahghv'.'%')->paginate(10);
            }

            return view('admin.transferto',compact('agentlist','property_id','user_id'));

        }
        function transfer(Request $request)
        {

            try{
               // dd($request->all());

            $data=$request->all();
            $user_id =$data['user_id'];
            $property_id = $data['property_id'];
           
             $update_array = array(
             "transfered_to" => $data['agent_id'],
             "approval_status"=>0,
                 );

                $affectedRows =Application::where("user_id",'=',  $user_id)->where('property_id','=',  $property_id)->update($update_array);
                    return redirect('admin/intrested_user_responses')->with('message', 'Transfer Successfully!!');   
        
            


            }

             catch (\Exception $e) {
                        // Handle the exception and display the error message
                        return back()->with('error', 'An error occurred: ' . $e->getMessage());
            }
   
              
        }

        // function transferto(Request $request)
        // {
        //     //dd($request->all());
        //     $location=$request->all();
        //     // $user_id =$request->user_id;
        //     // $property_id = $request->property_id;
        //          $user_id =$location['user_id'];
        //     $property_id = $location['property_id'];
        //     if(!empty($location['location']))
        //     {
        //    $agentlist= DB::table('agent_basic_information')->where('agent_id', 'like', 'HOMEYBG'.'%')->where('state', 'like',$location['location'].'%')->paginate(10);
        //     }
        //     else
        //     {
        //          $agentlist=  DB::table('agent_basic_information')->where('agent_id', 'like', 'HOMEYBG'.'%')->where('state', 'like','hsahghv'.'%')->paginate(10);
        //     }
        //     return view('admin.transferto',compact('agentlist','property_id','user_id'));
        // }
        // function transfer(Request $request)
        // {
        //     try{
        //         $data=$request->all();
        //     $user_id =$data['user_id'];
        //     $property_id = $data['property_id'];
        //            $update_array = array(
        //      "transfered_to" => $data['agent_id'],
        //      "approval_status"=>0,
        //          );
        //         $affectedRows =Application::where("user_id",'=',  $user_id)->where('property_id','=',  $property_id)->update($update_array);
        //             return redirect('admin/intrested_user_responses')->with('message', 'Transfer Successfully!!');
        //     }
        //      catch (\Exception $e) {
        //                 // Handle the exception and display the error message
        //                 return back()->with('error', 'An error occurred: ' . $e->getMessage());
        //     }
        // }

        public function edit_transfer_bg_agent(Request $request,$id)
        {
          try
          {
            $data=$request->all();

                   $update_array = array(
             "transfered_to" => $data['agent_id'],
             "approval_status"=>0,
                 );

                $affectedRows =Application::where("ID",$id)->update($update_array);
                    return redirect('admin/intrested_user_responses')->with('message', 'Edit Transfer Successfully!!');

          }  
          catch (\Exception $e) {
                        // Handle the exception and display the error message
                        return back()->with('error', 'An error occurred: ' . $e->getMessage());
            } 
        }



        public function application_list()
    {
        $total_application_received = Application::orWhere('approval_status', 1)->orWhere('approval_status', 0)->latest()->paginate(10);
        return view('admin.application_list', compact('total_application_received'));

    }





}
