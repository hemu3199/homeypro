<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property_rent;
use App\Models\Property_sale;
use App\Models\User;
use App\Models\AddAgent;
use DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
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

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

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

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
