<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Users\CompareController;
use App\Http\Controllers\Users\AddnewlistPropertyController;
use App\Http\Controllers\Users\OwnerController;
use App\Http\Controllers\Users\GoogleContoller;
use App\Http\Controllers\Users\SearchController;
use App\Http\Controllers\Users\ListingResponsesController;
use App\Http\Controllers\Users\PropertiesController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\PropertyrentController;
use App\Http\Controllers\Agent\PropertysaleController;
use App\Http\Controllers\Users\InterstedPropertyController;
use App\Http\Controllers\Agent\ProjectController;
use App\Http\Controllers\Agent\BgController;
use App\Http\Controllers\NewsletterController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('users.index');
});


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';





Route::get('auth/google',[GoogleContoller::class,'loginwithgoogle'])->name('login_with_google');
Route::any('auth/google/callback',[GoogleContoller::class,'callbackfromgoogle'])->name('callback');
 Route::match(['get','post'],'/updatepassword/{id?}', [UsersController::class, 'updatepassword'])->name('updatepassword');



Route::get('/', [UsersController::class, 'users_dashboard'])->name('users-dashboard');
Route::get('/explore', [UsersController::class, 'explore'])->name('explore');
// Route::get('/homeinsurance',[UsersController::class,'']);
Route::get('/homeinsurance', [UsersController::class, 'homeinsurance'])->name('homeinsurance');
Route::get('/line-of-credit', [UsersController::class, 'line_of_credit'])->name('line-of-credit');
Route::get('/rent-now-pay-later', [UsersController::class, 'rent_now_pay_later'])->name('rent-now-pay-later');
Route::get('/listing', [UsersController::class, 'listing'])->name('listing');
Route::get('/dashboard/{id?}', [UsersController::class, 'dashboard'])->name('dashboard');
Route::get('/ownerdashboard/{id?}', [OwnerController::class, 'ownerdashboard'])->name('ownerdashboard');
Route::get('intrested_users_list', [OwnerController::class, 'intrested_users_list'])->name('intrested_users_list');
Route::get('ownerproperties_list', [OwnerController::class, 'ownerproperties_list'])->name('ownerproperties_list');
Route::get('ownersapplication', [OwnerController::class, 'ownersapplication'])->name('ownersapplication');
Route::get('usersagreement',[OwnerController::class, 'usersagreement'])->name('usersagreement');


Route::get('users-application', [UsersController::class, 'users_application'])->name('users-application');
Route::get('users-intersted-property', [UsersController::class, 'users_intersted_property'])->name('users-intersted-property');
Route::get('/users-intersted-property-details/{property_id?}', [UsersController::class, 'users_intersted_property_details'])->name('users-intersted-property-details');
Route::any('users-profile-setting-edit', [UsersController::class, 'users_profile_setting_edit'])->name('users-profile-setting-edit');
Route::get('users-profile-setting-view', [UsersController::class, 'users_profile_setting_view'])->name('users-profile-setting-view');
 Route::get('privacy', [UsersController::class, 'privacy'])->name('privacy');

Route::any('users-profile-setting-update', [UsersController::class, 'users_profile_setting_update'])->name('users-profile-setting-update');
Route::get('users-profile-setting', [UsersController::class, 'users_profile_setting'])->name('users-profile-setting');
Route::post('users-profile-add', [UsersController::class, 'users_profile_add'])->name('users-profile-add');
Route::any('/users-view-application/{id?}', [UsersController::class, 'users_view_application'])->name('users-view-application');
Route::any('/users-edit-application/{id?}', [UsersController::class, 'users_edit_application'])->name('users-edit-application');

