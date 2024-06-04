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
use App\Models\AgentContactUs;
use App\Models\BgAgentContactUs;
use Barryvdh\DomPDF\Facade\Pdf;



class AgentController extends Controller
{
   public function index()
{
    // Get the agent based on their agent_id
    $route = Agent::where('agent_id', '=', Auth::guard('agent')->user()->agent_id)->first();
    // dd(\Auth::guard('agent')->user()->hasRole('editor'));
        $route= Agent::where('agent_id','=',Auth::guard('agent')->user()->agent_id )->first();
        $agents_count = DB::table('agents')->where('agent_id', 'LIKE', 'HOMEYAG%')->count();
        $properties_addedby_agent = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted',0)->count();
        $agent_bookmarked_properties = DB::table('bookmark_property')->where('agent_id', Auth::guard('agent')->user()->agent_id)->count();
        $agent_intersted_properties = DB::table('interested_property')->where('agent_id', Auth::guard('agent')->user()->agent_id)->count();
        $agentsData = DB::table('agents')
        ->where('agents.agent_id', 'LIKE', 'HOMEYAG%')
        ->where('agents.status', 0)
        ->join('agent_basic_information', 'agents.agent_id', '=', 'agent_basic_information.agent_id')
        ->select('agent_basic_information.*')->latest()->take(4)
        ->get();
        $totalproperties = DB::table('homeyproperties')->where('approval_status',1)->where('property_deleted',0)->count();
        $total_verfied_property = DB::table('homeyproperties')->where('approval_status',1)->where('property_deleted',0)->count();
        $total_bookmarked_properties = DB::table('bookmark_property')->count();
        $total_intersted_properties = DB::table('interested_property')->count();
        $application_approved = DB::table('application')->where('agent_id','=',Auth::guard('agent')->user()->agent_id )->where('approval_status', 1)->count();
        $agents_total_verfied_property = DB::table('homeyproperties')->where('agent_id','=',Auth::guard('agent')->user()->agent_id )->where('approval_status',1)->where('property_deleted',0)->count();
              //bg agents
        $bg_agents_count = DB::table('agents')->where('agent_id', 'LIKE', 'HOMEYBG%')->count();
        $total_application_recived = DB::table('application')->where('transfered_to', Auth::guard('agent')->user()->agent_id)->count();
        $total_application_pending = DB::table('application')->where('transfered_to', Auth::guard('agent')->user()->agent_id)->where('approval_status', 0)->count();
        $total_application_approved = DB::table('application')->where('transfered_to', Auth::guard('agent')->user()->agent_id)->where('approval_status', 1)->count();
        $total_application_rejected = DB::table('application')->where('transfered_to', Auth::guard('agent')->user()->agent_id)->where('approval_status', 2)->count();
        $total_property = DB::table('homeyproperties')->where('approval_status',1)->where('property_deleted',0)->count();

    // Check if the agent is deactivated and has either role 0 or 1
    if ($route->status == 0 && ($route->role == 0 || $route->role == 1)) {
        // Check if the agent is also inactive
        if ($route->role == 0) {
            return view('agent.dashboard',compact('agents_count','properties_addedby_agent','agent_bookmarked_properties','agent_intersted_properties','agentsData','totalproperties','total_verfied_property','agents_total_verfied_property','total_bookmarked_properties','total_intersted_properties','application_approved'));
        } else {
            return view('agent.bg-dashboard',compact('bg_agents_count','total_application_recived','total_application_approved','total_application_rejected','total_property','total_application_pending'));
        }
    } else {
        // If the agent is not deactivated or doesn't have the specified roles,
        // log them out and redirect to the login page with a message
        Auth::guard('agent')->logout();
        return redirect('agent/login')->with('status', 'Your account has been deactivated and you have been logged out.');
    }
}

    public function property_rent()
    {

    return view('agent.property-add-rent');
    }
    public function property_sale()
    {

    return view('agent.property-add-sale');
    }
    public function viewprofile()
    {
        //$profile_details = AddAgent::where('id','=', Auth::guard('agent')->user()->id)->first();
            

        $profile_details = AddAgent::where('agent_id','=',Auth::guard('agent')->user()->agent_id )->first();
            
        
        return view('agent.agentviewprofile',compact('profile_details'));

    }


    public function editagentprofile(Request $request)
    {
        //dd($request->all());
          $profile_details = AddAgent::where('agent_id','=', Auth::guard('agent')->user()->agent_id)->first();
        if($request->isMethod('post'))
        {
            try{
                  $data = $request->all();
             if($request->file('file') != ''){
                    $image = $request->file('file')->getClientOriginalName();
                    $request->file('file')->move('uploads/agents/', $image); 
                    $property_details = DB::table('agent_basic_information')->where('agent_id','=',Auth::guard('agent')->user()->agent_id )->first();
                    $path = public_path('uploads/agents/'.$property_details->file);
                    @unlink($path);
                }
                else
                {
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
                  return redirect('agent/viewprofile')->with('message', 'Profile Updated successfully!!');
                  

            }

         catch (\Exception $e) {
                    // Handle the exception and display the error message
                    return back()->with('error', 'An error occurred: ' . $e->getMessage());
                }


                      }
            
          
            
        
        return view('agent.editviewprofile',compact('profile_details'));
    }

     function agreement()
    {
     $agreement= Agreement::where('member_id',Auth::guard('agent')->user()->agent_id )->paginate(10);
        return view('agent.agreement',compact('agreement'));
        
       
    }

    function agent_contact(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $formattedDate = date('Y-m-d', strtotime($data['datepicker-here']));
        $contact = new AgentContactUs();
        $contact->agent_id = Auth::guard('agent')->user()->agent_id;
        $contact->agent_name = $data['name'];
        $contact->agent_phone = $data['phone'];
        $contact->message = $data['message'];
        $contact->date=$formattedDate;
        $contact->time=$data['time'];
        $contact->save();
        return back()->with('message', 'We will Reach you soon...!! ');
    }
    function bg_agent_contact(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $formattedDate = date('Y-m-d', strtotime($data['datepicker-here']));
        $contact = new BgAgentContactUs();
        $contact->bg_agent_id = Auth::guard('agent')->user()->agent_id;
        $contact->bg_agent_name = $data['name'];
        $contact->bg_agent_phone = $data['phone'];
        $contact->message = $data['message'];
        $contact->date=$formattedDate;
        $contact->time=$data['time'];
        $contact->save();
        return back()->with('message', 'We will Reach you soon...!! ');
    }
    
     public function agent_properties_pdf_download()
    {
        $totalproperties = Homeyproperties::where('approval_status', 1)->where('property_deleted',0)->get();

        $pdf_view = PDF::loadview('agent.pdf.properties_pdf', compact('totalproperties'));

        return $pdf_view->download('properties.pdf');
        
    }

    

}
