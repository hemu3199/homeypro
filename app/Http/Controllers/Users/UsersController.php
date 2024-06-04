<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
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
use App\Models\Testimonal;
use App\Models\Reviews;
use App\Models\LikeReview;



class UsersController extends Controller
{
    public function users_dashboard()
    {
    
        $featured_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('featured','=',1)->latest()->take(6)->get();
        $latest_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->latest()->take(6)->get();
        $user = User::select('id')->first();
        $agents = AddAgent::latest()->take(5)->get();
        $city=  DB::table('homeyproperties')->select('city')->distinct()->get();
        $categories= DB::table('homeyproperties')->select('categories')->distinct()->get();
        $sharebutton=\Share::page( 
                 url('/').'/', 
                 
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();

    return view('user.index',compact('featured_properties','user','latest_properties','agents','city','categories','sharebutton'));
    }
    function explore()
    {
        return view('user.explore_all');
    }
    function listing()
    {
        return view('user.listing');
    }

    public function dashboard()
    {
        // $propertys = DB::table('homeyproperties')->get();
        // $propertyCount = $propertys->count();

         $intersted = InterstedProperty::where('user_id',auth()->user()->user_id)->count();
         $bookmark =   DB::table('bookmark_property')->where('user_id',auth()->user()->user_id)->count();
        // //$interstedCount = $intersted->count();
        $total_verified_properties= DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->count();
        $latest_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->latest()->take(6)->get();
        $latestBookmarkProperty = BookmarkProperty::where('user_id',auth()->user()->user_id)->latest()->take(4)->get();

    return view('user.dashboard',compact('total_verified_properties','intersted','bookmark','latest_properties','latestBookmarkProperty'));
    }
    public function users_application()
    {
        $application = DB::table('application')->where('user_id',auth()->user()->user_id)->get();
    return view('user.application',compact('application'));
    }

    public function users_view_application(Request $request,$id)
    {
        $application_details = Application::where('user_id','=',Auth::guard('web')->user()->user_id)->where('property_id','=',$id)->first();
        
    return view('user.view-application',compact('application_details'));
    }

    public function users_edit_application(Request $request, $id)
    {
    $application_details = Application::where('property_id', $id)
        ->where('user_id', Auth::guard('web')->user()->user_id)
        ->first();

    // Initialize response variables
    $response_code = 200;
    $message = [];
    $success = false;

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
            Application::where("user_id", Auth::guard('web')->user()->user_id)
                ->where('property_id', $id)
                ->update($update_arr);

            // Set success message
            $message['success'] = ['Details updated successfully'];
            $success = true;
            }
        }

