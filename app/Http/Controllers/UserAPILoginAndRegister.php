<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
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
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class UserAPILoginAndRegister extends Controller
{
  
  public function apiregister(Request $request)
{
    $data = $request->all();
    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required'],
    ];
    $validator = Validator::make($data, $rules);
    if ($validator->fails()) {
        $response = [
            'success' => false,
            'message' => $validator->errors()
        ];
        return response()->json($response, 400);
    }

    $code = User::orderBy('id', 'desc')->first();
    if ($code == null) {
        $id = "HOMEYU" . 1;
    } else {
        $id = "HOMEYU" . ($code->id + 1);
    }

    $user = User::create([
       
        'user_id' => $id,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $success['name'] = $user;
   // $success['token'] = $user->createToken(env("APP_KEY") ?? 'y' . 'gennie_del')->accessToken;
   $success['token'] = $user->createToken('Laravel')->plainTextToken;
    $response = [
        'success' => true,
        'data' => $success,
        'message' => 'User Registered success'
    ];
    return response()->json($response, 200);
}

public function UserAPILogin(Request $request)
{

 $request->validate([
        'email' => 'required|email',
        'password' => 'required',
       
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
      $success['name'] = $user;
   // $success['token'] = $user->createToken(env("APP_KEY") ?? 'y' . 'gennie_del')->accessToken;
   $success['token'] = $user->createToken('Laravel')->plainTextToken;
    $response = [
        'success' => true,
        'data' => $success,
        'message' => 'User Login success'
    ];
    return response()->json($response, 200);
}

function userapilogout(Request $request)
{
    $user= $request->user();
    $user->tokens()->delete();

    return response()->noContent();
   
}

    public function loginWithGoogle(Request $request)
    {
        try {
            return Socialite::driver('apigoogle')->stateless()->redirect();
        } catch (Exception $e) {
            // Handle exceptions
        }
    }

    public function callbackfromgoogle(Request $request)
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $is_user = User::where('email', $user->getEmail())->first();

            if (!$is_user) {
                // Generate a user_id (you may implement your own logic here)
                $id = "HOMEYU" . User::orderBy('id', 'desc')->value('id') + 1;

                $saveUser = User::updateOrCreate(
                    [
                        'google_id' => $user->getId()
                    ],
                    [
                        'user_id' => $id,
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'password' => Hash::make($user->getName() . '@' . $user->getId())
                    ]
                );
            } else {
                $saveUser = User::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }

            event(new Registered($saveUser));

            Auth::login($saveUser);

            // Add any additional logic here

            return response()->json(['message' => 'Logged in successfully']);
        } catch (Exception $e) {
            // Handle exceptions
            return response()->json(['message' => 'Error occurred while logging in'], 500);
        }
    }


}
