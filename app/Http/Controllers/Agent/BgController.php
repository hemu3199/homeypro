<?php

namespace App\Http\Controllers\Agent;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Validator,Auth,DB;
use App\Models\Agreement;
use App\Models\AddAgent;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;
use App\Models\Homeyproperties;
use App\Models\Property_images;
use App\Models\Application;
use Barryvdh\DomPDF\Facade\Pdf;



class BgController extends Controller
{
	 public function properties()
    {
        //$totalproperties =  ::query()->ger();

        $totalproperties =  Homeyproperties::where('approval_status','=',1)->where('property_deleted',0)->latest()->paginate(10);
 
        return view('agent.bgProperties',compact('totalproperties'));
    }
    public function properties_deatils(Request $request,$id)
    {


        $property_rent_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
          $images = Property_images::where('property_id','=',$id)->get();
          $property = Homeyproperties::where('id','=',$id)->first();
          $categories = DB::table('homeyproperties')->where('property_id','=',$id)->pluck('categories')->first();
          $room = DB::table('rooms_list')->where('property_id',$id)->get();
          $house=DB::table('houseplan')->where('property_id',$id)->get();
        $property_rent = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('featured','=',1)->latest()->take(3)->get();

        
        $similar = DB::table('homeyproperties')->where('categories','=',$categories)->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->take(5)->get();
        $reviews = 0;
        $review_count = 0;
        $helpful_review = 0;



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
   return view('agent.bgproperty_details',compact('property_rent_details','property_rent','property','images','room','house','similar','helpful_review', 'review_count', 'reviews','sharebutton'));
    }
      public function bgallotedaplications(Request $request)
    {
    	$applications= Application::where('transfered_to','=',Auth::guard('agent')->user()->agent_id)->latest()->paginate(10);
        return view('agent.bgallotedaplications',compact('applications'));
    }

       public function editbgagentprofile(Request $request)
    {
        //dd($request->all());
          $profile_details = AddAgent::where('agent_id','=', Auth::guard('agent')->user()->agent_id)->first();
        if($request->isMethod('post')){
          try{
              
              //dd($request->all());
             $data = $request->all();
             if($request->file('file') != ''){
                    $image = $request->file('file')->getClientOriginalName();
                    $request->file('file')->move('uploads/agents/', $image); 
                    $property_details = DB::table('agent_basic_information')->where('agent_id','=',Auth::guard('agent')->user()->agent_id )->first();
                    $path = public_path('uploads/agents/'.$property_details->file);
                    @unlink($path);
                }else{
                    $property_details = DB::table('agent_basic_information')->where('agent_id','=',Auth::guard('agent')->user()->agent_id )->first();    
                        $image = $property_details->file;
                    } 

                      if($request->file('background_image') != ''){
                    $background_image = $request->file('background_image')->getClientOriginalName();
                    $request->file('background_image')->move('uploads/agents/', $background_image); 
                    $property_details = DB::table('agent_basic_information')->where('agent_id','=',Auth::guard('agent')->user()->agent_id )->first();
                    $path = public_path('uploads/agents/'.$property_details->background_image);
                    @unlink($path);
                }else{
                    $property_details = DB::table('agent_basic_information')->where('agent_id','=',Auth::guard('agent')->user()->agent_id )->first();    
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
                );
                $affectedRows = AddAgent::where("agent_id",Auth::guard('agent')->user()->agent_id )->update($update_arr);
                
                if(!empty($request->newpassword && $request->cpassword))
                {
                 $request->validate([
                'currentpassword' => 'required',
                'newpassword' => 'required|min:8', // Example: Minimum 8 characters
                'cpassword' => 'required|same:newpassword',
                ]);
                
                // Check if the current password is correct
                if (!Hash::check($request->currentpassword, Auth::guard('agent')->user()->password)) {
                return redirect()->back()->with('error', 'Current Password Is Incorrect.');
                }
                
                // Update the user's password
                 Auth::guard('agent')->user()->update([
                'password' => Hash::make($request->newpassword),
                ]);
                    
                }
               
    
                  return redirect('agent/bgviewprofile')->with('message', 'Profile Updated successfully!!');

          }

         catch (\Exception $e) {
                    // Handle the exception and display the error message
                    return back()->with('error', 'An error occurred: ' . $e->getMessage());
                }
           
            }
            
          
            
        
        return view('agent.bgeditviewprofile',compact('profile_details'));
    }