        return view('user.edit-application', compact('application_details', 'success', 'message'));
    }
  
     public function users_delete_application(Request $request, $id)
    {
         

         // $application = DB::table('application')->where('user_id',auth()->user()->user_id)->get();
            // $application_details = Application::where('property_id','=',$id)->where('user_id','=',Auth::guard('web')->user()->user_id)->first();

        try{
          $affectedRows = Application::where("user_id",Auth::guard('web')->user()->user_id)->where('property_id','=',$id)->delete();
           return back()->with('message', 'Application Deleted Successfully');
        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
         
    }
     public function users_delete_bookmark(Request $request, $id)
    {
         

         // $application = DB::table('application')->where('user_id',auth()->user()->user_id)->get();
            // $application_details = Application::where('property_id','=',$id)->where('user_id','=',Auth::guard('web')->user()->user_id)->first();

        try{
          $affectedRows = BookmarkProperty::where("user_id",Auth::guard('web')->user()->user_id)->where('property_id','=',$id)->delete();
           return back()->with('message', 'Bookmark Property Deleted Successfully');
        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

      public function users_delete_intrested(Request $request, $id)
    {
         

         // $application = DB::table('application')->where('user_id',auth()->user()->user_id)->get();
            // $application_details = Application::where('property_id','=',$id)->where('user_id','=',Auth::guard('web')->user()->user_id)->first();

        try{
          $affectedRows = InterstedProperty::where("user_id",Auth::guard('web')->user()->user_id)->where('property_id','=',$id)->delete();
           return back()->with('message', 'Intersted Property Deleted Successfully');
        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    function users_property_bookmark(Request $request,$id)
     {
        //dd($request->all());
        $response_code = 200 ;
        $success = false ;
        $data = $request->all();
        $message = array('error'=>array('Something went wrong...'));
        $result = [];
        $rules = [
           
        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            $success = false;
            $message = $validator->errors();
       }else{

        $property = DB::table('bookmark_property')->get();
              $verify=Homeyproperties::where('property_id','=',$id)->first();
          if($verify->agent_id != '' )
          {
            $vid=$verify->agent_id;
          }
          else
          {
            $vid=$verify->user_id;
          }

        $apply = new BookmarkProperty();
        $apply->property_id = $id;
        $apply->user_id = Auth::guard('web')->user()->user_id;
        $apply->agent_id = $vid;
        $apply->property_type = "rent";
        $apply->status = 'Success';
        $apply->save();
        $success = true;
        $message = array('message'=>array('Property Bookmarked Successfully.'));
    }

       return redirect()->back()->with(['response_code' => $response_code, 'success' => $success, 'message' => $message]);
    }

    public function users_bookmark_property()
    {
        $bookmark = BookmarkProperty::where('user_id',auth()->user()->user_id)->latest()->get();
    return view('user.bookmark-property',compact('bookmark'));
    }

    public function users_bookmark_property_details($id)
    {
        $bookmark =DB::table('bookmark_property')->where('user_id',auth()->user()->user_id)->get();

        $property = Homeyproperties::where('id','=',$id)->first();
        $property_rent_details = DB::table('homeyproperties')->where('id','=',$property->id)->first();

    return view('users.bookmark-property-details',compact('bookmark','property','property_rent_details'));
    }
    

    public function users_intersted_property()
    {
        $intersted = InterstedProperty::where('user_id',auth()->user()->user_id)->latest()->get();
    return view('user.intersted-property',compact('intersted'));
    }

    public function users_intersted_property_details($id)
    {
        $intersted = InterstedProperty::where('user_id',auth()->user()->user_id)->get();

        $property = Homeyproperties::where('id','=',$id)->first();
        $property_rent_details = DB::table('homeyproperties')->where('id','=',$property->id)->first();

    return view('users.intersted-property-details',compact('intersted','property','property_rent_details'));
    }

    public function users_profile_setting()
    {
        $userinfo = UserInfo::where("user_id",Auth::guard('web')->user()->user_id)->first();

    return view('user.profile-settings',compact('userinfo'));
    }

    public function users_profile_setting_view()
    {
        $userinfo = UserInfo::where("user_id",Auth::guard('web')->user()->user_id)->first();
        $user = User::where("user_id",Auth::guard('web')->user()->user_id)->first();

    return view('user.profile-settings-view',compact('userinfo','user'));
    }

    public function users_profile_setting_update()
    {
        $userinfo = UserInfo::where("user_id",Auth::guard('web')->user()->user_id)->first();
    return view('users.profile-settings-edit',compact('userinfo'));
    }

    public function users_profile_setting_edit(Request $request)
    {
        $userinfo = UserInfo::where("user_id",Auth::guard('web')->user()->user_id)->first();
        if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
        
                'first_name'=>'required',
                'email'=>'required',
                'phone_no'=>'required',
                'address'=>'required',
                'nationality'=>'required',
                //'profile_pic'=>'required',
                
             ];
             $validator = Validator::make($data,$rules);
             if($validator->fails())
             {
                return back()->withErrors($validator)->withInput();
             }
             else
             {
                try{
                     
                     if($request->file('profile_pic') != ''){
                    $profile_pic = $request->file('profile_pic')->getClientOriginalName();
                    $request->file('profile_pic')->move('uploads/user-profile/', $profile_pic); 
                    $property_details = DB::table('user_basic_info')->where('user_id','=',Auth::guard('web')->user()->user_id)->first();
                    $path = public_path('uploads/user-profile/'. $property_details->profile_pic);
                    @unlink($path);
                }
                else
                {
                    $property_details = DB::table('user_basic_info')->where('user_id','=',Auth::guard('web')->user()->user_id)->first();    
                    $profile_pic = $property_details->profile_pic;
                }
                if($request->file('cover_pic') != '')
                {
                    $cover_pic = $request->file('cover_pic')->getClientOriginalName();
                    $request->file('cover_pic')->move('uploads/user-profile/', $cover_pic); 
                    $property_details = DB::table('user_basic_info')->where('user_id','=',Auth::guard('web')->user()->user_id)->first();
                    $path = public_path('uploads/user-profile/'. $property_details->cover_pic);
                    @unlink($path);
                }
                else
                {
                    $property_details = DB::table('user_basic_info')->where('user_id','=',Auth::guard('web')->user()->user_id)->first();    
                    $cover_pic = $property_details->cover_pic;
                }   
            
            $update_arr = array(

            "first_name" => $data['first_name'],
            "last_name" => $data['last_name'],
            "email" => $data['email'],
            "address" => $data['address'],
            "gender" => $data['gender'],
            
           "profile_pic" => $profile_pic,
            "phone_no" => $data['phone_no'],
            "nationality" => $data['nationality'],
            'updated_at' =>    date('Y-m-d H:i:s'),
            "cover_pic" => $cover_pic,
            "note" => $data["note"],
           
            //"file" => $data['file'],
            );
            $affectedRows = UserInfo::where("user_id",Auth::guard('web')->user()->user_id)->update($update_arr);
             return redirect('users-profile-setting-view')->with('message', 'Profile updated successfully!!');
            
            }
                 catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
             }
               
        }
        }
        
  
    }


    function users_profile_add(Request $request){
        //dd($request->all());
        if($request->isMethod('post')){
           
            $data = $request->all();
            $rules=[
                'first_name'=>'required',
                'email'=>'required',
                'phone_no'=>'required',
                'address'=>'required',
                'nationality'=>'required',
              
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                  return back()->withErrors($validator)->withInput();
              
            }
            else
            {
                try{
                         if($request->file('profile_pic') != '')
                         {
                            $imageName = time() .'_'.$request->file('profile_pic')->getClientOriginalName();
                            $request->file('profile_pic')->move('uploads/user-profile/', $imageName); 
                            }else{
                                $imageName = "dummy-profile-pic.png";
                            }
                            if($request->file('cover_pic') != ''){
                             $cover_pic = time() .'_'.$request->file('cover_pic')->getClientOriginalName();
                            $request->file('cover_pic')->move('uploads/user-profile/', $cover_pic); 
                            }else{
                                $cover_pic = "-";
                            }
                        $insert_array = array(
                            "user_id" =>Auth::guard('web')->user()->user_id,

                            "first_name" => $data['first_name'],
                            "last_name" => $data['last_name'],
                            "email" => $data['email'],
                            "address" => $data['address'],
                            "gender" => $data['gender'],
                            // "date_of_birth" => $data['date_of_birth'],
                            "profile_pic" => $imageName,
                            "cover_pic" => $cover_pic,
                            "note" =>$data['note'],
                            "phone_no" => $data['phone_no'],
                            "nationality" => $data['nationality'],
                            
                        );
                        DB::table('user_basic_info')->insert($insert_array);
                             return redirect('users-profile-setting-view')->with('message', 'Profile added successfully!!');
                    }
                   catch (\Exception $e) {
                    // Handle the exception and display the error message
                    return redirect('users-profile-setting-view')->with('error', 'An error occurred: ' . $e->getMessage());
                   }
            }
       
        }
      }

    public function users_about()
    {
        $testimonials = Testimonal::where("status", 1)->where("deleted_status", 0)->latest()->paginate(8);
          $sharebutton=\Share::page( 
                 url('/').'/users-about', 
                 'Latest Properties ',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();

    return view('user.about', compact('sharebutton','testimonials'));
    }
     public function referal()
    {
             $sharebutton=\Share::page( 
                 url('/').'/referal', 
                 'Latest Properties ',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();
    return view('user.referal', compact('sharebutton'));
    }
    public function helpfaq()
    {
             $sharebutton=\Share::page( 
                 url('/').'/helpfaq', 
                 'Latest Properties ',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();

    return view('user.helpfaq', compact('sharebutton'));
    }

    public function users_project()
    {

    return view('users.project');
    }


     public function users_project_filter(Request $request,$id)
    {
        $project=Projects::where('project_location', 'like',$id.'%')->paginate(8);

    return view('users.project_filter',compact('project'));
    }


    // public function users_project_details()
    // {


    // return view('users.project-details');
    // }
     public function users_project_details(Request $request,$id )
    {
        $project_details=Projects::where('project_id','=',$id)->first();

    return view('users.project-details',compact('project_details') );
    }
     public function users_project_viewbroucher(Request $request,$id )
    {
        $project_details=Projects::where('project_id','=',$id)->first();

    return view('users.project.viewbroucher',compact('project_details') );
    }

    public function users_property_rent()
    {
        
          $property_rent = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->latest()->paginate(10);
         
          $city =  null;
            $sharebutton=\Share::page( 
                 url('/').'/users-property-rent/', 
                 'Latest Properties ',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();

        return view('user.propertyrent',compact('property_rent','city','sharebutton'));
    }
     public function users_featured()
    {
          $property_rent =  DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('featured','=',1)->latest()->take(6)->paginate(10);
          $city =  null;
           $sharebutton=\Share::page( 
                 url('/').'/users-property-rent/', 
                 'Latest Properties ',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();

        return view('user.propertyrent',compact('property_rent','city','sharebutton'));
    }
     public function featured()
    {
        $property = Homeyproperties::where('property_type','=','rent')->first();
            $sharebutton=\Share::page( 
                 url('/').'/users-property-rent/', 
                 'Latest Properties ',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();
          $property_rent = DB::table('homeyproperties')->where('approval_status','=', 1 )->paginate(10);

        return view('user.propertyrent',compact('property_rent','property','sharebutton'));
    }



    public function users_property_rent_list()
    {
        $property = Homeyproperties::where('property_type','=','rent')->first();
        $property_rent_list = DB::table('homeyproperties')->where('status','=',0)->where('property_type','=',$property->property_type)->where('approval','=', 1 )->paginate(4);

     
        return view('users.property-rent-list',compact('property_rent_list','property'));
    }

    function users_property_rent_details(Request $request,$id)
    {
        // $id = decrypt($ID);
       
        $property_rent_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
          $images = Property_images::where('property_id','=',$id)->get();
          $property = Homeyproperties::where('id','=',$id)->first();
          $categories = DB::table('homeyproperties')->where('property_id','=',$id)->pluck('categories')->first();
          $room = DB::table('rooms_list')->where('property_id',$id)->get();
          $house=DB::table('houseplan')->where('property_id',$id)->get();
        $property_rent = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('featured','=',1)->latest()->take(3)->get();

        
        $similar = DB::table('homeyproperties')->where('categories','=',$categories)->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->take(5)->get();
        $reviews = Reviews::where('property_id','=',$id)->where("status", 1)->where("deleted_status", 0)->latest()->paginate(3);
        $review_count = Reviews::where('property_id','=',$id)->where("status", 1)->where("deleted_status", 0)->count();
        $helpful_review = LikeReview::where('property_id','=',$id)->count();



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

        return view('user.property-rent-details',compact('property_rent_details','property_rent','property','images','room','house','similar','helpful_review', 'review_count', 'reviews','sharebutton'));
    }



    public function users_contact()
    {
         $sharebutton=\Share::page( 
                 url('/').'/users-contact', 
                 'Latest Properties ',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();

    return view('user.contact',compact('sharebutton'));
    }

    public function users_agent()
    {

    return view('users.agent');
    }

    function contactstore(Request $request){
       // dd($request->all());
      
        $data = $request->all();
        $formattedDate = date('Y-m-d', strtotime($data['datepicker-here']));

        
            $contact = new Contactus();
            // $contact->user_id = Auth::guard('web')->user()->user_id;
            $contact->name = $data['name'];
           
            $contact->phone = $data['phone'];
           
            $contact->date=$formattedDate;
            $contact->time=$data['time'];
            $contact->save();
            
            return back()->with('message', 'We will Reach you soon...!! ');


            //return ResponseHelper::returnResponse($success,$message);
        }


      
    

    public function privacy()
    {
        return view('user.Privacy');
    }


    function agentlisting(Request $request)
    {
     if($request->isMethod('post'))
     {
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'name'=>'required',
                'email'=>'required',
                'mobile_no'=>'required',
                'city'=>'required',
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails())
            {
                 return back()->withErrors($validator)->withInput();
            }
            else
            {
            try{  
              $code = BecomeAMember::orderBy('id', 'desc')->first();
                if($code == null){
                      $randomNumber = random_int(1000, 9999);
                 $id = "HOMEYB".$randomNumber.+1;
                }else{
                    $randomNumber = random_int(1000, 9999);
                 $id = "HOMEYB".$randomNumber.$code->id+1;
                }
              
                 
                $insert_array = array(
                    "application_id"=>$id,
                   "name"=>$data['name'],
                   "email"=>$data['email'],
                    "mobile_no" => $data['mobile_no'],
                     "city" => $data['city'],
                     "applied_for" => 0,
                     "status" => 0,
                      
                );
                DB::table('become_a_member')->insert($insert_array);
               
                 return back()->with('message', 'Successfully Submitted');
                }
                 catch (\Exception $e) 
                 {
            // Handle the exception and display the error message
                  return back()->with('error', 'An error occurred: ' . $e->getMessage());
                } 

              
            }
        }


    }
     function ownerlisting(Request $request)
    {

             if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'name'=>'required',
                'email'=>'required',
                'mobile_no'=>'required',
                'city'=>'required',
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                 return back()->withErrors($validator)->withInput();
            }
            else
            { 
             try{
                $code = BecomeAMember::orderBy('id', 'desc')->first();
                if($code == null){
                      $randomNumber = random_int(1000, 9999);
                 $id = "HOMEYB".$randomNumber.+1;
                }else{
                    $randomNumber = random_int(1000, 9999);
                 $id = "HOMEYB".$randomNumber.$code->id+1;
                }
              
                 
                $insert_array = array(
                    "application_id"=>$id,
                   "name"=>$data['name'],
                   "email"=>$data['email'],
                    "mobile_no" => $data['mobile_no'],
                     "city" => $data['city'],
                     "applied_for" => 1,
                     "status" => 0,
                      
                );
                DB::table('become_a_member')->insert($insert_array);
              
                 return back()->with('message', 'Successfully Submitted');
            }
               catch (\Exception $e) 
                 {
            // Handle the exception and display the error message
                  return back()->with('error', 'An error occurred: ' . $e->getMessage());
                }

            }
        // return ResponseHelper::returnResponse(200,$success,$message);
        }
        // return back()->with('message', 'Details added successfully!!');


    }
      // public function subscribe(Request $request )
      // {
      //   $request->validate([
      //       'email'=>'required|email',
      //   ]);
      //   try {
      //       if(Newsletter::isSubscribed('lord.vetinari@discworld.com'); //returns a boolean)
      //       {
                
      //       }

            
      //   } catch (Exception $e) {
            
      //   }

      // }

 public function show(Request $request,$id )
 { 
     $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
    if(!empty($property_details->properties_documents) )
    {
        $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();
            $path = public_path('uploads/properties/'.$property_details->properties_documents);
             return Response()->download($path);
    }
    else
    {
        return back();

    }
  
   
 } 




     function homeinsurance()
    {
        return view('user.homeinsurance');
    }
      function line_of_credit()
    {
        return view('user.line-of-credit');
    }
      function rent_now_pay_later()
    {
        return view('user.rent-now-pay-later');
    }
      function terms()
    {
        return view('user.rent-now-pay-later');
    }

    function testimonial(Request $request)
    {
        $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();
       // return $data;
        $rules=[
        'user_name' => 'required',
        'user_email' => 'required',
        'message' => 'required',
        'rating' => 'required',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $success = false;
        $message = $validator->errors();
        }else{
            $data = $request->all();
            $contact = new Testimonal();
            $contact->user_id = auth()->user()->user_id;
            $contact->user_name = $data['user_name'];
            $contact->user_email = $data['user_email'];
            $contact->message = $data['message'];
            $contact->rating= $data['rating'];
            $contact->status= 0;
            $contact->deleted_status= 0;
            $contact->save();
            return back()->with('message', 'Testimonial Submitted Successfully ');
        }
        return back()->with('error', 'Something Went Wrong ');
    }
    public function users_testimonilas()
    {
        $bookmark = Testimonal::where('user_id',auth()->user()->user_id)->where('deleted_status',0)->latest()->get();
    return view('user.testimonilas',compact('bookmark'));
    }
        public function users_testimonilas_edit(Request $request, $id)
    {
        $application_details = Testimonal::where('id', $id)
            ->where('user_id', Auth::guard('web')->user()->user_id)
            ->first();
        // Initialize response variables
        $response_code = 200;
        $message = [];
        $success = false;
        $data = $request->all();
        if ($request->isMethod('post')) {
            // Validation rules
            $rules = [
                'user_name' => 'required',
                'user_email' => 'required|email', // Added email validation
                'message' => 'required',
               
            ];
            // Create a validator instance
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                // Validation failed, set error message
                $message['error'] = $validator->errors()->all();
            } else {
                // Validation passed, update application details
                if(!empty($data['rating']))
                {
                    $rating=$data['rating'];
                }
                else
                {
                    $rating= Testimonal::where('id', $id)
            ->where('user_id', Auth::guard('web')->user()->user_id)
            ->pluck('rating')->first();
    
                }
                $update_arr = [
                    "user_name" => $data['user_name'], // Use array access instead of ->input()
                    "user_email" => $data['user_email'], // Use array access instead of ->input()
                    "status" => 0,
                    "message" => $data['message'], // Use array access instead of ->input()
                    "rating" => $rating, // Use array access instead of ->input()
                    "updated_at" => now(),
                ];
                // Update the application details
                Testimonal::where("user_id", Auth::guard('web')->user()->user_id)
                    ->where('id', $id)
                    ->update($update_arr);
                // Set success message
                $message['success'] = ['Testimonial Successfully Updated.'];
                $success = true;
            }
        }
        return view('user.edit-testimonilas', compact('application_details', 'success', 'message'));
    }
    
    public function users_delete_testimonilas(Request $request, $id)
    {
        try {
            $testimonial = Testimonal::where("user_id", Auth::guard('web')->user()->user_id)
                ->where('id', $id)
                ->first();
            if (!$testimonial) {
                return back()->with('error', 'Testimonial not found.');
            }
            $testimonial->deleted_status = 1;
            $testimonial->save();
            return back()->with('message', 'Testimonial Deleted Successfully');
        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
    
    
    function reviews(Request $request, $id)
        {
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
           // return $data;
            $rules=[
          
            'user_name' => 'required',
            'user_email' => 'required',
            'message' => 'required',
            'rating' => 'required',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                $success = false;
            $message = $validator->errors();
            }else{
                $data = $request->all();
                $contact = new Reviews();
                $contact->property_id = $id;
                $contact->user_id = auth()->user()->user_id;
                $contact->user_name = $data['user_name'];
                $contact->user_email = $data['user_email'];
                $contact->message = $data['message'];
                $contact->rating= $data['rating'];
                $contact->date= now();
                $contact->status= 0;
                $contact->deleted_status= 0;
                $contact->save();
                return back()->with('message', 'Review Submitted Successfully ');
            }
            return back()->with('error', 'Something Went Wrong ');
        }
    public function users_reviews()
        {
            $bookmark = Reviews::where('user_id',auth()->user()->user_id)->where('deleted_status',0)->latest()->get();
        return view('user.reviews',compact('bookmark'));
        }
        public function users_reviews_edit(Request $request, $id)
    {
        $application_details = Reviews::where('id', $id)
            ->where('user_id', Auth::guard('web')->user()->user_id)
            ->first();
        // Initialize response variables
        $response_code = 200;
        $message = [];
        $success = false;
        $data = $request->all();
        if ($request->isMethod('post')) {
            // Validation rules
            $rules = [
                'user_name' => 'required',
                'user_email' => 'required|email', // Added email validation
                'message' => 'required',
                
            ];
            // Create a validator instance
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                // Validation failed, set error message
                $message['error'] = $validator->errors()->all();
            } else {
    
                if(!empty($data['rating']))
                {
                     $rating=$data['rating'];
    
                }
                else
                {
                    $rating=Reviews::where('id', $id)
            ->where('user_id', Auth::guard('web')->user()->user_id)->pluck('rating')->first();
                }
                // Validation passed, update application details
                $update_arr = [
                    "user_name" => $data['user_name'], // Use array access instead of ->input()
                    "user_email" => $data['user_email'], // Use array access instead of ->input()
                    "status" => 0,
                    "message" => $data['message'], // Use array access instead of ->input()
                    "rating" =>$rating , // Use array access instead of ->input()
                    "updated_at" => now(),
                ];
                // Update the application details
                Reviews::where("user_id", Auth::guard('web')->user()->user_id)
                    ->where('id', $id)
                    ->update($update_arr);
                // Set success message
                $message['success'] = ['Review Successfully Updated.'];
                $success = true;
            }
        }
        return view('user.edit-reviews', compact('application_details', 'success', 'message'));
    }
    public function users_delete_reviews(Request $request, $id)
    {
        try {
            $testimonial = Reviews::where("user_id", Auth::guard('web')->user()->user_id)
                ->where('id', $id)
                ->first();
            if (!$testimonial) {
                return back()->with('error', 'Review not found.');
            }
            $testimonial->deleted_status = 1;
            $testimonial->save();
            return back()->with('message', 'Review Deleted Successfully');
        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function like_review(Request $request, $property_id, $user_id, $review_id)
    {
        $existingLike = LikeReview::where('user_id', $user_id)
        ->where('property_id', $property_id)->where('review_id', $review_id)
        ->count();
        if(!empty($existingLike))
        {
            return back()->with('error', 'You have already liked this review.');
        }
        else {
        // if ($existingLike) {
        //     return back()->with('error', 'You have already liked this review.');
        // }
        // If the combination doesn't exist, proceed with liking
        $response_code = 200;
        $message = ['error' => ['Something went wrong']];
        $success = false;
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $success = false;
            $message = $validator->errors();
        } else {
            $data = $request->all();
            $contact = new LikeReview();
            $contact->review_id = $review_id;
            $contact->property_id = $property_id;
            $contact->user_id = $user_id;
            $contact->date = now();
            $contact->save();
            return back()->with('message', 'Review Liked Successfully');
        }
    }
        return back()->with('error', 'Something Went Wrong');
    }
    
    
    public function update_users_password(Request $request)
    {
             // Validate the request
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|min:8', // Example: Minimum 8 characters
            'cpassword' => 'required|same:newpassword',
        ]);
    
        // Check if the current password is correct
        if (!Hash::check($request->currentpassword, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Current Password Is Incorrect.');
        }
    
        // Update the user's password
        auth()->user()->update([
            'password' => Hash::make($request->newpassword),
        ]);
    
        return redirect()->back()->with('message', 'Password Changed Successfully.');
    }

















    
}
