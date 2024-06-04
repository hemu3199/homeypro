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
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Users\AgentReviewController;
use App\Http\Controllers\Users\AgentReportController;



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


// -- Homey page routes
Route::get('/', [UsersController::class, 'users_dashboard'])->name('users-dashboard');
Route::get('users-property-rent', [UsersController::class, 'users_property_rent'])->name('users-property-rent');
Route::get('users-about', [UsersController::class, 'users_about'])->name('users-about');
Route::get('users-contact', [UsersController::class, 'users_contact'])->name('users-contact');
Route::get('helpfaq', [UsersController::class, 'helpfaq'])->name('helpfaq');
Route::get('referal', [UsersController::class, 'referal'])->name('referal');
Route::get('privacy', [UsersController::class, 'privacy'])->name('privacy');
Route::get('terms', [UsersController::class, 'terms'])->name('terms');
Route::match(['get','post'],'testimonial', [UsersController::class, 'testimonial'])->name('testimonial');
Route::match(['get','post'],'reviews/{id?}', [UsersController::class, 'reviews'])->name('reviews');
Route::match(['get','post'],'/like-review/{property_id?}/{user_id?}/{review_id?}', [UsersController::class, 'like_review'])->name('like.review');



//-- bookmark controllers
Route::match(['get','post'],'users-property-bookmark/{id?}', [UsersController::class, 'users_property_bookmark'])->name('users-property-bookmark');

//-- compare controllers
Route::any('/compareadd/{id?}', [CompareController::class, 'compareadd'])->name('compareadd');
Route::any('/compare', [CompareController::class, 'compare'])->name('compare');
Route::any('/removecompare/{id?}', [CompareController::class, 'removecompare'])->name('removecompare');

//-- add listing btn or register btn

Route::get('/listing', [UsersController::class, 'listing'])->name('listing');
// -- become owner or agent btn routes

Route::any('agentlisting',[UsersController::class, 'agentlisting'])->name('agentlisting');
Route::any('ownerlisting',[UsersController::class, 'ownerlisting'])->name('ownerlisting');

//-- properties list

//search
  Route::any('search', [SearchController::class, 'fn_search'])->name('search');


//-- advance search
Route::any('search_lis', [SearchController::class, 'search'])->name('search_lis');

//-- homey offers routes or explore all

Route::get('/explore', [UsersController::class, 'explore'])->name('explore');
Route::get('/homeinsurance', [UsersController::class, 'homeinsurance'])->name('homeinsurance');
Route::get('/line-of-credit', [UsersController::class, 'line_of_credit'])->name('line-of-credit');
Route::get('/rent-now-pay-later', [UsersController::class, 'rent_now_pay_later'])->name('rent-now-pay-later');

//Add Agent Review
Route::any('/add-agent-review/{id?}',[AgentReviewController::class,'add_agent_review'])->name('add-agent-review');

// add report 
Route::any('/add-agent-report/{id?}',[AgentReportController::class,'add_agent_report'])->name('add-agent-report');



// -- property details

Route::match(['get','post'],'/users-property-rent-details/{id?}', [UsersController::class, 'users_property_rent_details'])->name('users-property-rent-details');

// -- i am intrested btn
Route::match(['get','post'],'/intersted/property/{id?}',[InterstedPropertyController::class,'InterstedProperty'])->name('user-interstedproperty');

//-- contact us
Route::match(['get','post'],'/contactus',[UsersController::class,'contactstore'])->name('users-contactstore');


// -- Download file
Route::any('/downloadFile/{id?}', [UsersController::class, 'show'])->name('downloadFile');



