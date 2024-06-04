<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Property_rent;
use App\Models\InterstedProperty;
use App\Models\User;
use Validator;
use Auth,DB;
use App\Facades\ResponseHelper;
use App\Models\Homeyproperties;



class InterstedPropertyController extends Controller
{


function InterstedProperty(Request $request,$id)
    {
        
       //  $response_code = 200 ;
       //  $success = false ;
       //  $data = $request->all();
       //  $message = array('error'=>array('Something went wrong...'));
       //  $result = [];
       //  $rules = [
           
       //  ];
       //  $validator = Validator::make($data,$rules);
       //  if($validator->fails()){
       //      $success = false;
       //      $message = $validator->errors();
       // }else{
        try
        {
            //dd($request->all());
            $property = InterstedProperty::get();
          $verify=Homeyproperties::where('property_id','=',$id)->first();
          if(!empty($verify->user_id))
          {
            $vid=$verify->user_id;
          }
           elseif(!empty($verify->agent_id))
          {
            $vid=$verify->agent_id;
          }
          else
          {
            $vid='Admin';
          }

        $apply = new InterstedProperty();
        $apply->property_id = $id;
        $apply->user_id = Auth::guard('web')->user()->user_id;
        $apply->agent_id = $vid;
        // $apply->property_type = Homeyproperties::where('id','=',$id)->pluck('property_type')->first();
        $apply->status = 'Intersted';
        $apply->save();
        return back()->with('message', 'Interest Submitted successfully!!');

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
       
        
    }

       
    // }
    
}