Route::any('users-application-update', [UsersController::class, 'users_application_update'])->name('users-application-update');
Route::any('/users-delete-application/{id?}', [UsersController::class, 'users_delete_application'])->name('users-delete-application');
Route::get('users-bookmark-property', [UsersController::class, 'users_bookmark_property'])->name('users-bookmark-property');
Route::get('/users-bookmark-property-details/{property_id?}', [UsersController::class, 'users_bookmark_property_details'])->name('users-bookmark-property-details');
Route::any('agentlisting',[UsersController::class, 'agentlisting'])->name('agentlisting');
Route::any('ownerlisting',[UsersController::class, 'ownerlisting'])->name('ownerlisting');



// user properties
Route::get('properties_list', [PropertiesController::class, 'properties_list'])->name('properties_list');
Route::get('add-properties', [PropertiesController::class, 'add_properties'])->name('add-properties');
 Route::any('add_property', [PropertiesController::class, 'add_property'])->name('add_property');
 Route::match(['get','post'],'/users-edit-properties/{id?}', [PropertiesController::class, 'edit_properties'])->name('users-edit-properties');
 //Route::get('users-edit-properties', [PropertiesController::class, 'edit_properties'])->name('users-edit-properties');


//search
  Route::any('search', [SearchController::class, 'fn_search'])->name('search');
  Route::any('search_lis', [SearchController::class, 'search'])->name('search_lis');


  // //subscribe
  // Route::post('/subscribe',[UsersController::class,'subscribe'])->name('subscribe');


// Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
  // routes/web.php

// Route::get('/compare', 'PropertyComparisonController@index')->name('property.compare');
// Route::post('/compare/add/{propertyId}', 'PropertyComparisonController@addToComparison')->name('property.add_to_comparison');
// Route::post('/compare/remove/{propertyId}', 'PropertyComparisonController@removeFromComparison')->name('property.remove_from_comparison');
// Route::post('/compare/clear', 'PropertyComparisonController@clearComparison')->name('property.clear_comparison');



  //new designs 
  


//compare
// Route::any('/compareadd/{id?}',[CompareController::class, 'compareadd'])->name('compareadd');
Route::any('/compareadd/{id?}', [CompareController::class, 'compareadd'])->name('compareadd');
Route::any('/compare', [CompareController::class, 'compare'])->name('compare');
Route::any('/removecompare/{id?}', [CompareController::class, 'removecompare'])->name('removecompare');



 //Download 
        //  Route::get('/downloadFile/{id}', 'UsersController@show')->name('downloadFile');
          Route::any('/downloadFile/{id?}', [UsersController::class, 'show'])->name('downloadFile');

//delete images
Route::any('/deleteimages/{id?}', [PropertiesController::class, 'deleteimages'])->name('deleteimages');
Route::any('/deleteroomimages/{id}',[PropertiesController::class,'deleteroomimages'])->name('deleteroomimages');
Route::any('/deletehouseimages/{id}',[PropertiesController::class,'deletehouseimages'])->name('deletehouseimages');


//house room sections
Route::any('/deletehousesection/{id}',[PropertiesController::class,'deletehousesection'])->name('deletehousesection');
Route::any('/deleteroomsection/{id}',[PropertiesController::class,'deleteroomsection'])->name('deleteroomsection');

//delete property
Route::any('/deleteproperty/{id}',[PropertiesController::class,'deleteproperty'])->name('deleteproperty');

//edit function
Route::any('/editproperties/{id}',[PropertiesController::class,'editproperties'])->name('editproperties');






 
 


 Route::any('add-property-view', [PropertiesController::class, 'add_property_view'])->name('add-property-view');
 Route::any('add-propertyfun', [PropertiesController::class, 'add_propertyfun'])->name('add-propertyfun');








// User Common
Route::get('users-project', [UsersController::class, 'users_project'])->name('users-project');
Route::match(['get','post'],'/users-project-filter/{id?}',[UsersController::class,'users_project_filter'])->name('users-project-filter');
Route::match(['get','post'],'/users-project_details/{id?}',[UsersController::class,'users_project_details'])->name('users-project-details');
Route::match(['get','post'],'/users-project_viewbroucher/{id?}',[UsersController::class,'users_project_viewbroucher'])->name('users-project-viewbroucher');