// -- user dashboard side bar routes
Route::get('/dashboard/{id?}', [UsersController::class, 'dashboard'])->name('dashboard');
Route::get('properties_list', [PropertiesController::class, 'properties_list'])->name('properties_list');
Route::get('users-intersted-property', [UsersController::class, 'users_intersted_property'])->name('users-intersted-property');
Route::get('users-application', [UsersController::class, 'users_application'])->name('users-application');
Route::get('users-bookmark-property', [UsersController::class, 'users_bookmark_property'])->name('users-bookmark-property');
Route::get('users-reviews', [UsersController::class, 'users_reviews'])->name('users-reviews');
Route::any('/users-reviews-edit/{id?}', [UsersController::class, 'users_reviews_edit'])->name('users-reviews-edit');
Route::any('/users-delete-reviews/{id?}', [UsersController::class, 'users_delete_reviews'])->name('users-delete-reviews');


// -- Properties Functions
Route::any('add-property-view', [PropertiesController::class, 'add_property_view'])->name('add-property-view');
Route::any('add-propertyfun', [PropertiesController::class, 'add_propertyfun'])->name('add-propertyfun');
Route::match(['get','post'],'/users-edit-properties/{id?}', [PropertiesController::class, 'edit_properties'])->name('users-edit-properties');
Route::any('/editproperties/{id}',[PropertiesController::class,'editproperties'])->name('editproperties');
Route::any('/deleteproperty/{id}',[PropertiesController::class,'deleteproperty'])->name('deleteproperty');

//delete images
Route::any('/deleteimages/{id?}', [PropertiesController::class, 'deleteimages'])->name('deleteimages');
Route::any('/deleteroomimages/{id}',[PropertiesController::class,'deleteroomimages'])->name('deleteroomimages');
Route::any('/deletehouseimages/{id}',[PropertiesController::class,'deletehouseimages'])->name('deletehouseimages');


//house room sections
Route::any('/deletehousesection/{id}',[PropertiesController::class,'deletehousesection'])->name('deletehousesection');
Route::any('/deleteroomsection/{id}',[PropertiesController::class,'deleteroomsection'])->name('deleteroomsection');

// active inactive 
Route::any('/active/{id}',[PropertiesController::class,'active'])->name('active');
Route::any('/inactive/{id}',[PropertiesController::class,'inactive'])->name('inactive');

// -- user Application

Route::any('/users-view-application/{id?}', [UsersController::class, 'users_view_application'])->name('users-view-application');
Route::any('/users-edit-application/{id?}', [UsersController::class, 'users_edit_application'])->name('users-edit-application');
Route::any('/users-delete-application/{id?}', [UsersController::class, 'users_delete_application'])->name('users-delete-application');


// --  delete bookmarks Property

Route::any('/users-delete-bookmark/{id?}', [UsersController::class, 'users_delete_bookmark'])->name('users-delete-bookmark');

// --  delete Intrested Property

Route::any('/users-delete-intrested/{id?}', [UsersController::class, 'users_delete_intrested'])->name('users-delete-intrested');

// -- Owners Side bar routes
Route::get('/ownerdashboard/{id?}', [OwnerController::class, 'ownerdashboard'])->name('ownerdashboard');
Route::get('ownerproperties_list', [OwnerController::class, 'ownerproperties_list'])->name('ownerproperties_list');
Route::get('intrested_users_list', [OwnerController::class, 'intrested_users_list'])->name('intrested_users_list');
Route::get('ownersapplication', [OwnerController::class, 'ownersapplication'])->name('ownersapplication');
Route::get('usersagreement',[OwnerController::class, 'usersagreement'])->name('usersagreement');


// -- Owners add edit
Route::any('ownersadd-property-view', [OwnerController::class, 'add_property_view'])->name('ownersadd-property-view');
Route::any('owners-add-propertyfun', [OwnerController::class, 'add_propertyfun'])->name('owners-add-propertyfun');
Route::match(['get','post'],'/owners-edit-properties/{id?}', [OwnerController::class, 'edit_properties'])->name('owners-edit-properties');







// Route::get('/homeinsurance',[UsersController::class,'']);



