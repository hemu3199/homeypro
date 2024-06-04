<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Validator,Auth,DB;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;
use App\Models\User;
use App\Models\InterstedProperty;
use App\Models\Property_sale;
use App\Models\Contactus;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\BookMarkProperty;
use App\Models\Homeyproperties;
use App\Models\Compare;


class CompareController extends Controller
{
	
    // function compareadd(Request $request,$id){
    //     //dd($request->all());
      
    //         $data = $request->all();
    //          $insert_array = array(
    //                 "user_id" =>Auth::guard('web')->user()->user_id,
    //                 "property_id"=>$id,
	// 				);
    //             DB::table('compare')->insert($insert_array);
    //             $success = true;
    //             $message = array('success'=>array('User Details Added successfull'));
    //     return back()->with('message', 'Details added successfully!!');

    // }
     function compareadd(Request $request,$id)
    {
        //dd($request->all());
      
            $data = $request->all();
             $insert_array = array(
                    "user_id" =>Auth::guard('web')->user()->user_id,
                    "property_id"=>$id,
					);
                DB::table('compare')->insert($insert_array);
                $success = true;
                $message = array('success'=>array('User Details Added successfull'));
        return back()->with('message', 'Compare Added Successfully!!');
    }
    public function compare(Request $request)
    {
        $compare = Compare::select('property_id')->where('user_id',Auth::guard('web')->user()->user_id)->get();
        return view('user.compare',compact('compare'));
    }
      function removecompare(Request $request,$id)
    {
        //dd($request->all());
      
            $data = $request->all();
                DB::table('compare')->where('user_id',Auth::guard('web')->user()->user_id)->where('property_id',$id)->delete();
                $success = true;
                $message = array('success'=>array('Compare Deleted successfully..!!'));
        return back()->with('message', 'Compare Deleted Successfully!!');
    }















}