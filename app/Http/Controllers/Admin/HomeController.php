<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
use Validator,Auth,DB;
use App\Models\Application;
use App\Facades\ResponseHelper;
use App\Models\Homeyproperties;
use App\Models\Cities;
use App\Models\Agent;
use App\Models\InterstedProperty;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AgentContactUs;
use App\Models\BgAgentContactUs;
use App\Models\Testimonal;
use App\Models\Reviews;
use App\Models\LikeReview;





class HomeController extends Controller
{
    public function index()
    {
        // dd(\Auth::guard('admin')->user()->hasRole('editor'));
        $agents_count = DB::table('agents')->where('agent_id', 'LIKE', 'HOMEYAG%')->count();
        $total_property = DB::table('homeyproperties')->where('property_deleted', 0)->count();
        $verfied_property = DB::table('homeyproperties')->where('approval_status',1)->where('property_deleted', 0)->count();
        $user_count = DB::table('users')->count();
        $agents_count_last_week = DB::table('agent_basic_information')->where('agent_id', 'LIKE', 'HOMEYAG%')->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [now()->subWeek(), now()])->count();
        $total_property_count_last_week = DB::table('homeyproperties')->where('property_deleted', 0)->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [now()->subWeek(), now()])->count();
        $verfied_property_count_last_week = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [now()->subWeek(), now()])->count();
        $user_count_last_week = DB::table('users')->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), [now()->subWeek(), now()])->count();
        $latest_properties = DB::table('homeyproperties')->where('property_deleted', 0)->latest()->take(5) ->get();
        $latest_verified_properties = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->latest()->take(5) ->get();
        $latest_agents = DB::table('agents')->where('agent_id', 'LIKE', 'HOMEYAG%')->latest('id')->take(5) ->get();
        $latest_bgagents = DB::table('agents')->where('agent_id', 'LIKE', 'HOMEYBG%')->latest('id')->take(5) ->get();
        return view('admin.index',compact('agents_count','total_property','verfied_property','user_count',
                                          'agents_count_last_week','total_property_count_last_week',
                                          'verfied_property_count_last_week','user_count_last_week',
                                          'latest_properties','latest_verified_properties','latest_agents','latest_bgagents'));
    }
    public function properties_pdf_download()
    {
        $totalproperties = Homeyproperties::get();
        $total_property_count = DB::table('homeyproperties')->where('property_deleted', 0)->count();
        $total_property_count_jan = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [1])->get();
        $total_property_count_feb = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [2])->get();
        $total_property_count_march = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [3])->get();
        $total_property_count_apr = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [4])->get();
        $total_property_count_may = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [5])->get();
        $total_property_count_jun = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [6])->get();
        $total_property_count_july = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [7])->get();
        $total_property_count_aug = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [8])->get();
        $total_property_count_sept = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [9])->get();
        $total_property_count_oct = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [10])->get();
        $total_property_count_nov = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [11])->get();
        $total_property_count_dec = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [12])->get();
        $verfied_property = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->count();
        $total_verified_property_count_jan = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [1])->get();
        $total_verified_property_count_feb = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [2])->get();
        $total_verified_property_count_march = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [3])->get();
        $total_verified_property_count_apr = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [4])->get();
        $total_verified_property_count_may = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [5])->get();
        $total_verified_property_count_jun = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [6])->get();
        $total_verified_property_count_july = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [7])->get();
        $total_verified_property_count_aug = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [8])->get();
        $total_verified_property_count_sept = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [9])->get();
        $total_verified_property_count_oct = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [10])->get();
        $total_verified_property_count_nov = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [11])->get();
        $total_verified_property_count_dec = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [12])->get();
        $bookmarked_property = DB::table('bookmark_property')->count();
        $total_bookmarked_property_count_jan = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [1])->get();
        $total_bookmarked_property_count_feb = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [2])->get();
        $total_bookmarked_property_count_march = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [3])->get();
        $total_bookmarked_property_count_apr = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [4])->get();
        $total_bookmarked_property_count_may = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [5])->get();
        $total_bookmarked_property_count_jun = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [6])->get();
        $total_bookmarked_property_count_july = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [7])->get();
        $total_bookmarked_property_count_aug = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [8])->get();
        $total_bookmarked_property_count_sept = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [9])->get();
        $total_bookmarked_property_count_oct = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [10])->get();
        $total_bookmarked_property_count_nov = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [11])->get();
        $total_bookmarked_property_count_dec = DB::table('bookmark_property')->whereRaw('MONTH(created_at) = ?', [12])->get();
        $pdf_view = PDF::loadview('admin.pdf.admin_properties_graph', compact('totalproperties','total_property_count','verfied_property','bookmarked_property',
        'total_property_count_jan','total_property_count_feb','total_property_count_march','total_property_count_apr',
        'total_property_count_may','total_property_count_jun','total_property_count_july','total_property_count_aug',
        'total_property_count_sept','total_property_count_oct','total_property_count_nov','total_property_count_dec',
        'total_verified_property_count_jan','total_verified_property_count_feb','total_verified_property_count_march','total_verified_property_count_apr',
        'total_verified_property_count_may','total_verified_property_count_jun','total_verified_property_count_july','total_verified_property_count_aug',
        'total_verified_property_count_sept','total_verified_property_count_oct','total_verified_property_count_nov','total_verified_property_count_dec',
        'total_bookmarked_property_count_jan','total_bookmarked_property_count_feb','total_bookmarked_property_count_march','total_bookmarked_property_count_apr',
        'total_bookmarked_property_count_may','total_bookmarked_property_count_jun','total_bookmarked_property_count_july','total_bookmarked_property_count_aug',
        'total_bookmarked_property_count_sept','total_bookmarked_property_count_oct','total_bookmarked_property_count_nov','total_bookmarked_property_count_dec'));
        return $pdf_view->download('Monthly_Property_Report.pdf');
    }
    public function agent_list_pdf()
    {
        $agentlist=Agent::where('agent_id', 'like', 'HOMEYAG'.'%')->latest('id')->get();
        $agentcount= DB::table('agents')->where('agent_id', 'like', 'HOMEYAG'.'%')->count();
        $pdf_view = PDF::loadview('admin.pdf.agent_list_pdf', compact('agentlist','agentcount'));
        return $pdf_view->download('Agents.pdf');
    }
    public function bg_agent_list_pdf()
    {
        $bgagentlist=DB::table('agents')->where('agent_id', 'like', 'HOMEYBG'.'%')->latest('id')->get();
        $bgagentcount= DB::table('agents')->where('agent_id', 'like', 'HOMEYBG'.'%')->count();
        $pdf_view = PDF::loadview('admin.pdf.bg_agent_list_pdf', compact('bgagentlist','bgagentcount'));
        return $pdf_view->download('Bg_Agents.pdf');
    }
    public function properties_report_pdf()
    {
        $totalproperties_report = InterstedProperty::latest()->get();
        $totalproperties_intrestedreport = InterstedProperty::where('status','=','Intersted')->get()->count();
        $pdf_view = PDF::loadview('admin.pdf.properties_report_pdf', compact('totalproperties_report','totalproperties_intrestedreport'));
        return $pdf_view->download('Properties_Report.pdf');
        }

    public function adminTest()
    {
        // if(\Auth::guard('admin')->user()->hasRole('admin')){
        //     dd('only admin allowed');
        // }
        
        if(\Gate::forUser(\Auth::guard('admin')->user())->allows('admin')){
            dd('only admin allowed');
        }
        abort(403);
    }

    public function editorTest()
    {
        if(\Auth::guard('admin')->user()->hasRole('editor')){
            dd('only editor allowed');
        }
        abort(403);
    }


   



    public function properties()
    {
        //$totalproperties =  ::query()->ger();
        return view('admin.Properties');
    }
    public function usercontactus()
    {
          $usercontacus =  Contactus::query()
                        ->orderBy('date')
                        ->orderBy('time')->latest()
                        ->paginate(10);
        return view('admin.user_contactus_response',compact('usercontacus'));
    }
    public function intrested_user_responses()
    {
        $intresteduserresponse= Application::query()->where('application_status','=','1')->latest()->paginate(10);
        return view('admin.intrested_user_responses',compact('intresteduserresponse'));
    }


    // Contact Response delete
    
    public function delete_contact_response(Request $request,$id )
    {
        $delete=Contactus::where('contact_id',$id)->delete();
        
        return back()->with('message','Response Deleted Successfully');

    }



    public function edit_user_contact_response(Request $request,$id )
    {
        try {
             $usercontacus =  Contactus::query()
                        ->orderBy('date')
                        ->orderBy('time')
                        ->get();
            $contact_edit_details=Contactus::where('contact_id',$id)->first();
             if($request->isMethod('post'))
                {
                    //DD($request->all());
                  try{
                     $data=$request->all();
                     $formattedDate = date('Y-m-d', strtotime($data['datepicker-here']));
                          
                       $update_array = array
                          (
                            "name" => $data['name'],
                            "phone" => $data['phone'],
                            "date"=>$formattedDate,
                            "time"=>$data['time'],
                                
                                
                            );
                             
                             $affectedRows = Contactus::where('contact_id',$id)->update($update_array);
                                 return back()->with('message', 'Contactus Response Updated successfully!!');


                     }

                   catch (\Exception $e) {
                              // Handle the exception and display the error message
                              return back()->with('error', 'An error occurred: ' . $e->getMessage());
                          }
                         


                  }
  


                    return view('admin.user_contactus_response_edit',compact('usercontacus','contact_edit_details'));

            
        } 
          catch (\Exception $e) {
           
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
        

    }


    // Agent Contact Us Response 
    public function agentcontactus()
    {
          $agentcontacus = AgentContactUs::query()
                        ->orderBy('date')
                        ->orderBy('time')
                        ->paginate(10);
        return view('admin.agent_contactus_response',compact('agentcontacus'));
    }

    //Edit Agent contact us response

     public function edit_agent_contact_response(Request $request,$id )
    {
        try {
                 $agentcontacus =  AgentContactUs::query()
                            ->orderBy('date')
                            ->orderBy('time')
                            ->get();
                $contact_edit_details=AgentContactUs::where('id',$id)->first();
                 if($request->isMethod('post'))
                    {
                        //DD($request->all());
                      try
                       {
                         $data=$request->all();
                         $formattedDate = date('Y-m-d', strtotime($data['datepicker-here']));
                              
                           $update_array = array
                              (
                            
                                "agent_phone" => $data['phone'],
                                "message"=>$data['message'],
                                "date"=>$formattedDate,
                                "time"=>$data['time'],
                              );
                              $affectedRows = AgentContactUs::where('id',$id)->update($update_array);
                                     return back()->with('message', 'Contactus Response updated successfully!!');
                        }
                        catch (\Exception $e) {
                                  // Handle the exception and display the error message
                                  return back()->with('error', 'An error occurred: ' . $e->getMessage());
                              }
                    }
                return view('admin.agent_contactus_response_edit',compact('agentcontacus','contact_edit_details'));
            } 
          catch (\Exception $e) 
          {
           return back()->with('error', 'An error occurred: ' . $e->getMessage());
          }
      }


    // Delete Agents contact us response

     public function delete_agent_contact_response(Request $request,$id )
    {
        $delete=AgentContactUs::where('id',$id)->delete();
        
        return back()->with('message','Response Deleted successfully');

    }


    // Bg Agent Contact Us 
      public function bgagentcontactus()
    {
          $agentcontacus = BgAgentContactUs::query()
                        ->orderBy('date')
                        ->orderBy('time')
                        ->paginate(10);
        return view('admin.bgagent_contactus_response',compact('agentcontacus'));
    }

    //Edit Agent contact us response

     public function edit_bgagent_contact_response(Request $request,$id )
    {
        try {
                 $agentcontacus =  BgAgentContactUs::query()
                            ->orderBy('date')
                            ->orderBy('time')
                            ->get();
                $contact_edit_details=BgAgentContactUs::where('id',$id)->first();
                 if($request->isMethod('post'))
                    {
                        //DD($request->all());
                      try
                       {
                         $data=$request->all();
                         $formattedDate = date('Y-m-d', strtotime($data['datepicker-here']));
                              
                           $update_array = array
                              (
                            
                                "bg_agent_phone" => $data['phone'],
                                "message"=>$data['message'],
                                "date"=>$formattedDate,
                                "time"=>$data['time'],
                              );
                              $affectedRows = BgAgentContactUs::where('id',$id)->update($update_array);
                                     return back()->with('message', 'Contactus Response updated successfully!!');
                        }
                        catch (\Exception $e) {
                                  // Handle the exception and display the error message
                                  return back()->with('error', 'An error occurred: ' . $e->getMessage());
                              }
                    }
                return view('admin.bgagent_contactus_response_edit',compact('agentcontacus','contact_edit_details'));
            } 
          catch (\Exception $e) 
          {
           return back()->with('error', 'An error occurred: ' . $e->getMessage());
          }
      }


    // Delete Agents contact us response

     public function delete_bgagent_contact_response(Request $request,$id )
    {
        $delete=BgAgentContactUs::where('id',$id)->delete();
        
        return back()->with('message','Response Deleted successfully');

    }




    public function delete_application_response(Request $request,$id)
    {
        $affectedRows=Application::where('id',$id)->delete();
        return back()->with('message','Application Deleted successfully');
    }


         public function viewapplication(Request $request,$id )
    {
          
          $property_id=$request->query('property_id');
           $application_details = Application::where('user_id','=',$id)->where('property_id','=',$property_id)->first();
        
        return view('admin.viewapplication',compact('application_details'));
    }

    public function editapplication(Request $request,$id)
    {

          
           $application_details = Application::where('ID',$id)->first();
           if ($request->isMethod('post')) {
        // Validation rules
                    $rules = [
                        'aadhar_card' => 'required',
                        'present_address' => 'required',
                        'employee_status' => 'required',
                        'pan_no' => 'required',
                    ];

                    // Create a validator instance
                    $validator = Validator::make($request->all(), $rules);

                    if ($validator->fails()) {
                        // Validation failed, set error message
                        $message['error'] = $validator->errors()->all();
                    } else {
                        // Validation passed, update application details
                        $update_arr = [
                            "aadhar_card" => $request->input('aadhar_card'),
                            "present_address" => $request->input('present_address'),
                            "application_status" => 1,
                            "employee_status" => $request->input('employee_status'),
                            "pan_no" => $request->input('pan_no'),
                            "updated_at" => now(),
                        ];

                        // Update the application details
                        Application::where('ID',$id)
                            ->update($update_arr);

                        return redirect('admin/intrested_user_responses')->with('message','Application Details Updated');
                    }
                }
        
        return view('admin.editapplication',compact('application_details'));
        
    }

    // Cities
    public function cities()
    {
        $cities=Cities::latest()->get();
        return view('admin.cities',compact('cities'));
    }

    public function add_cities(Request $request)
    {
        try{
            $data=$request->all();
            if ($request->hasFile('city_image'))
                {
                            $city_image = time() .'_'.$request->file('city_image')->getClientOriginalName();
                         $request->file('city_image')->move('uploads/cities/', $city_image); 
                }
                else
                {
                          $city_image="-";
                 }


                         $insert_array = array
              (
                "city_name" => $data['city_name'],
                "city_description" => $data['city_description'],
                "city_image"=>$city_image,
               
                    
                    
                );
                 
                 $affectedRows = Cities::insert($insert_array);
                            return back()->with('message', 'City Added successfully!!');

        }
        catch (\Exception $e) {
                              // Handle the exception and display the error message
                              return back()->with('error', 'An error occurred: ' . $e->getMessage());
                          }

    }

    public function edit_cities(Request $request,$id)
    {
        $city=Cities::where('id',$id)->first();
         if($request->isMethod('post'))
                {
                    try {
                        $data=$request->all();
                           if ($request->hasFile('city_image'))
                            {
                                        $city_image = time() .'_'.$request->file('city_image')->getClientOriginalName();
                                     $request->file('city_image')->move('uploads/cities/', $city_image); 
                                $city_image_old=Cities:: where('id','=',$id)->first();
                                  $path = public_path('uploads/cities/'.$city_image_old->city_image);
                                        @unlink($path);
                            }
                            else
                            {
                                       $city=Cities:: where('id','=',$id)->first();
                                              $city_image = $city->city_image;
                             }
                             $update_array= array(
                               "city_name" => $data['city_name'],
                            "city_description" => $data['city_description'],
                            "city_image"=>$city_image,
                             );
                              $affectedRows = Cities::where('id',$id)->update($update_array);
                                        return redirect('admin/cities')->with('message', 'City Updated successfully!!');
                        
                    } catch (Exception $e) {
                        return back()->with('error', 'An error occurred: ' . $e->getMessage());
                        
                    }
                }
        return view('admin.edit_cities',compact('city'));
    }

    public function city_delete(Request $request,$id)
    {
        try {
            $delete=Cities::where('id',$id)->delete();
            return back()->with('message','city deleted successfully');
            
        } catch (Exception $e) { 
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
           
            
        }
    }

    public function send_user_properties_report()
    {
        $totalproperties_report = InterstedProperty::where('agent_id','like','HOMEYU'.'%')->latest()->get();
         $totalproperties_intrestedreport = InterstedProperty::where('status','=','Intersted')->where('agent_id','like','HOMEYU'.'%')->get()->count();
        
        return view('admin.User_Properties_report',compact('totalproperties_report','totalproperties_intrestedreport'));
    }
      public function send_agent_properties_report()
    {
        $totalproperties_report = InterstedProperty::where('agent_id','like','HOMEYAG'.'%')->latest()->get();
         $totalproperties_intrestedreport = InterstedProperty::where('status','=','Intersted')->where('agent_id','like','HOMEYAG'.'%')->get()->count();
        
        return view('admin.Agent_Properties_report',compact('totalproperties_report','totalproperties_intrestedreport'));
    }
      public function send_admin_properties_report()
    {
        $totalproperties_report = InterstedProperty::where('agent_id','Admin')->latest()->get();
        $totalproperties_intrestedreport = InterstedProperty::where('status','=','Intersted')->where('agent_id','Admin')->get()->count();
        
        return view('admin.Admin_Properties_report',compact('totalproperties_report','totalproperties_intrestedreport'));
    }

    function application(Request $request,$id)
    {
      try
      {
          $property_id=$request->query('property_id');
         $properties_details = Homeyproperties::where('property_id', $request->query('property_id'))->first();

            if (!empty($properties_details->user_id)) {
            $property_added_by = $properties_details->user_id;
            } elseif (!empty($properties_details->agent_id)) {
            $property_added_by = $properties_details->agent_id;
            } else {
            $property_added_by = 'Admin';
            }
        $details = new Application ();
        $details->user_id = $id;
         $details->agent_id =$property_added_by;
        $details->property_id= $property_id;
        $details->application_status = 0;
        $details->created_at = date('Y-m-d H:i:s');
        $details->save();
       return back()->with('message', 'Application sent successfully!!');

      }
        catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    function application_approve(Request $request,$id)
         {
            // $applications= Application::where('transfered_to','=','Admin')->paginate(10);
            try {
                 $property_id=$request->query('property_id');
                $update_array = array(
                   "approval_status" => 1,
                    'transfered_to'=>'Admin',
                 );

                $affectedRows =Application::where('property_id','=',$property_id)->where('user_id','=',$id)->update($update_array);
            return back()->with('message','Approved Successfully');

                
            } catch (Exception $e) {
                  return back()->with('error', 'An error occurred: ' . $e->getMessage());
                
            }
           
              
                // $success = true;
                // $message = array('success'=>array('Property Hided successfull'));
     // return view('agent.bgallotedaplications',compact('applications'));

         }
     function application_reject(Request $request,$id)
     {
            // $applications= Application::where('transfered_to','=',Auth::guard('agent')->user()->agent_id)->paginate(10);
             $property_id=$request->query('property_id');
 
       $update_array = array(
                   
                    "approval_status" => 2,
                     'transfered_to'=>'Admin',
                    
                 );

                $affectedRows =Application::where('property_id','=',$property_id)->where('user_id','=',$id)->update($update_array);
              
                // $success = true;
                // $message = array('success'=>array('Property Hided successfull'));
     return back()->with('message','Rejected Successfully');

     }

     function remark(Request $request,$id )
     {
          $property_id=$request->query('property_id');
             $update_array = array(
                   
                    "remarks" => $request->remarks,
                    
                    
                 );
         $affectedRows =Application::where('property_id','=',$property_id)->where('user_id','=',$id)->where('transfered_to','=','Admin')->update($update_array);
            return back()->with('message','Remarks Added successfully');

     }





    public function testimonials()
        {
            $testimonial_list=Testimonal::where('deleted_status','=',0)->latest()->paginate(5);
            $agentcount=Testimonal::get()->count();
            $deleted_testimonial_list=Testimonal::where('deleted_status','=',1)->latest()->paginate(5);
        return view('admin.testimonial',compact('testimonial_list','agentcount','deleted_testimonial_list'));
    }
    public function approve_testimonials(Request $request, $id)
    {
        try {
            $testimonial = Testimonal::
                where('id', $id)
                ->first();
            if (!$testimonial) {
                return back()->with('error', 'Testimonial not found.');
            }
            $testimonial->status = 1;
            $testimonial->save();
            return back()->with('message', 'Testimonial Approved Successfully');
        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function reject_testimonials(Request $request, $id)
    {
        try {
            $testimonial = Testimonal::
                where('id', $id)
                ->first();
            if (!$testimonial) {
                return back()->with('error', 'Testimonial not found.');
            }
            $testimonial->status = 2;
            $testimonial->save();
            return back()->with('message', 'Testimonial Rejected Successfully');
        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function deletetestimonials(Request $request,$id)
    {
    try {
    $delete=Testimonal::where('id',$id)->delete();
    return back()->with('message','Testimonial deleted successfully');
    } catch (Exception $e) {
    return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
    }

    public function reviews()
        {
            $testimonial_list=Reviews::where('deleted_status','=',0)->latest()->paginate(5);
            $agentcount=Reviews::get()->count();
            $deleted_testimonial_list=Reviews::where('deleted_status','=',1)->paginate(5);
        return view('admin.reviews',compact('testimonial_list','agentcount','deleted_testimonial_list'));
    }
    public function approve_reviews(Request $request, $id)
    {
        try {
            $testimonial = Reviews::
                where('id', $id)
                ->first();
            if (!$testimonial) {
                return back()->with('error', 'Review not found.');
            }
            $testimonial->status = 1;
            $testimonial->save();
            return back()->with('message', 'Review Approved Successfully');
        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function reject_reviews(Request $request, $id)
    {
        try {
            $testimonial = Reviews::
                where('id', $id)
                ->first();
            if (!$testimonial) {
                return back()->with('error', 'Review not found.');
            }
            $testimonial->status = 2;
            $testimonial->save();
            return back()->with('message', 'Review Rejected Successfully');
        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function deletereviews(Request $request,$id)
    {
    try {
    $delete=Reviews::where('id',$id)->delete();
    return back()->with('message','Review deleted successfully');
    } catch (Exception $e) {
    return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
    }





   




}