// -- user profile setting
Route::get('users-profile-setting', [UsersController::class, 'users_profile_setting'])->name('users-profile-setting');
Route::any('users-profile-setting-update', [UsersController::class, 'users_profile_setting_update'])->name('users-profile-setting-update');
Route::any('users-profile-setting-edit', [UsersController::class, 'users_profile_setting_edit'])->name('users-profile-setting-edit');
Route::get('users-profile-setting-view', [UsersController::class, 'users_profile_setting_view'])->name('users-profile-setting-view');



Route::get('get-agents-reviews',[AgentReviewController::class,'get_agents_reviews'])->name('get-agents-reviews');
Route::match(['get','post'],'/edit-agent-review/{id}',[AgentReviewController::class,'edit_agent_review'])->name('edit-agent-review');
Route::match(['get','post'],'/delete-agent-review/{id}',[AgentReviewController::class,'delete_agent_review'])->name('delete-agent-review');

Route::get('get-agents-report',[AgentReportController::class,'get_agents_report'])->name('get-agents-report');
Route::match(['get','post'],'/edit-agent-report/{id}',[AgentReportController::class,'edit_agent_report'])->name('edit-agent-report');
Route::match(['get','post'],'/delete-agent-report/{id}',[AgentReportController::class,'delete_agent_report'])->name('delete-agent-report');


Route::get('users-testimonilas', [UsersController::class, 'users_testimonilas'])->name('users-testimonilas');
Route::any('/users-testimonilas-edit/{id?}', [UsersController::class, 'users_testimonilas_edit'])->name('users-testimonilas-edit');
Route::any('/users-edit-application/{id?}', [UsersController::class, 'users_edit_application'])->name('users-edit-application');
Route::any('/users-delete-testimonilas/{id?}', [UsersController::class, 'users_delete_testimonilas'])->name('users-delete-testimonilas');

 Route::get('users-featured', [UsersController::class, 'users_featured'])->name('users-featured');
 Route::post('users-profile-add', [UsersController::class, 'users_profile_add'])->name('users-profile-add');
 
 Route::post('update-users-password',[UsersController::class,'update_users_password'])->name('update-users-password');



// Route::get('/users-intersted-property-details/{property_id?}', [UsersController::class, 'users_intersted_property_details'])->name('users-intersted-property-details');

// Route::any('users-application-update', [UsersController::class, 'users_application_update'])->name('users-application-update');
// Route::get('/users-bookmark-property-details/{property_id?}', [UsersController::class, 'users_bookmark_property_details'])->name('users-bookmark-property-details');
// user properties
// Route::get('add-properties', [PropertiesController::class, 'add_properties'])->name('add-properties');
//  Route::any('add_property', [PropertiesController::class, 'add_property'])->name('add_property');
//Route::get('users-edit-properties', [PropertiesController::class, 'edit_properties'])->name('users-edit-properties');
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
//Download 
//  Route::get('/downloadFile/{id}', 'UsersController@show')->name('downloadFile');
//delete property
//edit function
// User Common
// Route::get('users-project', [UsersController::class, 'users_project'])->name('users-project');
// Route::match(['get','post'],'/users-project-filter/{id?}',[UsersController::class,'users_project_filter'])->name('users-project-filter');
// Route::match(['get','post'],'/users-project_details/{id?}',[UsersController::class,'users_project_details'])->name('users-project-details');
// Route::match(['get','post'],'/users-project_viewbroucher/{id?}',[UsersController::class,'users_project_viewbroucher'])->name('users-project-viewbroucher');
// Route::get('users-project_details', [UsersController::class, 'users_project_details'])->name('users-project-details');