// Route::get('users-project_details', [UsersController::class, 'users_project_details'])->name('users-project-details');
Route::get('users-property-rent', [UsersController::class, 'users_property_rent'])->name('users-property-rent');
Route::get('users-featured', [UsersController::class, 'users_featured'])->name('users-featured');
Route::get('users-property-rent-list', [UsersController::class, 'users_property_rent_list'])->name('users-property-rent-list');
Route::match(['get','post'],'/users-property-rent-details/{id?}', [UsersController::class, 'users_property_rent_details'])->name('users-property-rent-details');

Route::get('users-property-sale', [UsersController::class, 'users_property_sale'])->name('users-property-sale');
Route::match(['get','post'],'/users-property-sale-details/{id?}', [UsersController::class, 'users_property_sale_details'])->name('users-property-sale-details');
Route::get('users-property-sale-list', [UsersController::class, 'users_property_sale_list'])->name('users-property-sale-list');
Route::get('users-agent', [UsersController::class, 'users_agent'])->name('users-agent');
Route::get('users-contact', [UsersController::class, 'users_contact'])->name('users-contact');
Route::match(['get','post'],'/contactus',[UsersController::class,'contactstore'])->name('users-contactstore');
Route::get('users-about', [UsersController::class, 'users_about'])->name('users-about');
Route::get('helpfaq', [UsersController::class, 'helpfaq'])->name('helpfaq');
Route::get('referal', [UsersController::class, 'referal'])->name('referal');






// add new 
Route::any('viewaddnew',[AddnewlistPropertyController::class,'viewaddnew'])->name('viewaddnew');
Route::any('addnewpropertyfn',[AddnewlistPropertyController::class,'addnewpropertyfn' ])->name('addnewpropertyfn');






Route::match(['get','post'],'/intersted/property/{id?}',[InterstedPropertyController::class,'InterstedProperty'])->name('user-interstedproperty');
Route::match(['get','post'],'users-property-bookmark/{id?}', [UsersController::class, 'users_property_bookmark'])->name('users-property-bookmark');


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // login route
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
        Route::get('dashboard','HomeController@index')->name('dashboard');

        Route::get('admin-test','HomeController@adminTest')->name('admintest');
        Route::get('editor-test','HomeController@editorTest')->name('editortest');
         
           Route::match(['get','post'],'/properties_details/{id?}', 'PropertyController@properties_deatils')->name('properties_details');

            //routes for view
  Route::get('properties-pdf-view','PropertyController@properties_pdf_view')->name('properties-pdf-view');
  // routes for downloader
  Route::get('properties-pdf-download','PropertyController@properties_pdf_download')->name('properties-pdf-download');

        Route::get('properties','PropertyController@properties')->name('properties');
         Route::get('properties_report','PropertyController@properties_report')->name('properties_report');
          Route::get('addagent_form','PropertyController@addagent_form')->name('addagent_form');



      Route::match(['get','post'],'/featured/{id?}', 'PropertyController@featured')->name('featured');
      Route::match(['get','post'],'/removefeatured/{id?}', 'PropertyController@removefeatured')->name('removefeatured');
           Route::match(['get','post'],'/downloadfile/{id?}', 'PropertyController@downloadfile')->name('downloadfile');



          Route::get('approvalproperties','PropertyController@approvalproperties')->name('approvalproperties');
          Route::match(['get','post'],'/approve/{id?}', 'PropertyController@approve')->name('approve');
          Route::match(['get','post'],'/reject/{id?}', 'PropertyController@reject')->name('reject');
