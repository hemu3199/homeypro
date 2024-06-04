<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
use Validator,Auth,DB;
use App\Models\Application;
use App\Models\Agreement;
use App\Facades\ResponseHelper;
use App\Models\Homeyproperties;


class AgreementController extends Controller
{
	 function agreement()
    {
    	$agreement= Agreement::where('member_id','like','HOMEYU%' )->paginate(10);
        return view('admin.agreement',compact('agreement'));
    }

    function agentagreement()
    {
    	$agreement= Agreement::where('member_id','like','HOMEYAG%' )->paginate(10);
        return view('admin.agentagreement',compact('agreement'));
    }


    function sendagreement(Request $request)
    {

                        
                        $data = $request->all();
                        $rules=[
                         'user'=>'required',
                         'file' => 'required',
    							];
                         $validator = Validator::make($data,$rules);
                         if($validator->fails()){
                          return back()->withErrors($validator)->withInput();;
                         }
                         else
                         {
                          if(!empty($data['user'] && $data['property']))
                                    {
                                         $verify =DB::table('homeyproperties')->where(['user_id' => $data['user']])->where('property_id','=',$data['property'])->pluck('user_id')->first();
                                            if(!empty($verify))
                                            {
                                                if($request->file('file') != '')
                                                     {
                                                     $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                                     $request->file('file')->move('uploads/agreement/', $file); 
                                                     }
                                                     else{
                                                     $file = "-";
                                                     }
                                                     $agreement = new Agreement();
                                                     $agreement->member_id = $data['user'];
                                                     $agreement->property_id = $data['property'];
                                                     $agreement->file = $file;
                                                     $agreement->save();
                                                        return back()->with('message', 'Agreement Sent successfully!!');


                                            }
                                            else
                                            {
                                                  return back()->with('error', 'Enter correct details...!');


                                            }



                                    }
                                    else
                                    {

                                        $user =DB::table('users')->where(['user_id' => $data['user']])->pluck('user_id')->first();
                                        if(!empty($user))
                                        {
                                              if($request->file('file') != '')
                                                     {
                                                     $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                                     $request->file('file')->move('uploads/agreement/', $file); 
                                                     }
                                                     else{
                                                     $file = "-";
                                                     }
                                                     $agreement = new Agreement();
                                                     $agreement->member_id = $data['user'];
                                                     $agreement->property_id = $data['property'];
                                                     $agreement->file = $file;
                                                     $agreement->save();
                                                        return back()->with('message', 'Agreement Sent successfully!!');

                                        }
                                        else
                                        {
                                             return back()->with('error', 'Enter correct user_id...!');

                                        }

                            }
                         	
                         }
    }
    function sendagentagreement(Request $request)
    {

                        
                        $data = $request->all();
                        $rules=[
                         'user'=>'required',
                         'file' => 'required',
                                ];
                         $validator = Validator::make($data,$rules);
                         if($validator->fails()){
                          return back()->withErrors($validator)->withInput();;
                         }
                         else
                         {
                          if(!empty($data['user'] && $data['property']))
                                    {
                                        $agent = DB::table('homeyproperties')->where(['agent_id' => $data['user']])->where('property_id','=',$data['property'])->pluck('agent_id')->first();
                                            if(!empty($agent))
                                            {
                                                if($request->file('file') != '')
                                                     {
                                                     $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                                     $request->file('file')->move('uploads/agreement/', $file); 
                                                     }
                                                     else{
                                                     $file = "-";
                                                     }
                                                     $agreement = new Agreement();
                                                     $agreement->member_id = $data['user'];
                                                     $agreement->property_id = $data['property'];
                                                     $agreement->file = $file;
                                                     $agreement->save();
                                                        return back()->with('message', 'Agreement Sent successfully!!');


                                            }
                                            else
                                            {
                                                  return back()->with('error', 'Enter correct details...!');


                                            }



                                    }
                        else
                        {

                                $agent = DB::table('agents')->where(['agent_id' => $data['user']])->pluck('agent_id')->first();
                                if(!empty($agent))
                                {
                                      if($request->file('file') != '')
                                             {
                                             $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                             $request->file('file')->move('uploads/agreement/', $file); 
                                             }
                                             else{
                                             $file = "-";
                                             }
                                             $agreement = new Agreement();
                                             $agreement->member_id = $data['user'];
                                             $agreement->property_id = $data['property'];
                                             $agreement->file = $file;
                                             $agreement->save();
                                                return back()->with('message', 'Agreement Sent successfully!!');

                                }
                                else
                                {
                                     return back()->with('error', 'Enter correct agent_id...!');

                                }

                        }
                            
                         }
    }

     public function delete_user_agreement(Request $request,$id)
    {
        try {
            $agreement=Agreement::where('id',$id)->first();
           $path = public_path('uploads/agreement/'.$agreement->file);
            @unlink($path);
            $delete_user_agreements=Agreement::where('id',$id)->delete();
            return back()->with('message','Agreement delete successfully');
            
        } 
        catch (Exception $e)
         {
            
        }
    
    }

