<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Validator,DB;
use App\Facades\ResponseHelper;
use App\Models\InterstedProperty;
use App\Models\Property_rent;
use App\Models\Projects;

use App\Models\Property_sale;
use App\Models\Contactus;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\BookMarkProperty;
use App\Models\AddAgent;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            '_token' =>['required'],
        ]);
       
        $code = User::orderBy('id', 'desc')->first();
                if($code == null){
                 $id = "HOMEYU".+1;
                }else{
                 $id = "HOMEYU".$code->id+1;
                }


        $user = User::create([
           // dd($request->all()),
            'token' =>$request->_token,
            'user_id'=>$id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
           
        ]);

        event(new Registered($user));

        Auth::login($user);

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
}
