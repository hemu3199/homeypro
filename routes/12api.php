<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApi;
use App\Http\Controllers\UserAPILoginAndRegister;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Register and login Routes

Route::controller(UserAPILoginAndRegister::class)->group(function()
{
    Route::post('UserAPILogin','UserAPILogin');
    Route::Post('apiregister','apiregister');
});

// Route::get('agentlist','PropertyController@agentlist')->name('agentlist');
// Route::get('projects_total_list','ProjectController@projects_total_list')->name('projects_total_list');

// Route::get("data",[UserApi::class,'getdata']);

// After login Routes
Route::middleware('auth:sanctum')->group(function(){
 
    Route::post('userapilogout',[UserAPILoginAndRegister::class,'userapilogout']); 
    // Basic Routes
    Route::get("dashboard",[UserApi::class,'dashboard']);
    Route::get("property-list",[UserApi::class,'property_list']);
    Route::get("featured-properties-list",[UserApi::class,'featured_properties_list']);
    Route::get('/users-property-rent-details-api/{id}', 'UserApi@users_property_rent_details_api');
    Route::post('/compare-properties/{id}',[UserApi::class,'compare_properties']);
    Route::post('/bookmark-property/{id}',[UserApi::class,'bookmark_property']);

    // show intrest Api

    Route::post('/show-intrest/{id}',[UserApi::class,'show_intrest']);
    Route::post('/user-contact-us/{id}',[UserApi::class,'user_contact_us']);
    Route::post('user-profile',[UserApi::class,'user_profile']);
    Route::get('user-profile-details',[UserApi::class,'user_profile_details']);

    // Compare property list 
    Route::get('/compare_list',[UserApi::class,'compare_list']);

    // Route::get('/compare_property_delete',[UserApi::class,'compare_property_delete']);


   Route::delete('/compare-delete/{id}', [UserApi::class, 'removecompare']);

   //delete bookmark
   Route::delete('/delete-bookmarked-property/{id}',[UserApi::class,'delete_bookmarkd_property']);

   // delete intrested property
   Route::delete('/delete-intrested-property/{id}',[UserApi::class,'delete_intrested_property']);
   // show intrest for the property
   //active in active



   
    // user dashboard Routes
    Route::get('user-dashboard',[UserApi::class,'user_dashboard']);
    Route::get('user-added-properties',[UserApi::class,'user_added_properties']);
    Route::get('user-bookmarked-properties',[UserApi::class,'user_bookmarked_properties']);
    Route::get('user-application-responses',[UserApi::class,'user_application_responses']);
    Route::get('user-intrested-properties',[UserApi::class,'user_intrested_properties']);

    // Property List

     Route::post('/addproperties', 'UserApi@addProperty');
    Route::put('updateproperties/{id}', [UserApi::class, 'updateProperty']);
    Route::delete('deleteimages/{id}', [UserApi::class, 'deleteimages']);
    Route::delete('deleteroomimages/{id}', [UserApi::class, 'deleteroomimages']);
    Route::delete('deletehouseimages/{id}', [UserApi::class, 'deletehouseimages']);
    Route::delete('deletehousesection/{id}', [UserApi::class, 'deletehousesection']);
    Route::delete('deleteroomsection/{id}', [UserApi::class, 'deleteroomsection']);
    Route::delete('deleteproperty/{id}', [UserApi::class, 'deleteproperty']);
    Route::get('/editpropertydetails/{id}','UserApi@edit_properties');
    

    // Owner dashboard Routes
    Route::get('owner-dashboard',[UserApi::class,'owner_dashboard']);
    Route::get('owner-intrested-properties',[UserApi::class,'owner_intrested_properties']);
    Route::get('owner-application-responses',[UserApi::class,'owner_application_responses']);
    Route::get('owner-aggrement-details',[UserApi::class,'owner_aggrement_details']);





});




// Route::post('apiregister', [UserAPILoginAndRegister::class, 'apiregister']);







