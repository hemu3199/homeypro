<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;
use App\Models\User;
use Validator;
use Auth,DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('users.auth.login');
    }

    public function login(Request $request){
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // login code 
        
        if(\Auth::attempt($request->only('email','password'))){
            return view('users.index');
        }

        return redirect('login')->withError('Login details are not valid');

    }

    public function register_view()
    {
        return view('users.auth.register');
    }

    public function register(Request $request){
        // validate 
        $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users|email',
            'password'=>'required|confirmed'
        ]);
         
        // save in users table 
        
        User::create([
            
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> \Hash::make($request->password)
        ]);

        // login user here 
        
        if(\Auth::attempt($request->only('email','password'))){
            return view('users.index');
        }

        return redirect('register')->withError('Error');


    }


     public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('');
    }

    
}