// Route::get('users-property-rent-list', [UsersController::class, 'users_property_rent_list'])->name('users-property-rent-list');
// Route::get('users-property-sale', [UsersController::class, 'users_property_sale'])->name('users-property-sale');
// Route::match(['get','post'],'/users-property-sale-details/{id?}', [UsersController::class, 'users_property_sale_details'])->name('users-property-sale-details');
// Route::get('users-property-sale-list', [UsersController::class, 'users_property_sale_list'])->name('users-property-sale-list');
// Route::get('users-agent', [UsersController::class, 'users_agent'])->name('users-agent');

// add new 
// Route::any('viewaddnew',[AddnewlistPropertyController::class,'viewaddnew'])->name('viewaddnew');
// Route::any('addnewpropertyfn',[AddnewlistPropertyController::class,'addnewpropertyfn' ])->name('addnewpropertyfn');



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // login route
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
    Route::get('dashboard','HomeController@index')->name('dashboard');
    Route::get('properties-graph-pdf-download','HomeController@properties_pdf_download')->name('properties-graph-pdf-download');
    Route::get('agent/list/pdf','HomeController@agent_list_pdf')->name('agent.list.pdf');
    Route::get('bg/agent/list/pdf','HomeController@bg_agent_list_pdf')->name('bg.agent.list.pdf');
    Route::get('properties/report/pdf','HomeController@properties_report_pdf')->name('properties.report.pdf');

    Route::get('admin-test','HomeController@adminTest')->name('admintest');
    Route::get('editor-test','HomeController@editorTest')->name('editortest');
    Route::match(['get','post'],'/properties_details/{id?}', 'PropertyController@properties_deatils')->name('properties_details');
    //routes for PDF view
    Route::get('properties-pdf-view','PropertyController@properties_pdf_view')->name('properties-pdf-view');
    // routes for downloader
    Route::get('properties-pdf-download','PropertyController@properties_pdf_download')->name('properties-pdf-download');
    Route::get('properties','PropertyController@properties')->name('properties');
    Route::get('properties_report','PropertyController@properties_report')->name('properties_report');

    Route::match(['get','post'],'/featured/{id?}', 'PropertyController@featured')->name('featured');
    Route::match(['get','post'],'/removefeatured/{id?}', 'PropertyController@removefeatured')->name('removefeatured');
    Route::match(['get','post'],'/downloadfile/{id?}', 'PropertyController@downloadfile')->name('downloadfile');
    Route::get('approvalproperties','PropertyController@approvalproperties')->name('approvalproperties');
    Route::match(['get','post'],'/approve/{id?}', 'PropertyController@approve')->name('approve');
    Route::match(['get','post'],'/reject/{id?}', 'PropertyController@reject')->name('reject');
    Route::match(['get','post'],'/rateing','PropertyController@rateing')->name('rateing');
    Route::match(['get','post'],'/deletedproperties','PropertyController@deletedproperties')->name('deletedproperties');



    // Agent Functions
    Route::get('agentlist','HomeyAgentController@agentlist')->name('agentlist');
    Route::get('addagent_form','HomeyAgentController@addagent_form')->name('addagent_form');
    Route::match(['get','post'],'/addagent', 'HomeyAgentController@addagent')->name('addagent');
    // Agent edit Profile
    Route::any('/admineditview/{id}','HomeyAgentController@editagentprofile')->name('admineditview');
    Route::any('/delete-agent/{id}','HomeyAgentController@delete_agent')->name('delete-agent');
    // active or deactive agent
    Route::match(['get','post'],'/active-agent/{id?}', 'HomeyAgentController@active_agent')->name('active-agent');
    Route::match(['get','post'],'/deactive-agent/{id?}', 'HomeyAgentController@deactive_agent')->name('deactive-agent');

    Route::match(['get','post'],'/testimonials','HomeController@testimonials')->name('testimonials');
    Route::match(['get','post'],'/approve/testimonials/{id?}','HomeController@approve_testimonials')->name('approve.testimonials');
    Route::match(['get','post'],'/reject/testimonials/{id?}','HomeController@reject_testimonials')->name('reject.testimonials');
    Route::match(['get','post'],'/deletetestimonials/{id?}','HomeController@deletetestimonials')->name('deletetestimonials');



    // -- edit user added propertys 
    Route::match(['get','post'],'/property-rent-edit/{id?}', 'PropertyController@property_rent_edit')->name('property-rent-edit');
    Route::match(['get','post'],'/propertyeditfn/{id?}', 'PropertyController@propertyeditfn')->name('propertyeditfn');
    Route::match(['get','post'],'/deleteimages/{id?}', 'PropertyController@deleteimages')->name('deleteimages');
    Route::match(['get','post'],'/deleteroomimages/{id?}', 'PropertyController@deleteroomimages')->name('deleteroomimages');
    Route::match(['get','post'],'/deletehouseimages/{id?}', 'PropertyController@deletehouseimages')->name('deletehouseimages');
    Route::match(['get','post'],'/deletehousesection/{id?}', 'PropertyController@deletehousesection')->name('deletehousesection');
    Route::match(['get','post'],'/deleteroomsection/{id?}', 'PropertyController@deleteroomsection')->name('deleteroomsection');
    // delete property
    Route::match(['get','post'],'/property-delete/{id?}', 'PropertyController@property_delete')->name('property-delete');
    // Admin Properties
    Route::get('adminproperties', 'PropertyController@adminproperties')->name('adminproperties');
    // add function
    Route::get('admin-property-add', 'PropertyController@create')->name('admin-property-add');
    Route::any('property-add-function', 'PropertyController@property_add_function')->name('property-add-function');
    // edit function
    Route::match(['get','post'],'/admin-property-rent-edit/{id?}', 'PropertyController@admin_property_rent_edit')->name('admin-property-rent-edit');
    Route::match(['get','post'],'/admin-propertyeditfn/{id?}', 'PropertyController@admin_propertyeditfn')->name('admin-propertyeditfn');
    // delete 
    Route::match(['get','post'],'/property-delete/{id?}', 'PropertyController@property_delete')->name('property-delete');
    // Active inactive
    Route::match(['get','post'],'/property_hide/{id?}', 'PropertyController@property_hide')->name('property_hide');
    Route::match(['get','post'],'/property_show/{id?}', 'PropertyController@property_show')->name('property_show');
    
 
    //background
    Route::get('bgadd','BackGroundController@bgadd')->name('bgadd');
    Route::match(['get','post'],'/bgaddagent', 'BackGroundController@bgaddagent')->name('bgaddagent');
    Route::match(['get','post'],'/transferto/{id?}', 'BackGroundController@transferto')->name('transferto');
    Route::match(['get','post'],'/transfer/{id?}', 'BackGroundController@transfer')->name('transfer');
    //backgroundcheck close
    Route::get('projects_list','ProjectController@project_list')->name('projects_list');
    Route::match(['get','post'],'/project_details/{id?}', 'ProjectController@project_deatil')->name('project_details');
    // Route::any('addagent', [PropertyController::class, 'addagent'])->name('addagent');
    
    
    Route::get('bgagentlist','BackGroundController@bgagentlist')->name('bgagentlist');
    Route::match(['get','post'],'/properties_details/{id?}', 'PropertyController@properties_deatils')->name('properties_details');
    Route::get('usercontactusresponse','HomeController@usercontactus')->name('usercontactusresponse');

    Route::get('agentcontactusresponse','HomeController@agentcontactus')->name('agentcontactusresponse');
     Route::any('edit-agent-Contactus-response/{id}','HomeController@edit_agent_contact_response')->name('edit-agent-Contactus-response');
    Route::any('/delete-agent-Contactus-response/{id}','HomeController@delete_agent_contact_response')->name('delete-agent-Contactus-response');
   

    Route::get('bgagentcontactusresponse','HomeController@bgagentcontactus')->name('bgagentcontactusresponse');
    Route::any('edit-bgagent-Contactus-response/{id}','HomeController@edit_bgagent_contact_response')->name('edit-bgagent-Contactus-response');
    Route::any('/delete-bgagent-Contactus-response/{id}','HomeController@delete_bgagent_contact_response')->name('delete-bgagent-Contactus-response');

    Route::get('intrested_user_responses','HomeController@intrested_user_responses')->name('intrested_user_responses');

    Route::get('agreement','AgreementController@agreement')->name('agreement');
    Route::match(['get','post'],'/sendagreement/{id?}', 'AgreementController@sendagreement')->name('sendagreement');
    Route::match(['get','post'],'/sendagentagreement/{id?}', 'AgreementController@sendagentagreement')->name('sendagentagreement');
    Route::get('agentagreement','AgreementController@agentagreement')->name('agentagreement');
    Route::any('becomeagent', 'BecomeResponseController@becomeagent')->name('becomeagent');
    Route::any('becomeowner', 'BecomeResponseController@becomeowner')->name('becomeowner');
    // User Or Agent Deleted Properties
    Route::get('deleted-properties','PropertyController@deletedproperties')->name('deleted-properties');
    Route::get('deleted-properties-pdf-download','PropertyController@deleted_properties_pdf_download')->name('deleted-properties-pdf-download');
    // Properties report delete
    Route::any('/delete-property-report/{id}','PropertyController@delete_property_report')->name('delete-property-report');
    // Edit Delete Contact us response
     Route::any('/delete-Contactus-response/{id}','HomeController@delete_contact_response')->name('delete-Contactus-response');
     Route::any('/edit-Contactus-response/{id}','HomeController@edit_user_contact_response')->name('edit-Contactus-response');
    // Update or delete user Agreement
      Route::any('/delete-user-agreement/{id}','AgreementController@delete_user_agreement')->name('delete-user-agreement');
      // edit agent agreement
      Route::any('/edit-agent-agreement/{id}','AgreementController@edit_agent_agreement')->name('edit-agent-agreement');
    Route::any('/edit-user-agreement/{id}','AgreementController@edit_user_agreement')->name('edit-user-agreement');

    // Edit or delete Application Response
   Route::any('/delete-application-response/{id}','HomeController@delete_application_response')->name('delete-application-response');
   
   // View applicaion edit application
    Route::match(['get','post'],'/viewapplication/{id?}', 'HomeController@viewapplication')->name('viewapplication');
    Route::match(['get','post'],'/editapplication/{id?}', 'HomeController@editapplication')->name('editapplication');
    Route::match(['get','post'],'/edit-transfer-bg-agent/{id?}', 'BackGroundController@edit_transfer_bg_agent')->name('edit-transfer-bg-agent');

    //add Cities
    Route::get('cities','HomeController@cities')->name('cities');
    Route::match(['get','post'],'/add-cities', 'HomeController@add_cities')->name('add-cities');
    Route::match(['get','post'],'/edit-cities/{id}', 'HomeController@edit_cities')->name('edit-cities');
    Route::match(['get','post'],'/delete-cities/{id}', 'HomeController@city_delete')->name('delete-cities');


    // Application List
    Route::get('application-list','BackGroundController@application_list')->name('application-list');

    // Send Application
    Route::get('send-user-properties-report','HomeController@send_user_properties_report')->name('send-user-properties-report');
    Route::get('send-agent-properties-report','HomeController@send_agent_properties_report')->name('send-agent-properties-report');
    Route::get('send-admin-properties-report','HomeController@send_admin_properties_report')->name('send-admin-properties-report');
    Route::match(['get','post'],'/application/{id?}', 'HomeController@application')->name('application');
    Route::match(['get','post'],'/application-approve/{id?}', 'HomeController@application_approve')->name('application-approve');
    Route::match(['get','post'],'/application-reject/{id?}', 'HomeController@application_reject')->name('application-reject');
    Route::match(['get','post'],'/remark/{id?}', 'HomeController@remark')->name('remark');



    // Agent Report 
    Route::get('agents-report','AgentReportReviewController@agents_report')->name('agents-report');
     Route::get('/delete-agents-report/{id}','AgentReportReviewController@delete_agents_report')->name('delete-agents-report');

    // Agent Reviews
    Route::get('agents-reviews','AgentReportReviewController@agents_reviews')->name('agents-reviews');
      Route::get('/delete-agents-review/{id}','AgentReportReviewController@delete_agents_review')->name('delete-agents-review');


    Route::match(['get','post'],'/reviews','HomeController@reviews')->name('reviews');