      public function viewprofile()
    {
        //$profile_details = AddAgent::where('id','=', Auth::guard('agent')->user()->id)->first();
            

        $profile_details = AddAgent::where('agent_id','=',Auth::guard('agent')->user()->agent_id )->first();
            
        
        return view('agent.bgagentviewprofile',compact('profile_details'));

    }


         public function bgviewapplication(Request $request,$id )
    {
          
          $property_id=$request->query('property_id');
           $application_details = Application::where('user_id','=',$id)->where('property_id','=',$property_id)->first();
        
        return view('agent.bgviewapplication',compact('application_details'));
    }


    function bgapprove(Request $request,$id)
         {
            $applications= Application::where('transfered_to','=',Auth::guard('agent')->user()->agent_id)->paginate(10);
            $property_id=$request->query('property_id');

 
       $update_array = array(
                   
                    "approval_status" => 1,
                 );

                $affectedRows =Application::where('property_id','=',$property_id)->where('user_id','=',$id)->update($update_array);
              
                // $success = true;
                // $message = array('success'=>array('Property Hided successfull'));
     return view('agent.bgallotedaplications',compact('applications'));

         }
     function bgreject(Request $request,$id)
     {
            $applications= Application::where('transfered_to','=',Auth::guard('agent')->user()->agent_id)->paginate(10);
             $property_id=$request->query('property_id');
 
       $update_array = array(
                   
                    "approval_status" => 2,
                    
                 );

                $affectedRows =Application::where('property_id','=',$property_id)->where('user_id','=',$id)->update($update_array);
              
                // $success = true;
                // $message = array('success'=>array('Property Hided successfull'));
     return view('agent.bgallotedaplications',compact('applications'));

     }

     function remark(Request $request,$id )
     {
          $applications= Application::where('transfered_to','=',Auth::guard('agent')->user()->agent_id)->paginate(10);
          $property_id=$request->query('property_id');
             $update_array = array(
                   
                    "remarks" => $request->remarks,
                    
                 );

                $affectedRows =Application::where('property_id','=',$property_id)->where('user_id','=',$id)->update($update_array);
               return view('agent.bgallotedaplications',compact('applications'));

     }

     public function application_list_pdf()
    {
        $total_application_recived = Application::where('transfered_to','=',Auth::guard('agent')->user()->agent_id)->get();
        $pdf_view = PDF::loadview('agent.bg_pdf.application_list_pdf', compact('total_application_recived'));
        return $pdf_view->download('Application_List.pdf');
    }
    public function approved_application_list_pdf()
    {
        $total_application_approved = DB::table('application')->where('transfered_to', Auth::guard('agent')->user()->agent_id)->where('approval_status', 1)->get();
        $pdf_view = PDF::loadview('agent.bg_pdf.approved_application_list_pdf', compact('total_application_approved'));
        return $pdf_view->download('Approved_Application_List.pdf');
    }
    public function rejected_application_list_pdf()
    {
        $total_application_rejected = DB::table('application')->where('transfered_to', Auth::guard('agent')->user()->agent_id)->where('approval_status', 2)->get();
        $pdf_view = PDF::loadview('agent.bg_pdf.rejected_application_list_pdf', compact('total_application_rejected'));
        return $pdf_view->download('Rejected_Application_List.pdf');
    }
    public function pending_application_list_pdf()
    {
        $total_application_pending = DB::table('application')->where('transfered_to', Auth::guard('agent')->user()->agent_id)->where('approval_status', 0)->get();
        $pdf_view = PDF::loadview('agent.bg_pdf.pending_application_list_pdf', compact('total_application_pending'));
        return $pdf_view->download('Pending_Application_List.pdf');
    }
    
     public function bg_properties_pdf_download()
    {
        $totalproperties = Homeyproperties::where('approval_status', 1)->where('property_deleted',0)->get();

        $pdf_view = PDF::loadview('agent.bg_pdf.properties_pdf', compact('totalproperties'));

        return $pdf_view->download('properties.pdf');
        
    }





}
  