    public function edit_agent_agreement(Request $request,$id)
    {
        $agreement=Agreement::where('id',$id)->first();
          if($request->isMethod('post'))
                {
                    //DD($request->all());
                      $data = $request->all();
                  try{
                       if(!empty($data['user'] && $data['property']))
                           { 
                            $agent = DB::table('homeyproperties')->where(['agent_id' => $data['user']])->where('property_id','=',$data['property'])->pluck('agent_id')->first();
                                if(!empty($agent))
                                {
                                    if ($request->hasFile('file'))
                                    {
                                                $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                             $request->file('file')->move('uploads/agreement/', $file); 
                                        $agreement_file=Agreement:: where('id','=',$id)->first();
                                          $path = public_path('uploads/agreement/'.$agreement_file->file);
                                                @unlink($path);
                                    }
                                    else
                                    {
                                               $agreement_file=Agreement:: where('id','=',$id)->first();
                                                      $file = $agreement_file->file;
                                     }


                                             $update_array = array
                                  (
                                    "member_id" => $data['user'],
                                    "property_id" => $data['property'],
                                    "file"=>$file,
                                   
                                        
                                        
                                    );
                                     
                                     $affectedRows = Agreement::where('id',$id)->update($update_array);
                                         return redirect('admin/agentagreement')->with('message', 'Agreement updated successfully!!');
                                   
                                }
                                else
                                {
                                      return back()->with('error', 'Enter correct details...!');
                                }
                            }
                        else
                        {
                            $agent = DB::table('agents')->where(['agent_id' => $data['user']])->pluck('agent_id')->first();
                                if(!empty($agent))
                                {
                                      if ($request->hasFile('file'))
                                    {
                                                $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                             $request->file('file')->move('uploads/agreement/', $file); 
                                        $agreement_file=Agreement:: where('id','=',$id)->first();
                                          $path = public_path('uploads/agreement/'.$agreement_file->file);
                                                @unlink($path);
                                    }
                                    else
                                    {
                                               $agreement_file=Agreement:: where('id','=',$id)->first();
                                                      $file = $agreement_file->file;
                                     }
                                        $update_array = array
                                  (
                                    "member_id" => $data['user'],
                                    "property_id" => $data['property'],
                                    "file"=>$file,
                                   
                                        
                                        
                                    );
                                     
                                     $affectedRows = Agreement::where('id',$id)->update($update_array);
                                          return redirect('admin/agentagreement')->with('message', 'Agreement updated successfully!!');
                                   

                                }
                                else
                                {
                                     return back()->with('error', 'Enter correct agent_id...!');

                                }
                        }
                    


                    }

                   catch (\Exception $e) {
                              // Handle the exception and display the error message
                              return back()->with('error', 'An error occurred: ' . $e->getMessage());
                          }
                         


                  }

        return view('admin.agentagreementedit',compact('agreement'));
    }
     

     public function edit_user_agreement(Request $request,$id)
    {
        $agreement=Agreement::where('id',$id)->first();
          if($request->isMethod('post'))
                {
                    //DD($request->all());
                      $data = $request->all();
                  try{
                        if(!empty($data['user'] && $data['property']))
                                    {
                                         $verify =DB::table('homeyproperties')->where(['user_id' => $data['user']])->where('property_id','=',$data['property'])->pluck('user_id')->first();
                                            if(!empty($verify))
                                            {
                                                     if ($request->hasFile('file'))
                                                    {
                                                                $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                                             $request->file('file')->move('uploads/agreement/', $file); 
                                                        $agreement_file=Agreement:: where('id','=',$id)->first();
                                                          $path = public_path('uploads/agreement/'.$agreement_file->file);
                                                                @unlink($path);
                                                    }
                                                    else
                                                    {
                                                               $agreement_file=Agreement:: where('id','=',$id)->first();
                                                                      $file = $agreement_file->file;
                                                     }


                                                             $update_array = array
                                                  (
                                                    "member_id" => $data['user'],
                                                    "property_id" => $data['property'],
                                                    "file"=>$file,
                                                   
                                                        
                                                        
                                                    );
                                                     
                                                     $affectedRows = Agreement::where('id',$id)->update($update_array);
                                                        return redirect('admin/agreement')->with('message', 'Agreement Updated successfully!!');


                                            }
                                            else
                                            {
                                                  return back()->with('error', 'Enter correct details...!');


                                            }



                                    }
                                    else
                                    {

                                        $user =DB::table('users')->where(['user_id' => $data['user']])->pluck('user_id')->first();
                                        if(!empty($user))
                                        {
                                               if ($request->hasFile('file'))
                                            {
                                                        $file = time() .'_'.$request->file('file')->getClientOriginalName();
                                                     $request->file('file')->move('uploads/agreement/', $file); 
                                                $agreement_file=Agreement:: where('id','=',$id)->first();
                                                  $path = public_path('uploads/agreement/'.$agreement_file->file);
                                                        @unlink($path);
                                            }
                                            else
                                            {
                                                       $agreement_file=Agreement:: where('id','=',$id)->first();
                                                              $file = $agreement_file->file;
                                             }


                                                     $update_array = array
                                          (
                                            "member_id" => $data['user'],
                                            "property_id" => $data['property'],
                                            "file"=>$file,
                                           
                                                
                                                
                                            );
                                             
                                             $affectedRows = Agreement::where('id',$id)->update($update_array);
                                                        return redirect('admin/agreement')->with('message', 'Agreement Updated successfully!!');

                                        }
                                        else
                                        {
                                             return back()->with('error', 'Enter correct user_id...!');

                                        }

                            }
                    


                    }

                   catch (\Exception $e) {
                              // Handle the exception and display the error message
                              return back()->with('error', 'An error occurred: ' . $e->getMessage());
                          }
                         


                  }

        return view('admin.editagreement',compact('agreement'));
    }

}
