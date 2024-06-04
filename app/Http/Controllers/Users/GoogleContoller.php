<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Laravel\Socialite\Facades\Socialite;
use Validator,DB;
use App\Facades\ResponseHelper;
use App\Models\InterstedProperty;
use App\Models\Projects;
use App\Models\Property_sale;
use App\Models\Contactus;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\BookMarkProperty;
use App\Models\AddAgent;

/**
 * 
 */
class GoogleContoller extends Controller
{
	
	function loginwithgoogle()
	{
		return Socialite::driver('google')->redirect();
	}



	function callbackfromgoogle()
	{
		try {

			$user = Socialite::driver('google')->user();
			$is_user = User::where('email',$user->getEmail())->first();
			if(!$is_user)
			{
			$code = User::orderBy('id', 'desc')->first();
                if($code == null){
                 $id = "HOMEYU".+1;
                }else{
                 $id = "HOMEYU".$code->id+1;
                }
				$saveUser = User::updateOrCreate(
					[
					'google_id' => $user->getId()
				],

				[

					'user_id' => $id,
					'name' => $user->getName(),
					'email' => $user->getEmail(),
					'password' => Hash::make($user->getName().'@'.$user->getId())
				]);

			}
			else{
				$saveUser = User::where('email',$user->getEmail())->update([
					'google_id' => $user->getId(),
				]);
				$saveUser = User::where('email',$user->getEmail())->first();

			}
			
			  event(new Registered($saveUser));

        Auth::login($saveUser);


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
			 

			
		} catch (Exception $e) {
			
		}

	}
}