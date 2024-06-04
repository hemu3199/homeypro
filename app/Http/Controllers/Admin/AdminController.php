<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\AdminDetails;
use App\Models\Admin;
use Validator,Auth,DB;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }

    public function authorize($ability, $arguments = []){
        if(\Auth::guard('admin')->check()){
            \Auth::shouldUse('admin');
        }

        $this->baseAuthorize($ability, $arguments);
    }

    public function view_profile()
    {
        $profile_details = AdminDetails::where('admin_id','=',Auth::guard('admin')->user()->id )->first();
        return view('admin.admin_view_profile',compact('profile_details'));
    }
    public function edit_admin_profile(Request $request)
    {
        $profile_details = AdminDetails::where('admin_id','=', Auth::guard('admin')->user()->id)->first();
        if($request->isMethod('post'))
        {
            try{
                $data = $request->all();

                        if ($request->hasFile('profile_image')) 
            {
                                       $imageName = time() . '_' . $request->file('profile_image')->getClientOriginalName();
                $path = $request->file('profile_image')->move('uploads/admins/', $imageName);
                                    $admin_details=DB::table('admin_basic_information')->where('admin_id','=', Auth::guard('admin')->user()->id)->first();
                                      $path = public_path('uploads/admins/'.$admin_details->profile_image);
                                            @unlink($path);
            } 
            else 
            {

                                    $admin_details =DB::table('admin_basic_information')->where('admin_id','=', Auth::guard('admin')->user()->id)->first();   
                                      $imageName = $admin_details->profile_image;
             }
                if ($request->hasFile('background_image')) 
            {
                                       $imageNames = time() . '_' . $request->file('background_image')->getClientOriginalName();
                $path = $request->file('background_image')->move('uploads/admins/', $imageNames);
                                    $admin_details=DB::table('admin_basic_information')->where('admin_id','=', Auth::guard('admin')->user()->id)->first();
                                      $path = public_path('uploads/admins/'.$admin_details->background_image);
                                            @unlink($path);
            } 
            else 
            {
                
                                    $admin_details =DB::table('admin_basic_information')->where('admin_id','=', Auth::guard('admin')->user()->id)->first();   
                                      $imageNames = $admin_details->background_image;
             }

             

               

                $adminId = Auth::guard('admin')->user()->id;
                    

                $update_arr = array(
                    //'admin_id' => $adminId,
                    'user_name' => $data['user_name'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'company_phoneno' => $data['company_phoneno'],
                    'phoneno' => $data['phoneno'],
                    'gender' => $data['gender'],
                    'date_of_birth' => $data['date_of_birth'],
                    'description' => $data['description'],
                    'country' => $data['country'],
                    'state' => $data['state'],
                    'profile_image' =>  $imageName,
                    'background_image' =>  $imageNames,
                );
                $update_admin = array(
                    'name' => $data['user_name'],
                    'email' => $data['email'],
                );
                $affectedRows = AdminDetails::where("admin_id",Auth::guard('admin')->user()->id )->update($update_arr);
                $affectedRows = Admin::where("id",Auth::guard('admin')->user()->id )->update($update_admin);
                  return redirect('admin/viewprofile')->with('message', 'Profile Updated successfully!!');

            }
            catch (\Exception $e) {
                // Handle the exception and display the error message
                return back()->with('error', 'An error occurred: ' . $e->getMessage());
            }
        }
        return view('admin.edit_view_profile',compact('profile_details'));
    }
    public function addd_admin_profile()
    {
        $profile_details = AdminDetails::where('admin_id','=',Auth::guard('admin')->user()->admin_id )->first();
        return view('admin.edit_view_profile',compact('profile_details'));
    }
    function update_admin_profile(Request $request)
    {
    $response_code = 200;
    $message = array('error' => array('something went wrong'));
    $success = false;
    $data = $request->all();

    $rules = [
        // Define your validation rules here
    ];

    $validator = Validator::make($data, $rules);

    if ($validator->fails()) {
        $success = false;
        $message = $validator->errors();
    } else {
        if(!empty($request->profile_image))
        {
             $imageName = time() . '_' . $request->file('profile_image')->getClientOriginalName();
        $path = $request->file('profile_image')->move('uploads/admins/', $imageName);

        }
        else
        {
            $imageName='-';
        }
        if(!empty($request->background_image))
        {
             $imageNames = time() . '_' . $request->file('background_image')->getClientOriginalName();
        $path = $request->file('background_image')->move('uploads/admins/', $imageNames);

        }
        else
        {
            $imageNames="-";
        }
       

       

        $adminId = Auth::guard('admin')->user()->id;

        $adminDetails = [
            'admin_id' => $adminId,
            'user_name' => $data['user_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'company_phoneno' => $data['company_phoneno'],
            'phoneno' => $data['phoneno'],
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'description' => $data['description'],
            'country' => $data['country'],
            'state' => $data['state'],
            'profile_image' => $imageName,
            'background_image' =>  $imageNames,
        ];

        if (AdminDetails::create($adminDetails)) {
            $success = true;
            $message = array(
                "success" => array(
                    "Admin Details Updated successfully."
                )
            );
        } else {
            $success = false;
            $message = array(
                "error" => array(
                    "Unable To Update Admin Details"
                )
            );
        }
    }

    return redirect('admin/viewprofile')->with('message', 'Profile Updated successfully!!');
}

}