//background

          Route::get('bgadd','BackGroundController@bgadd')->name('bgadd');
          Route::match(['get','post'],'/bgaddagent', 'BackGroundController@bgaddagent')->name('bgaddagent');
           Route::match(['get','post'],'/transferto/{id?}', 'BackGroundController@transferto')->name('transferto');
                 Route::match(['get','post'],'/transfer/{id?}', 'BackGroundController@transfer')->name('transfer');



 //backgroundcheck close


          Route::get('projects_list','ProjectController@project_list')->name('projects_list');
          Route::match(['get','post'],'/project_details/{id?}', 'ProjectController@project_deatil')->name('project_details');



          
          // Route::any('addagent', [PropertyController::class, 'addagent'])->name('addagent');
          Route::match(['get','post'],'/addagent', 'PropertyController@addagent')->name('addagent');
     Route::get('agentlist','PropertyController@agentlist')->name('agentlist');
       Route::get('bgagentlist','BackGroundController@bgagentlist')->name('bgagentlist');
     Route::match(['get','post'],'/properties_details/{id?}', 'PropertyController@properties_deatils')->name('properties_details');
    Route::get('usercontactusresponse','HomeController@usercontactus')->name('usercontactusresponse');
     Route::get('intrested_user_responses','HomeController@intrested_user_responses')->name('intrested_user_responses');

     Route::get('agreement','AgreementController@agreement')->name('agreement');
     Route::match(['get','post'],'/sendagreement/{id?}', 'AgreementController@sendagreement')->name('sendagreement');
     
          Route::match(['get','post'],'/sendagentagreement/{id?}', 'AgreementController@sendagentagreement')->name('sendagentagreement');


     Route::get('agentagreement','AgreementController@agentagreement')->name('agentagreement');

        Route::any('becomeagent', 'BecomeResponseController@becomeagent')->name('becomeagent');
         Route::any('becomeowner', 'BecomeResponseController@becomeowner')->name('becomeowner');








    

    });
    Route::any('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});

// Agent

Route::namespace('Agent')->prefix('agent')->name('agent.')->group(function(){
    Route::namespace('Auth')->middleware('guest:agent')->group(function(){
        // login route
        Route::get('login','AuthenticatedSessionController@create')->name('login'); 
        Route::post('login','AuthenticatedSessionController@store')->name('agentlogin');
    });
Route::middleware('agent')->group(function(){
    Route::get('dashboard','AgentController@index')->name('dashboard');
    Route::any('property.rent','AgentController@property_rent')->name('property.rent');
    Route::get('property-rent-add', [PropertyrentController::class, 'create'])->name('property-rent-add');
    Route::any('property-rent-store', [PropertyrentController::class, 'store'])->name('property-rent-store');
    // Route::match(['get','post'],'//{id?}', 'PropertyrentController@property_rent_edit')->name('property-rent-edit');

// edit property
    Route::match(['get','post'],'/property-rent-edit/{id?}', 'PropertyrentController@property_rent_edit')->name('property-rent-edit');
    Route::match(['get','post'],'/propertyeditfn/{id?}', 'PropertyrentController@propertyeditfn')->name('propertyeditfn');
    Route::match(['get','post'],'/deleteimages/{id?}', 'PropertyrentController@deleteimages')->name('deleteimages');

    Route::match(['get','post'],'/deleteroomimages/{id?}', 'PropertyrentController@deleteroomimages')->name('deleteroomimages');

    Route::match(['get','post'],'/deletehouseimages/{id?}', 'PropertyrentController@deletehouseimages')->name('deletehouseimages');

    Route::match(['get','post'],'/deletehousesection/{id?}', 'PropertyrentController@deletehousesection')->name('deletehousesection');
        Route::match(['get','post'],'/deleteroomsection/{id?}', 'PropertyrentController@deleteroomsection')->name('deleteroomsection');

        //delete property
        Route::match(['get','post'],'/property-delete/{id?}', 'PropertyrentController@property_delete')->name('property-delete');



// Route::any('/deleteimages/{id?}', [PropertiesController::class, 'deleteimages'])->name('deleteimages');
// Route::any('/deleteroomimages/{id}',[PropertiesController::class,'deleteroomimages'])->name('deleteroomimages');
// Route::any('/deletehouseimages/{id}',[PropertiesController::class,'deletehouseimages'])->name('deletehouseimages');


// //house room sections
// Route::any('/deletehousesection/{id}',[PropertiesController::class,'deletehousesection'])->name('deletehousesection');
// Route::any('/deleteroomsection/{id}',[PropertiesController::class,'deleteroomsection'])->name('deleteroomsection');










    Route::match(['get','post'],'/property_hide/{id?}', 'PropertyrentController@property_hide')->name('property_hide');
      Route::match(['get','post'],'/property_show/{id?}', 'PropertyrentController@property_show')->name('property_show');



       Route::get('projects_total_list','ProjectController@projects_total_list')->name('projects_total_list');


     Route::get('project_add', [ProjectController::class, 'create'])->name('project_add');
    Route::any('project-add', [ProjectController::class, 'add_project'])->name('project-add');
    Route::get('projects_list','ProjectController@projects_list')->name('projects_list');
    Route::match(['get','post'],'/project_details/{id?}', 'ProjectController@project_deatils')->name('project_details');
    Route::match(['get','post'],'/project_edit_details/{id?}', 'ProjectController@project_edit_deatils')->name('project_edit_details');
        


 

    Route::any('property.sale','AgentController@property_sale')->name('property.sale');
    Route::get('property-sale-add', [PropertysaleController::class, 'create'])->name('property-sale-add');
    Route::any('property-sale-store', [PropertysaleController::class, 'store'])->name('property-sale-store');
    Route::get('properties','PropertyrentController@properties')->name('properties');
    Route::get('agent_properties','PropertyrentController@agent_properties')->name('agent_properties');
    // Route::any('/property-delete/{id?}', [PropertyrentController::class, 'property_delete'])->name('property-delete');


    Route::get('/downloadFile/{id}', 'PropertyrentController@show')->name('downloadFile');



     Route::get('properties_report','PropertyrentController@properties_report')->name('properties_report');
    Route::match(['get','post'],'/properties_details/{id?}', 'PropertyrentController@properties_deatils')->name('properties_details');
     Route::match(['get','post'],'/allproperties_details/{id?}', 'PropertyrentController@allproperties_deatils')->name('allproperties_details');
     Route::match(['get','post'],'/application/{id?}', 'PropertyrentController@application')->name('application');
      Route::match(['get','post'],'/viewapplication/{id?}', 'PropertyrentController@viewapplication')->name('viewapplication');
       Route::any('viewprofile','AgentController@viewprofile')->name('viewprofile');
       Route::get('/editview','AgentController@editagentprofile')->name('editview');
        // Route::get('','AgentController@editagentprofile')->name('editagentprofile');
        Route::any('editagentprofile', [AgentController::class, 'editagentprofile'])->name('editagentprofile');




        Route::get('agreement',[AgentController::class, 'agreement'])->name('agreement');






        //background Agents Routes
            Route::get('bgproperties','BgController@properties')->name('bgproperties');
         Route::match(['get','post'],'/bgproperties_details/{id?}', 'BgController@properties_deatils')->name('bgproperties_details');
         Route::match(['get','post'],'/bgallotedaplications/{id?}', 'BgController@bgallotedaplications')->name('bgallotedaplications');
            Route::any('bgviewprofile','BgController@viewprofile')->name('bgviewprofile');
              Route::get('/bgeditview','BgController@editagentprofile')->name('bgeditview');
                    Route::match(['get','post'],'/bgviewapplication/{id?}', 'BgController@bgviewapplication')->name('bgviewapplication');
                      Route::match(['get','post'],'/bgapprove/{id?}', 'BgController@bgapprove')->name('bgapprove');
          Route::match(['get','post'],'/bgreject/{id?}', 'BgController@bgreject')->name('bgreject');
            Route::match(['get','post'],'/remark/{id?}', 'BgController@remark')->name('remark');

   
        Route::any('bgeditagentprofile', [BgController::class, 'editagentprofile'])->name('bgeditagentprofile');











// BackGround Verification routes





    });
    Route::any('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});