Route::match(['get','post'],'/approve/reviews/{id?}','HomeController@approve_reviews')->name('approve.reviews');
Route::match(['get','post'],'/reject/reviews/{id?}','HomeController@reject_reviews')->name('reject.reviews');
Route::match(['get','post'],'/deletereviews/{id?}','HomeController@deletereviews')->name('deletereviews');





    







    // Profile
     Route::any('viewprofile','AdminController@view_profile')->name('viewprofile');
     Route::get('/update/view','AdminController@addd_admin_profile')->name('add.profile.details');
     Route::any('update/profile', [AdminController::class, 'update_admin_profile'])->name('updateadminprofile');
     Route::get('/editview','AdminController@edit_admin_profile')->name('editview');
     Route::any('edit/admin/profile', [AdminController::class, 'edit_admin_profile'])->name('editadminprofile');









    

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

    Route::match(['get','post'],'agent/contactus',[AgentController::class,'agent_contact'])->name('agentscontactstore');










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
    
     Route::get('agent-properties-pdf','AgentController@agent_properties_pdf_download')->name('agent-properties-pdf');




        Route::get('agreement',[AgentController::class, 'agreement'])->name('agreement');






        //background Agents Routes
        Route::get('bgproperties','BgController@properties')->name('bgproperties');
        Route::match(['get','post'],'/bgproperties_details/{id?}', 'BgController@properties_deatils')->name('bgproperties_details');
        Route::match(['get','post'],'/bgallotedaplications/{id?}', 'BgController@bgallotedaplications')->name('bgallotedaplications');
        Route::any('bgviewprofile','BgController@viewprofile')->name('bgviewprofile');
        Route::get('/bgeditview','BgController@editbgagentprofile')->name('bgeditview');
        Route::any('editbgagentprofile', [BgController::class, 'editbgagentprofile'])->name('editbgagentprofile');
        Route::match(['get','post'],'/bgviewapplication/{id?}', 'BgController@bgviewapplication')->name('bgviewapplication');
        Route::match(['get','post'],'/bgapprove/{id?}', 'BgController@bgapprove')->name('bgapprove');
        Route::match(['get','post'],'/bgreject/{id?}', 'BgController@bgreject')->name('bgreject');
        Route::match(['get','post'],'/remark/{id?}', 'BgController@remark')->name('remark');

   
        Route::any('bgeditagentprofile', [BgController::class, 'editagentprofile'])->name('bgeditagentprofile');

        Route::match(['get','post'],'bgagent/contactus',[AgentController::class,'bg_agent_contact'])->name('bgagentscontactstore');
        //pdf
        Route::get('application/list/pdf','BgController@application_list_pdf')->name('application-list-pdf-download');
        Route::get('approved/application/list/pdf','BgController@approved_application_list_pdf')->name('approved-application-list-pdf-download');
        Route::get('rejected/application/list/pdf','BgController@rejected_application_list_pdf')->name('rejected-application-list-pdf-download');
        Route::get('pending/application/list/pdf','BgController@pending_application_list_pdf')->name('pending-application-list-pdf-download');
        
        
        Route::get('bg-properties-pdf','BgController@bg_properties_pdf_download')->name('bg-properties-pdf');











// BackGround Verification routes





    });
    Route::any('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});




