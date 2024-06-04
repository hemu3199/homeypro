<?php

namespace App\Http\Controllers;
use Validator,Auth,DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Facades\ResponseHelper;
use App\Models\User;
use App\Models\InterstedProperty;
use App\Models\Projects;
use App\Models\Contactus;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\BookmarkProperty;
use App\Models\AddAgent;
use App\Models\Homeyproperties;
use App\Models\Property_images;
use App\Models\BecomeAMember;
use App\Models\Room_images;
use App\Models\House;
use App\Models\Room;
use App\Models\Compare;
use App\Models\Agreement;
use App\Models\Testimonal;
use App\Models\Reviews;
use App\Models\LikeReview;
use App\Models\AgentReview;
use App\Models\AgentReport;


class UserApi extends Controller
{
    
    public function dashboard()
    {
        try
        {
            $latest_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->latest()->take(6)->get();
            $featured_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('featured','=',1)->latest()->take(5)->get();
            $agents = AddAgent::latest()->take(10)->get();
            $bookmarked_properties = BookmarkProperty::where('user_id',auth()->user()->user_id)->get();
            $added_to_compare = Compare::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
            $latest_properties_images = [];
            $featured_properties_images = [];
            $city_list=[];
            $latest_agents_cards = [];
            $featured_agents_cards = [];
            $latest_agent_ratings=[];
            
            $city=DB::table('cities')->latest()->get();
            
            foreach($city as $cities)
            {
                 $city_name= DB::table('homeyproperties')->where('city',$cities->city_name)->where('approval_status',1)->count();
                           if ($city_name) {
                    $city_list[] = [
                        'count' => $city_name,
                        'city_name' => $cities->city_name,
                        'city_description'=>$cities->city_description,
                        'city_image'=>$cities->city_image,
                        
                    ];
                }
                else
                 {
                    $city_list[] = [
                        'count' => 0,
                        'city_name' => $cities->city_name,
                        'city_description'=>$cities->city_description,
                        'city_image'=>$cities->city_image,
                        
                    ];
                }
                
            }
            
            foreach($latest_properties as $latest_property)
                {
                    $property_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('agent_id')->first();
                
                    if (!empty($property_name)) {
                        $agent_details = DB::table('agent_basic_information')
                            ->where('agent_id', $property_name)
                            ->first();
                        
                        $ratings =  DB::table('agent_reviews')->where('member_id', $property_name)->avg('rating');
                        
                        $latest_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => $agent_details->agent_id,
                            'agent_name' => $agent_details->fname,
                            'agent_image' => $agent_details->file,
                            'ratings' => $ratings,
                        ];
                    }
                    else {
                        
                          $user_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('user_id')->first();
                
                    if (!empty($user_name)) {
                        
                        $latest_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' => 'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', $user_name)->avg('rating'),
                        ];
                    } else {
                        
                        $latest_agents_cards[] = [
                             'property_id' => $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' =>'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', 'Admin')->avg('rating'),
                            
                        ];
                    }
                       
                    }
                }
                
            foreach($featured_properties as $latest_property)
                {
                    $property_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('agent_id')->first();
                
                    if (!empty($property_name)) {
                        $agent_details = DB::table('agent_basic_information')
                            ->where('agent_id', $property_name)
                            ->first();
                        
                        $ratings =  DB::table('agent_reviews')->where('member_id', $property_name)->avg('rating');
                        
                        $featured_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => $agent_details->agent_id,
                            'agent_name' => $agent_details->fname,
                            'agent_image' => $agent_details->file,
                            'ratings' => $ratings,
                        ];
                    }
                    else {
                        
                          $user_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('user_id')->first();
                
                    if (!empty($user_name)) {
                        
                        $featured_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' => 'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', $user_name)->avg('rating'),
                        ];
                    } else {
                        
                        $featured_agents_cards[] = [
                             'property_id' => $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' =>'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', 'Admin')->avg('rating'),
                            
                        ];
                    }
                       
                    }
                }

             foreach($agents as $agent) {
                $agent_rating = DB::table('agent_reviews')->where('member_id', $agent->agent_id)->avg('rating');
                if ($agent->agent_id) {
                    $latest_agent_ratings[]=[
                        'agent_id'=>$agent->agent_id,
                        'agent_rating'=>$agent_rating,
                        
                        ];
                }
                
                
            }

            foreach($latest_properties as $property) {
                $property_images = Property_images::where('property_id', $property->property_id)->get();
                if ($property_images->isNotEmpty()) {
                    $latest_properties_images[$property->property_id] = $property_images;
                }
            }
            
        
       

            foreach($featured_properties as $property) {
                $property_images = Property_images::where('property_id', $property->property_id)->get();
                if ($property_images->isNotEmpty()) {
                    $featured_properties_images[$property->property_id] = $property_images;
                }
            }
            
                        $profile = DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->first();
                        if($profile == '')
                        {
                            $profile_message="Show Add profile Details";
                            $profile_image="-";
                            
                        }
                        else
                        {
                         $profile_message="Show Update profile Details";
                            $profile_image= $profile = DB::table('user_basic_info')->where(['user_id' => auth()->user()->user_id])->pluck('profile_pic')->first();
                        }
                       

            $response = [
                'latest_properties' => $latest_properties,
                'featured_properties' => $featured_properties,
                'agents' => $agents,
                'bookmarked_properties' => $bookmarked_properties,
                'added_to_compare' => $added_to_compare,
                'latest_properties_images' => $latest_properties_images,
                'featured_properties_images' => $featured_properties_images,
                'profile_message'=>$profile_message,
                'profile_image'=>$profile_image,
                'city_list'=>$city_list,
                'latest_agents_cards'=>$latest_agents_cards,
                'featured_agents_cards'=>$featured_agents_cards,
                'latest_agent_ratings'=>$latest_agent_ratings,
                
            ];

            return response()->json($response);


        }
        catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }

    public function property_list()
    {
        $Properties_list = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->latest()->get();
        $bookmarked_properties = BookmarkProperty::where('user_id', auth()->user()->user_id)->get();
        $added_to_compare = Compare::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
        $properties_images = [];

        foreach($Properties_list as $property) {
            $property_images = Property_images::where('property_id', $property->property_id)->get();
            if ($property_images->isNotEmpty()) {
                $properties_images[$property->property_id] = $property_images;
            }
        }
         $latest_agent_ratings=[];
           $latest_agents_cards = [];
          foreach($Properties_list as $latest_property)
                {
                    $property_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('agent_id')->first();
                
                    if (!empty($property_name)) {
                        $agent_details = DB::table('agent_basic_information')
                            ->where('agent_id', $property_name)
                            ->first();
                        
                        $ratings =  DB::table('agent_reviews')->where('member_id', $property_name)->avg('rating');
                        
                        $latest_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => $agent_details->agent_id,
                            'agent_name' => $agent_details->fname,
                            'agent_image' => $agent_details->file,
                            'ratings' => $ratings,
                        ];
                    }
                    else {
                        
                          $user_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('user_id')->first();
                
                    if (!empty($user_name)) {
                        
                        $latest_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => 'HOMEYs',
                            'agent_name' => 'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', $user_name)->avg('rating'),
                        ];
                    } else {
                        
                        $latest_agents_cards[] = [
                             'property_id' => $latest_property->property_id,
                            'agent_id' => 'HOMEY admin',
                            'agent_name' =>'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', 'Admin')->avg('rating'),
                            
                        ];
                    }
                       
                    }
                }

        $response = [
            'Properties_list' => $Properties_list,
            'bookmarked_properties' => $bookmarked_properties,
            'added_to_compare' => $added_to_compare,
            'properties_images' => $properties_images,
            'latest_agents_cards'=>$latest_agents_cards,
        ];

        return response()->json($response);

    }

     public function featured_properties_list()
    {
        $featured_properties_list =DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('featured','=',1)->latest()->get();
        $bookmarked_properties = BookmarkProperty::where('user_id', auth()->user()->user_id)->get();
        $added_to_compare = Compare::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
        $featured_properties_list_images = [];

        foreach($featured_properties_list as $property) {
            $property_images = Property_images::where('property_id', $property->property_id)->get();
            if ($property_images->isNotEmpty()) {
                $featured_properties_list_images[$property->property_id] = $property_images;
            }
        }
         $latest_agents_cards = [];
          foreach($featured_properties_list as $latest_property)
                {
                    $property_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('agent_id')->first();
                
                    if (!empty($property_name)) {
                        $agent_details = DB::table('agent_basic_information')
                            ->where('agent_id', $property_name)
                            ->first();
                        
                        $ratings =  DB::table('agent_reviews')->where('member_id', $property_name)->avg('rating');
                        
                        $latest_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => $agent_details->agent_id,
                            'agent_name' => $agent_details->fname,
                            'agent_image' => $agent_details->file,
                            'ratings' => $ratings,
                        ];
                    }
                    else {
                        
                          $user_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('user_id')->first();
                
                    if (!empty($user_name)) {
                        
                        $latest_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' => 'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', $user_name)->avg('rating'),
                        ];
                    } else {
                        
                        $latest_agents_cards[] = [
                             'property_id' => $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' =>'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', 'Admin')->avg('rating'),
                            
                        ];
                    }
                       
                    }
                }

        $response = [
            'featured_properties_list' => $featured_properties_list,
            'bookmarked_properties' => $bookmarked_properties,
            'added_to_compare' => $added_to_compare,
            'featured_properties_list_images' => $featured_properties_list_images,
               'latest_agents_cards'=>$latest_agents_cards,
        ];

        return response()->json($response);

    }

    public function users_property_rent_details_api($id)
    {
        $Property_details = DB::table('homeyproperties')->where('property_id', '=', $id)->get();
        $Property_images = Property_images::where('property_id', '=', $id)->get();
        $categories = DB::table('homeyproperties')->where('property_id', '=', $id)->pluck('categories')->first();
        $Property_room_list = DB::table('rooms_list')->where('property_id', $id)->get();
        $Property_room_count=DB::table('rooms_list')->where('property_id',$id)->count();
        $property_room_images_count=[];
         $Property_room_images=[];
        $Property_floor_plans = DB::table('houseplan')->where('property_id', $id)->get();
        $featured_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('featured', '=', 1)->latest()->take(3)->get();
        $similar_properties = DB::table('homeyproperties')->where('categories', '=', $categories)->where('approval_status', '=', 1)->take(5)->get();
        $featured_properties_images = [];
        $similar_properties_images=[];
        $similar_properties_agents_ratings=[];
        $property_reviews=[];
        $featured_agents_cards=[];
        $averageRating = Reviews::where('property_id','=',$id)->where('status',1)->avg('rating');
        $property_reviews_count= Reviews::where('property_id','=',$id)->where("status", 1)->where("deleted_status", 0)->count();
        $intrested_response =  DB::table('interested_property')->where('property_id', $id)
                                        ->where('user_id', auth()->user()->user_id)
                                        ->first();
       if (!empty($intrested_response->user_id)) {
            $intrested_message  = "User Already Showed interest show applied Button";
        } else {
            $intrested_message  = "Show intrest Button";
        }
    
       $agent = DB::table('homeyproperties')->where('property_id', '=', $id)->pluck('agent_id')->first();

        $agents_cards = []; // Initialize $agents_cards as an array
        
        if (!empty($agent)) {
            $agent_details = DB::table('agent_basic_information')
                ->where('agent_id', $agent)
                ->first(); // Changed pluck('fname') to first()
        
            $agents_cards['agent_name'] = $agent_details->fname;
            $agents_cards['agent_id'] = $agent_details->agent_id;
            $agents_cards['agent_image'] = $agent_details->file;
           $agents_cards['agent_rating'] =DB::table('agent_reviews')->where('member_id', $agent_details->agent_id)->avg('rating');
            
        } else {
            $agents_cards['agent_name'] = 'By Homey';
            $agents_cards['agent_id'] = "HOMEY";
            $agents_cards['agent_image'] = 'https://homeypro.co/homey/images/favicon.png';
             $user_name = DB::table('homeyproperties')->where('property_id', '=', $id)->pluck('user_id')->first();
                
                    if (!empty($user_name)) {
                         $agents_cards['agent_rating'] =DB::table('agent_reviews')->where('member_id', $user_name)->avg('rating');
                    }
                    else
                    {
                           $agents_cards['agent_rating'] =DB::table('agent_reviews')->where('member_id', 'Admin')->avg('rating'); 
                    }
                        
            
        }
        
        $agents_card = [$agents_cards];
                    
        foreach ($featured_properties as $key => $featured_property) 
        {
             $property_images = Property_images::where('property_id', $featured_property->property_id)->get();
            if ($property_images->isNotEmpty()) {
                $featured_properties_images[$featured_property->property_id] = $property_images;
            }
        }
        
        
        foreach($featured_properties as $latest_property)
                {
                    $property_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('agent_id')->first();
                
                    if (!empty($property_name)) {
                        $agent_details = DB::table('agent_basic_information')
                            ->where('agent_id', $property_name)
                            ->first();
                        
                        $ratings =  DB::table('agent_reviews')->where('member_id', $property_name)->avg('rating');
                        
                        $featured_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => $agent_details->agent_id,
                            'agent_name' => $agent_details->fname,
                            'agent_image' => $agent_details->file,
                            'ratings' => $ratings,
                        ];
                    }
                    else {
                        
                          $user_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('user_id')->first();
                
                    if (!empty($user_name)) {
                        
                        $featured_agents_cards[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' => 'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', $user_name)->avg('rating'),
                        ];
                    } else {
                        
                        $featured_agents_cards[] = [
                             'property_id' => $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' =>'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', 'Admin')->avg('rating'),
                            
                        ];
                    }
                       
                    }
                }
        
        
        
         foreach ($similar_properties as $key => $similar_property) 
        {
             $property_images = Property_images::where('property_id', $similar_property->property_id)->get();
            if ($property_images->isNotEmpty()) {
                $similar_properties_images[$similar_property->property_id] = $property_images;
            }
        }
        foreach ($Property_room_list as $key => $room) 
        { 
            $room_images=DB::table('rooms_list')->where('room_id',$room->room_id)->get();

            foreach ($room_images as $key => $room_image) {
                $property_images = Room_images::where('room_id', $room_image->room_id)->get();
                $room_images_count=Room_images::where('room_id', $room_image->room_id)->count();
                $property_room_images_count[$room_image->room_id]=$room_images_count;
            if ($property_images->isNotEmpty()) {
                $Property_room_images[$room_image->room_id] = $property_images;
            }

            }
           
        }
        
            foreach($similar_properties as $latest_property)
                {
                    $property_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('agent_id')->first();
                
                    if (!empty($property_name)) {
                        $agent_details = DB::table('agent_basic_information')
                            ->where('agent_id', $property_name)
                            ->first();
                        
                        $ratings =  DB::table('agent_reviews')->where('member_id', $property_name)->avg('rating');
                        
                        $similar_properties_agents_ratings[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => $agent_details->agent_id,
                            'agent_name' => $agent_details->fname,
                            'agent_image' => $agent_details->file,
                            'ratings' => $ratings,
                        ];
                    }
                    else {
                        
                          $user_name = DB::table('homeyproperties')->where('property_id', $latest_property->property_id)->pluck('user_id')->first();
                
                    if (!empty($user_name)) {
                        
                        $similar_properties_agents_ratings[] = [
                            'property_id' =>  $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' => 'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', $user_name)->avg('rating'),
                        ];
                    } else {
                        
                        $similar_properties_agents_ratings[] = [
                             'property_id' => $latest_property->property_id,
                            'agent_id' => 'HOMEY',
                            'agent_name' =>'BY HOMEY',
                            'agent_image' => 'https://homeypro.co/homey/images/favicon.png',
                            'ratings' => DB::table('agent_reviews')->where('member_id', 'Admin')->avg('rating'),
                            
                        ];
                    }
                       
                    }
                }
                
               $reviews = Reviews::where('property_id','=',$id)->where("status", 1)->where("deleted_status", 0)->latest()->get();
                foreach ($reviews as $review) {
                        $profilepic = DB::table('user_basic_info')
                            ->where('user_id', $review['user_id'])
                            ->pluck('profile_pic')
                            ->first();
                    
                        $user_image = !empty($profilepic) ? $profilepic : 'https://homeypro.co/homey/images/dummy-profile-pic.png';
                    
                        $existingLike = LikeReview::where('review_id', $review->id)->where('property_id', $id)->where('user_id', auth()->user()->user_id)->exists();
                        $helpful_review_count = LikeReview::where('review_id', $review->id)->where('property_id', $id)->count();
                    
                        $like_message = $existingLike ? 'already liked show dummy button with count' : 'show like button with count';
                    
                        $property_reviews[] = [
                            'user_image' => $user_image,
                            'user_name' => $review->user_name,
                            'user_rating' => $review->rating,
                            'user_message' => $review->message,
                            'date' => $review->date,
                            'like_message' => $like_message,
                            'like_count' => $helpful_review_count,
                            'review_id'=>$review->id,
                        ];
                    }
        
        $responseData = [
            'Property_details' => $Property_details,
            'Property_images' => $Property_images,
            'categories' => $categories,
            'Property_room_count'=>$Property_room_count,
            'Property_room_list' => $Property_room_list,
            'property_room_images_count'=>$property_room_images_count,
             'Property_room_images' =>$Property_room_images,
            'Property_floor_plans' => $Property_floor_plans,
            'featured_properties' => $featured_properties,
            'featured_properties_images'=>$featured_properties_images,
            'similar_properties' => $similar_properties,
            'similar_properties_images'=>$similar_properties_images,
            'intrested_message'=>$intrested_message,
            'agents_card'=> $agents_card,
            'similar_properties_agents_ratings'=>$similar_properties_agents_ratings,
            'property_reviews_count'=>$property_reviews_count,
            'property_reviews'=>$property_reviews,
            'featured_agents_cards'=>$featured_agents_cards,
            'averageRating'=>$averageRating,
           ];

        return response()->json($responseData);
    }


    public function addProperty(Request $request)
    {
          //dd($request->all());
            $data = $request->all();
            $rules=[
                     'name'=>'required',
                    ];
            $validator = Validator::make($data,$rules);
           if ($validator->fails()) 
           {
               return response()->json(['errors' => $validator->errors()], 422);
            }
            else
            {
               
                //  try{
                //          $code = Homeyproperties::orderBy('id', 'desc')->first();
                //             if($code == null)
                //             {
                //              $id = "PROP".+1;
                //             }
                //             else
                //             {
                //              $id = "PROP".$code->id+1;
                //             }
                //             if($request->file('p_image') != '')
                //             {
                //              $p_image = $id.time() .'_'.$request->file('p_image')->getClientOriginalName();
                //              $request->file('p_image')->move('uploads/properties/', $p_image); 
                //             }
                //             else
                //             {
                //              $p_image = "-";
                //             }
                //          $property = new Homeyproperties();
                //          $property->property_id = $id;
                //          $property->name = $data['name'];
                //           if (!empty($data['country'])) 
                //              {
                //               $property->country = $data['country'];
                //              }
                //         // $property->country=$data['country'];
                //          $property->type= 'Rent';
                //          if (!empty($data['price'])) 
                //              {
                //               $property->price = $data['price'];
                //              }
                //          //$property->price = $data['price'];
                //          if (!empty($data['categories'])) 
                //              {
                //               $property->categories = $data['categories'];
                //              }
                //          //$property->categories = $data['categories'];
                //          if (!empty($data['key_words'])) 
                //              {
                //               $property->key_words = $data['key_words'];
                //              }
                //          //$property->key_words = $data['key_words'];
                //          if (!empty($data['address'])) 
                //              {
                //               $property->address = $data['address'];
                //              }
                //          //$property->address = $data['address'];
                //          if (!empty($data['longitude'])) 
                //              {
                //               $property->longitude = $data['longitude'];
                //              }
                //          //$property->longitude = $data['longitude'];
                //          if (!empty($data['latitude'])) 
                //              {
                //               $property->latitude = $data['latitude'];
                //              }
                //         // $property->latitude = $data['latitude'];
                //          if (!empty($data['city'])) 
                //              {
                //               $property->city = $data['city'];
                //              }
                //          //$property->city = $data['city'];
                //          if (!empty($data['email_address'])) 
                //              {
                //               $property->email_address = $data['email_address'];
                //              }
                //          //$property->email_address = $data['email_address'];
                //          if (!empty($data['phone_no'])) 
                //              {
                //               $property->phone_no = $data['phone_no'];
                //              }
                //          //$property->phone_no = $data['phone_no'];
                //          if (!empty($data['website'])) 
                //              {
                //               $property->website = $data['website'];
                //              }
                //          //$property->website = $data['website'];
                //          if (!empty($data['area'])) 
                //              {
                //               $property->area = $data['area'];
                //              }
                //          //$property->area=$data['area'];
                //          if (!empty($data['accomodation'])) 
                //              {
                //               $property->accomodation = $data['accomodation'];
                //              }
                //          //$property->accomodation = $data['accomodation'];
                //          if (!empty($data['yard_size'])) 
                //              {
                //               $property->yard_size = $data['yard_size'];
                //              }
                //          //$property->yard_size = $data['yard_size'];
                //          if (!empty($data['bedrooms'])) 
                //              {
                //               $property->bedrooms = $data['bedrooms'];
                //              }
                //         // $property->bedrooms = $data['bedrooms'];
                //          if (!empty($data['bathrooms'])) 
                //              {
                //               $property->bathrooms = $data['bathrooms'];
                //              }
                //          //$property->bathrooms = $data['bathrooms'];
                //          if (!empty($data['garage'])) 
                //              {
                //               $property->garage = $data['garage'];
                //              }
                //          //$property->garage = $data['garage'];
                //          if (!empty($data['deatils_text'])) 
                //              {
                //               $property->deatils_text = $data['deatils_text'];
                //              }
                //          //$property->deatils_text = $data['deatils_text'];
                //          if (!empty($data['video_link'])) 
                //              {
                //               $property->video_link = $data['video_link'];
                //              }
                //          //$property->video_link =$data['video_link'];
                //         //  if (!empty($data['country'])) 
                //         //      {
                //         //       $property->country = $data['country'];
                //         //      }
                //              if (!empty($data['wifi'])) 
                //              {
                //               $property->wifi = $data['wifi'];
                //              }
                //             if (!empty($data['pool'])) 
                //             {
                //              $property->pool = $data['pool'];
                //             }
                //             if (!empty($data['security'])) 
                //             {
                //              $property->security = $data['security'];
                //             }
                //             if (!empty($data['laundry_room'])) 
                //             {
                //               $property->laundry_room = $data['laundry_room'];
                //             }
                //             if (!empty($data['equipped_kitchen'])) 
                //             {
                //               $property->equipped_kitchen = $data['equipped_kitchen'];
                //             }
                //             if (!empty($data['ac'])) 
                //             {
                //              $property->ac = $data['ac'];
                //             }
                //             if (!empty($data['parking'])) 
                //             {
                //             $property->parking = $data['parking'];
                //             }
                //          $property->properties_documents = $p_image;
                         
                //          $property->approval_status = 0;
                //          $property->user_id = auth()->user()->user_id;
                //          $property->status =0;
                //          $property->featured = 0;
                //          $property->property_deleted=0;
                //          $property->save();
                //          if ($request->has('room')) 
                //          {
                //                 foreach ($request->room as $key => $value) {
                //                     if(!empty($value))
                //                     {
                //                         $code = Room::orderBy('id', 'desc')->first();
                //                         if($code == null){
                //                          $roomid = "room".+1;
                //                         }else{
                //                          $roomid = "room".$code->id+1;
                //                         }
                                       
                //                     $room = new Room();
                //                     $room->property_id = $id;
                //                     $room->room_id = $roomid;
                //                     if (!empty($value['room_title'])) 
                //                      {
                //                       $room->room_title = $value['room_title'];
                //                      }
                //                     // $room->room_title = $value['room_title'];
                                    
                //                       if (!empty($value['additional_room'])) 
                //                      {
                //                       $room->additional_room = $value['additional_room'];
                //                      }
                //                     //$room->additional_room = $value['additional_room'];
                //                      if (!empty($value['room_details'])) 
                //                      {
                //                       $room->room_details = $value['room_details'];
                //                      }
                                    
                //                     //$room->room_details = $value['room_details'];
                //                       if (!empty($value['ac'])) {
                //                         $room->ac = $value['ac'];
                //                     }
                //                     if (!empty($value['tv'])) {
                //                         $room->tv = $value['tv'];
                //                     }
                //                       if (!empty($value['cbath'])) {
                //                         $room->cbath = $value['cbath'];
                //                     }
                //                       if (!empty($value['mic'])) {
                //                         $room->mic = $value['mic'];
                //                     }

                //                     $room->save();
                //                     if ($request->hasFile('room.' . $key)) {
                //                         foreach ($request->file('room.' . $key) as $m_image) {
                //                             $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                //                             $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                //                             $room_images = new Room_images();
                //                             $room_images->property_id = $id;
                //                             $room_images->room_id = $roomid;
                //                             $room_images->image_name =              $m_imagename;
                //                             $room_images->save();
                //                         }
                //                     } 
                //                     }
                //                 }
                //          }
                 
                //          if ($request->has('house')) 
                //          {
                //             foreach ($request->input('house') as $key => $value) 
                //             {
                //                 if ($request->hasFile('house.' . $key)) {
                //                     $h_image =$id.'_'. time() . '_' . $request->file('house.' . $key)->getClientOriginalName();
                //                     $request->file('house.' . $key)->move('uploads/properties/', $h_image);
                //                 } else {
                //                     $h_image = "-";
                //                 }
                                

                //                 $room = new House();
                //                 $room->property_id = $id;
                //                  if (!empty($value['h_plan_title'])) {
                //                         $room->plan_title = $value['h_plan_title'];
                //                     }
                                
                //               // $room->plan_title = $value['h_plan_title'];
                //                  if (!empty($value['h_plan_info'])) {
                //                         $room->plan_optional_info = $value['h_plan_info'];
                //                     }
                                
                //               // $room->plan_optional_info = $value['h_plan_info'];
                //                  if (!empty($value['h_plan_details'])) {
                //                         $room->plan_details = $value['h_plan_details'];
                //                     }
                //                 //$room->plan_details = $value['h_plan_details'];
                //                 $room->plan_image = $h_image;
                //                 $room->save();
                //             }
                //          }
                //          if($request->has('m_image'))
                //          {
                //             foreach ($request->file('m_image')as $m_image) 
                //             {
                //                   $m_imagename =$id.'m'.time() .'_'.$m_image->getClientOriginalName();
                //               $m_image->move(public_path('uploads/properties'), $m_imagename); 
                //               $property_images = new Property_images();
                //               $property_images->property_id=$id;
                //               $property_images->image_name=$m_imagename;
                //                 $property_images->added_by=auth()->user()->user_id;
                //               $property_images->save();
                //             }
                //          }

                //       return response()->json(['message' => 'Property added successfully'], 200);

                //      }
                
                
                 try {
            // Get the latest property code
            $code = Homeyproperties::orderBy('id', 'desc')->first();
            // Generate a new property ID
            if ($code == null) {
                $id = "PROP" . (1);
            } else {
                $id = "PROP" . ($code->id + 1);
            }

            // Check if a property image was uploaded
            if ($request->hasFile('p_image') && $request->file('p_image')->isValid()) {
                // Generate a unique image name
                $p_image = $id . time() . '_' . $request->file('p_image')->getClientOriginalName();
                // Move the image to the desired directory
                $request->file('p_image')->move('uploads/properties/', $p_image);
            } else {
                $p_image = "-";
            }

            // Create a new property instance
            $property = new Homeyproperties();
            // Populate property attributes
            $property->property_id = $id;
            $property->name = $request->input('name');
            $property->country = $request->input('country');
            $property->type = 'Rent';
            $property->price = $request->input('price');
            $property->categories = $request->input('categories');
            $property->key_words = $request->input('key_words');
            $property->address = $request->input('address');
            $property->longitude = $request->input('longitude');
            $property->latitude = $request->input('latitude');
            $property->city = $request->input('city');
            $property->email_address = $request->input('email_address');
            $property->phone_no = $request->input('phone_no');
            $property->website = $request->input('website');
            $property->area = $request->input('area');
            $property->accomodation = $request->input('accomodation');
            $property->yard_size = $request->input('yard_size');
            $property->bedrooms = $request->input('bedrooms');
            $property->bathrooms = $request->input('bathrooms');
            $property->garage = $request->input('garage');
            $property->deatils_text = $request->input('deatils_text');
            $property->video_link = $request->input('video_link');

            // Set optional features if provided
            if ($request->has('wifi')) {
                $property->wifi = $request->input('wifi');
            }
            if ($request->has('pool')) {
                $property->pool = $request->input('pool');
            }
            if ($request->has('security')) {
                $property->security = $request->input('security');
            }
            if ($request->has('laundry_room')) {
                $property->laundry_room = $request->input('laundry_room');
            }
            if ($request->has('equipped_kitchen')) {
                $property->equipped_kitchen = $request->input('equipped_kitchen');
            }
            if ($request->has('ac')) {
                $property->ac = $request->input('ac');
            }
            if ($request->has('parking')) {
                $property->parking = $request->input('parking');
            }

            // Set remaining property attributes
            $property->properties_documents = $p_image;
            $property->approval_status = 0;
            $property->user_id = Auth::guard('sanctum')->user()->user_id;
            $property->status = 0;
            $property->featured = 0;
            $property->property_deleted = 0;

            // Save the property to the database
            $property->save();

                try
                {
                if ($request->has('room')) {
                foreach ($request->input('room') as $key => $value) {
                if (!empty($value)) {
                // Generate a new room ID
                $code = Room::orderBy('id', 'desc')->first();
                if ($code == null) {
                $roomid = "room" . (1);
                } else {
                $roomid = "room" . ($code->id + 1);
                }
                
                // Create a new room instance
                $room = new Room();
                // Populate room attributes
                $room->property_id = $id;
                $room->room_id = $roomid;
                if (!empty($value['room_title'])) {
                $room->room_title = $value['room_title'];
                }
                //$room->room_title = $value['room_title'];
                if (!empty($value['additional_room'])) {
                $room->additional_room = $value['additional_room'];
                }
                //$room->additional_room = $value['additional_room'];
                if (!empty($value['room_details'])) {
                $room->room_details = $value['room_details'];
                }
                $room->room_details = $value['room_details'];
                
                // Set optional features if provided
                if (!empty($value['ac'])) {
                $room->ac = $value['ac'];
                }
                if (!empty($value['tv'])) {
                $room->tv = $value['tv'];
                }
                if (!empty($value['cbath'])) {
                $room->cbath = $value['cbath'];
                }
                if (!empty($value['mic'])) {
                $room->mic = $value['mic'];
                }
                
                // Save the room to the database
                $room->save();
                try {
                
                if ($request->hasFile('room.' . $key)) {
                foreach ($request->file('room.' . $key) as $m_image) {
                $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                $m_image->move(public_path('uploads/properties'), $m_imagename);
                
                $room_images = new Room_images();
                $room_images->property_id = $id;
                $room_images->room_id = $roomid;
                $room_images->image_name = $m_imagename;
                $room_images->save();
                }
                } 
                } catch (\Exception $e) {
                // Handle the exception
                return response()->json(['error' => $e->getMessage(),'error_message'=>'In Room section Images' ], 500);
                }
                
                }
                }
                }
                
                
                } catch (\Exception $e) {
                // Handle the exception
                return response()->json(['error' => $e->getMessage(),'error_message'=>'In Room section'], 500);
                }
        
                                
                try
                {
                if ($request->has('house')) {
                foreach ($request->input('house') as $key => $value) {
                if ($request->hasFile('house.' . $key) && $request->file('house.' . $key)->isValid()) {
                // Generate a unique image name
                $h_image = $id . '_' . time() . '_' . $request->file('house.' . $key)->getClientOriginalName();
                // Move the image to the desired directory
                $request->file('house.' . $key)->move('uploads/properties/', $h_image);
                } else {
                $h_image = "-";
                }
                
                // Create a new house instance
                $house = new House();
                // Populate house attributes
                $house->property_id = $id;
                $house->plan_title = $value['h_plan_title']; // Update to plan_title
                $house->plan_optional_info = $value['h_plan_info'];
                $house->plan_details = $value['h_plan_details'];
                $house->plan_image = $h_image;
                // Save the house to the database
                $house->save();
                }
                }
                
                
                } catch (\Exception $e) {
                // Handle the exception
                return response()->json(['error' => $e->getMessage(),'error_message'=>'In House Plans section'], 500);
                }


            
            // Handle houses (if applicable)
                    try
                    {
                    // Handle property images (if applicable)
                    if ($request->hasFile('m_image')) {
                    foreach ($request->file('m_image') as $m_image) {
                    // Generate a unique image name
                    $m_imagename = $id . 'm' . time() . '_' . $m_image->getClientOriginalName();
                    // Move the image to the desired directory
                    $m_image->move(public_path('uploads/properties'), $m_imagename);
                    
                    // Create a new property image instance
                    $property_images = new Property_images();
                    // Populate property image attributes
                    $property_images->property_id = $id;
                    $property_images->image_name = $m_imagename;
                    $property_images->added_by = Auth::guard('sanctum')->user()->user_id;
                    // Save the property image to the database
                    $property_images->save();
                    }
                    }
                    
                    
                    } catch (\Exception $e) {
                    // Handle the exception
                    return response()->json(['error' => $e->getMessage(),'error_message'=>'In header section'], 500);
                    }

           

            // Return a JSON response on success
            return response()->json(['message' => 'Property added successfully'], 200);
        }
                catch (\Exception $e) 
                {
           
                     return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
                }
                    
            }
    }


    public function edit_properties(Request $request, $id)
    // {
    //     $property_details = Homeyproperties::where('property_id', '=', $id)->first();
    //     $room = Room::where('property_id', '=', $id)->get();
    //     $roomcount = Room::where('property_id', '=', $id)->count();
    //     $houseplans = House::where('property_id', '=', $id)->get();
    //     $houseplanscount = House::where('property_id', '=', $id)->count();

    //     return response()->json([
    //         'property_details' => $property_details,
    //         'room' => $room,
    //         'roomcount' => $roomcount,
    //         'houseplans' => $houseplans,
    //         'houseplanscount' => $houseplanscount,
    //     ], 200);
    // }
    {
        $Property_details = DB::table('homeyproperties')->where('property_id', '=', $id)->get();


        $Property_images = Property_images::where('property_id', '=', $id)->get();
        $Property_room_count=DB::table('rooms_list')->where('property_id',$id)->count();
        $Property_room_list = DB::table('rooms_list')->where('property_id', $id)->get();
        $property_room_images_count=[];
         $Property_room_images=[];
        $Property_floor_plans = DB::table('houseplan')->where('property_id', $id)->get();
        
        foreach ($Property_room_list as $key => $room) 
        { 
            $room_images=DB::table('rooms_list')->where('room_id',$room->room_id)->get();

            foreach ($room_images as $key => $room_image) {
                $property_images = Room_images::where('room_id', $room_image->room_id)->get();
                $room_images_count=Room_images::where('room_id', $room_image->room_id)->count();
                $property_room_images_count[$room_image->room_id]=$room_images_count;
            if ($property_images->isNotEmpty()) {
   
        $Property_room_images[$room_image->room_id] = $property_images;
       
}


            }
           
        }
        
               
        
        $responseData = [
            'Property_details' => $Property_details,
            'Property_images' => $Property_images,
            'Property_room_count'=>$Property_room_count,
            'Property_room_list' => $Property_room_list,
            'property_room_images_count'=>$property_room_images_count,
             'Property_room_images' =>$Property_room_images,
            'Property_floor_plans' => $Property_floor_plans,
           ];

        return response()->json($responseData);
    }
            
     public function updateProperty(Request $request, $id)
    {
        if ($request->isMethod('post')) 
        {
            $response_code = 200;
            $message = array('error' => array('something went wrong'));
            $success = false;
            $data = $request->all();
            $rules = [
                'name' => 'required',
                // Add more validation rules as needed
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                 return response()->json(['errors' => $validator->errors()], 422);
            } else {
        //         try {
                   
        //       if ($request->hasFile('p_image')) 
        //     {
        //                             $p_image = $id.time() . '_' . $request->file('p_image')->getClientOriginalName();
        //                             $request->file('p_image')->move('uploads/properties/', $p_image);
        //                             $prop=DB::table('homeyproperties')->where('property_id',$id)->first();
        //                               $path = public_path('uploads/properties/'.$prop->p_image);
        //                                     @unlink($path);
        //     } 
        //     else 
        //     {
        //                             $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();    
        //                               $p_image = $property_details->p_image;
        //      }
        //       if (!empty($data['wifi'])) 
        //     {
        //       $wifi = $data['wifi'];
        //     }
        //      else
        //     {
        //         $wifi="";
        //     }
        //     if (!empty($data['pool'])) 
        //     {
        //     $pool = $data['pool'];
        //     }
        //     else
        //     {
        //     $pool="";
        //     }
        //     if (!empty($data['security'])) 
        //     {
        //     $security = $data['security'];
        //     }
        //     else
        //     {
        //     $security="";
        //     }
        //     if (!empty($data['laundry_room'])) 
        //     {
        //      $laundry_room = $data['laundry_room'];
        //     }
        //     else
        //   {
        //     $laundry_room="";
        //     }
        //     if (!empty($data['equipped_kitchen'])) 
        //     {
        //     $equipped_kitchen = $data['equipped_kitchen'];
        //     }
        //     else 
        //     {
        //     $equipped_kitchen="";
        //     }
        //     if (!empty($data['ac'])) 
        //     {
        //     $ac = $data['ac'];
        //     }
        //     else
        //     {
        //     $ac="";
        //     }
        //     if (!empty($data['parking'])) 
        //     {
        //     $parking = $data['parking'];
        //     }
        //     else
        //     {
        //     $parking="";
        //     }
        //       $update_array = array
        //       (
        //             "name" => $data['name'],
        //             "country"=>$data['country'],
        //             "price" => $data['price'],
        //             "categories" => $data['categories'],
        //             "key_words" => $data['key_words'],
        //             "address" => $data['address'],
        //             "longitude" => $data['longitude'],
        //             "latitude" => $data['latitude'],
        //             "city" => $data['city'],
        //             "email_address" => $data['email_address'],
        //             "phone_no" => $data['phone_no'],
        //             "website" => $data['website'],
        //             "area"=> $data['area'],
        //             "accomodation" => $data['accomodation'],
        //             "yard_size" => $data['yard_size'],
        //             "bedrooms" => $data['bedrooms'],
        //             "bathrooms" => $data['bathrooms'],
        //             "garage" => $data['garage'],
        //             "deatils_text" => $data['deatils_text'],
        //             "video_link" => $data['video_link'],
        //             "p_image"=>$p_image,
        //             "wifi" => $wifi,
        //             "pool"=>$pool,
        //             "laundry_room"=>$laundry_room,
        //             "security"=>$security,
        //             "equipped_kitchen"=>$equipped_kitchen,
        //             "parking"=>$parking,
        //             "ac"=>$ac,
                    
        //         );
        //       if($request->has('m_image'))
        //              {
        //                 foreach ($request->file('m_image')as $m_image) {
        //                       $m_imagename = $id.'m'.time() .'_'.$m_image->getClientOriginalName();
        //              $m_image->move(public_path('uploads/properties'), $m_imagename); 
        //                   $property_images = new Property_images();
        //                   $property_images->property_id=$id;
        //                   $property_images->image_name=$m_imagename;
        //                     $property_images->added_by=auth()->user()->user_id;
        //                   $property_images->save();
        //               }
        //              }
        //               if ($request->has('house')) {
        //                     foreach ($request->input('house') as $key => $value) {
        //                         if ($request->hasFile('house.' . $key)) {
        //                             $h_image = $id.'_'.time() . '_' . $request->file('house.' . $key)->getClientOriginalName();
        //                             $request->file('house.' . $key)->move('uploads/properties/', $h_image);
        //                         } else {
        //                             $h_image = "-";
        //                         }

        //                         $room = new House();
        //                         $room->property_id = $id;
        //                         $room->plan_title = $value['h_plan_title'];
        //                         $room->plan_optional_info = $value['h_plan_info'];
        //                         $room->plan_details = $value['h_plan_details'];
        //                         $room->plan_image = $h_image;
        //                         $room->save();
        //                     }
        //                 }
        //                   if ($request->has('house1')) {
        //                     foreach ($request->input('house1') as $key => $value) {
        //                         if ($request->hasFile('house1.' . $key)) {
        //                             $h_image = $id.'_'.time() . '_' . $request->file('house1.' . $key)->getClientOriginalName();
        //                             $request->file('house1.' . $key)->move('uploads/properties/', $h_image);
        //                         } else {
        //                             $property_details = DB::table('houseplan')->where('property_id','=',$id)->where('id',$value['id'])->first();    
        //                               $h_image = $property_details->plan_image;
        //                         }

        //                         $update_house=array(
        //                             "plan_title" => $value['h_plan_title'],
        //                             "plan_optional_info" => $value['h_plan_info'],
        //                             "plan_details" => $value['h_plan_details'],
        //                             "plan_image" => $h_image,
        //                         );
        //                         $affaect= House::where('property_id','=',$id)->where('id',$value['id'])->update($update_house);

        //                       }

                           
        //                 }
        //                  if ($request->has('room')) 
        //             {
        //                         foreach ($request->room as $key => $value) {
        //                               $code = Room::orderBy('id', 'desc')->first();
        //                                 if($code == null){
        //                                  $roomid = "room".+1;
        //                                 }else{
        //                                  $roomid = "room".$code->id+1;
        //                                 }
                                       
        //                             $room = new Room();
        //                             $room->property_id = $id;
        //                             $room->room_id = $roomid;
        //                             $room->room_title = $value['room_title'];
        //                             $room->additional_room = $value['additional_room'];
        //                             $room->room_details = $value['room_details'];
        //                               if (!empty($value['ac'])) {
        //                                 $room->ac = $value['ac'];
        //                             }
        //                             if (!empty($value['tv'])) {
        //                                 $room->tv = $value['tv'];
        //                             }
        //                               if (!empty($value['cbath'])) {
        //                                 $room->cbath = $value['cbath'];
        //                             }
        //                               if (!empty($value['mic'])) {
        //                                 $room->mic = $value['mic'];
        //                             }

        //                             $room->save();
                   
                                   

        //                             if ($request->hasFile('room.' . $key)) {
        //                                 foreach ($request->file('room.' . $key) as $m_image) {
        //                                     $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
        //                                     $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
        //                                     $room_images = new Room_images();
        //                                     $room_images->property_id = $id;
        //                                     $room_images->room_id = $roomid;
        //                                     $room_images->image_name = $m_imagename;
        //                                     $room_images->save();
        //                                 }
        //                             }

        //                         }
        //             }
        //               if ($request->has('room1')) 
        //             {
        //                         foreach ($request->room1 as $key => $value) {
        //                               if (!empty($value['ac'])) {
        //                                 $ac = $value['ac'];
        //                             }
        //                             else
        //                             {
        //                                 $ac="";
        //                             }
        //                             if (!empty($value['tv'])) {
        //                                 $tv = $value['tv'];
        //                             }
        //                             else
        //                             {
        //                                 $tv="";
        //                             }
        //                             if (!empty($value['cbath'])) {
        //                                 $cbath = $value['cbath'];
        //                             }
        //                             else
        //                             {
        //                                 $cbath="";
        //                             }
        //                               if (!empty($value['mic'])) {
        //                                 $mic = $value['mic'];
        //                             }
        //                             else
        //                             {
        //                                 $mic="";
        //                             }
        //                           $update_room=array(
        //                             "room_title" => $value['room_title'],
        //                             "additional_room" => $value['additional_room'],
        //                             "room_details" => $value['room_details'],
        //                             "ac"=>$ac,
        //                             "tv"=>$ac,
        //                             "cbath"=>$cbath,
        //                             "mic"=>$mic,
        //                         );
                                    
        //                              if ($request->hasFile('room1.' . $key)) {
        //                                 foreach ($request->file('room1.' . $key) as $m_image) {
        //                                     $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
        //                                     $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
        //                                     $room_images = new Room_images();
        //                                     $room_images->property_id = $id;
        //                                     $room_images->room_id = $roomid;
        //                                     $room_images->image_name = $m_imagename;
        //                                     $room_images->save();
        //                                 }
        //                             }
        //                             $affected=DB::table('rooms_list')->where('room_id',$value['room_id'])->update($update_room);

        //                         }
        //             }
                 
        //          $affectedRows = Homeyproperties::where("user_id",auth()->user()->user_id)->where('property_id',$id)->update($update_array);

        //             $success = true;
        //             $message = array('success' => array('Property updated successfully'));
        //             return response()->json(['message' => $message], $response_code);} 
        try
             {

              if ($request->hasFile('p_image')) 
            {
                                    $p_image = $id.time() . '_' . $request->file('p_image')->getClientOriginalName();
                                    $request->file('p_image')->move('uploads/properties/', $p_image);
                                    $prop=DB::table('homeyproperties')->where('property_id',$id)->first();
                                      $path = public_path('uploads/properties/'.$prop->p_image);
                                            @unlink($path);
            } 
            else 
            {
                                    $property_details = DB::table('homeyproperties')->where('property_id','=',$id)->first();    
                                      $p_image = $property_details->p_image;
             }
              if (!empty($data['wifi'])) 
            {
              $wifi = $data['wifi'];
            }
             else
            {
                $wifi="";
            }
            if (!empty($data['pool'])) 
            {
            $pool = $data['pool'];
            }
            else
            {
            $pool="";
            }
            if (!empty($data['security'])) 
            {
            $security = $data['security'];
            }
            else
            {
            $security="";
            }
            if (!empty($data['laundry_room'])) 
            {
             $laundry_room = $data['laundry_room'];
            }
            else
           {
            $laundry_room="";
            }
            if (!empty($data['equipped_kitchen'])) 
            {
            $equipped_kitchen = $data['equipped_kitchen'];
            }
            else 
            {
            $equipped_kitchen="";
            }
            if (!empty($data['ac'])) 
            {
            $ac = $data['ac'];
            }
            else
            {
            $ac="";
            }
            if (!empty($data['parking'])) 
            {
            $parking = $data['parking'];
            }
            else
            {
            $parking="";
            }
              $update_array = array
              (
                    "name" => $data['name'],
                    "country"=>$data['country'],
                    "price" => $data['price'],
                    "categories" => $data['categories'],
                    "key_words" => $data['key_words'],
                    "address" => $data['address'],
                    "longitude" => $data['longitude'],
                    "latitude" => $data['latitude'],
                    "city" => $data['city'],
                    "email_address" => $data['email_address'],
                    "phone_no" => $data['phone_no'],
                    "website" => $data['website'],
                    "area"=> $data['area'],
                    "accomodation" => $data['accomodation'],
                    "yard_size" => $data['yard_size'],
                    "bedrooms" => $data['bedrooms'],
                    "bathrooms" => $data['bathrooms'],
                    "garage" => $data['garage'],
                    "deatils_text" => $data['deatils_text'],
                    "video_link" => $data['video_link'],
                    "p_image"=>$p_image,
                    "wifi" => $wifi,
                    "pool"=>$pool,
                    "laundry_room"=>$laundry_room,
                    "security"=>$security,
                    "equipped_kitchen"=>$equipped_kitchen,
                    "parking"=>$parking,
                    "ac"=>$ac,
                     "status" =>1,
                     "approval_status"=>0,
                    
                );
              if($request->has('m_image'))
                     {
                        foreach ($request->file('m_image')as $m_image) {
                               $m_imagename = $id.'m'.time() .'_'.$m_image->getClientOriginalName();
                     $m_image->move(public_path('uploads/properties'), $m_imagename); 
                           $property_images = new Property_images();
                           $property_images->property_id=$id;
                           $property_images->image_name=$m_imagename;
                            $property_images->added_by=auth()->user()->user_id;
                           $property_images->save();
                       }
                     }
                       if ($request->has('house')) {
                            foreach ($request->input('house') as $key => $value) {
                                if(empty($value['id']))
                                {
                                if ($request->hasFile('house.' . $key)) {
                                    $h_image = $id.'_'.time() . '_' . $request->file('house.' . $key)->getClientOriginalName();
                                    $request->file('house.' . $key)->move('uploads/properties/', $h_image);
                                } else {
                                    $h_image = "-";
                                }

                                $room = new House();
                                $room->property_id = $id;
                                $room->plan_title = $value['h_plan_title'];
                                $room->plan_optional_info = $value['h_plan_info'];
                                $room->plan_details = $value['h_plan_details'];
                                $room->plan_image = $h_image;
                                $room->save();
                            }
                            else
                            {
                                if ($request->hasFile('house1.' . $key)) {
                                    $h_image = $id.'_'.time() . '_' . $request->file('house1.' . $key)->getClientOriginalName();
                                    $request->file('house1.' . $key)->move('uploads/properties/', $h_image);
                                } else {
                                    $property_details = DB::table('houseplan')->where('property_id','=',$id)->where('id',$value['id'])->first();    
                                      $h_image = $property_details->plan_image;
                                }

                                $update_house=array(
                                    "plan_title" => $value['h_plan_title'],
                                    "plan_optional_info" => $value['h_plan_info'],
                                    "plan_details" => $value['h_plan_details'],
                                    "plan_image" => $h_image,
                                );
                                $affaect= House::where('property_id','=',$id)->where('id',$value['id'])->update($update_house);
                                
                            }
                            }
                        }
                          if ($request->has('house1')) {
                            foreach ($request->input('house1') as $key => $value) 
                            {
                                if ($request->hasFile('house1.' . $key)) {
                                    $h_image = $id.'_'.time() . '_' . $request->file('house1.' . $key)->getClientOriginalName();
                                    $request->file('house1.' . $key)->move('uploads/properties/', $h_image);
                                } else {
                                    $property_details = DB::table('houseplan')->where('property_id','=',$id)->where('id',$value['id'])->first();    
                                      $h_image = $property_details->plan_image;
                                }

                                $update_house=array(
                                    "plan_title" => $value['h_plan_title'],
                                    "plan_optional_info" => $value['h_plan_info'],
                                    "plan_details" => $value['h_plan_details'],
                                    "plan_image" => $h_image,
                                );
                                $affaect= House::where('property_id','=',$id)->where('id',$value['id'])->update($update_house);

                              }

                           
                        }
                         if ($request->has('room')) 
                    {
                    
                                foreach ($request->room as $key => $value) {
                                        if(empty($value['room_id']))
                        {
                               $code = Room::orderBy('id', 'desc')->first();
                                        if($code == null){
                                         $roomid = "room".+1;
                                        }else{
                                         $roomid = "room".$code->id+1;
                                        }
                                       
                                    $room = new Room();
                                    $room->property_id = $id;
                                    $room->room_id = $roomid;
                                    //$room->room_title = $value['room_title'];
                                    $room->room_title = "dfhg rr";
                                    $room->additional_room = $value['additional_room'];
                                    $room->room_details = $value['room_details'];
                                      if (!empty($value['ac'])) {
                                        $room->ac = $value['ac'];
                                    }
                                    if (!empty($value['tv'])) {
                                        $room->tv = $value['tv'];
                                    }
                                      if (!empty($value['cbath'])) {
                                        $room->cbath = $value['cbath'];
                                    }
                                      if (!empty($value['mic'])) {
                                        $room->mic = $value['mic'];
                                    }

                                    $room->save();
                   
                                   

                                    if ($request->hasFile('room.' . $key)) {
                                        foreach ($request->file('room.' . $key) as $m_image) {
                                            $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                                            $room_images = new Room_images();
                                            $room_images->property_id = $id;
                                            $room_images->room_id = $roomid;
                                            $room_images->image_name = $m_imagename;
                                            $room_images->save();
                                        }
                                    }
                            
                        }
                        else
                        {
                             if (!empty($value['ac'])) {
                                        $ac = $value['ac'];
                                    }
                                    else
                                    {
                                        $ac="";
                                    }
                                    if (!empty($value['tv'])) {
                                        $tv = $value['tv'];
                                    }
                                    else
                                    {
                                        $tv="";
                                    }
                                    if (!empty($value['cbath'])) {
                                        $cbath = $value['cbath'];
                                    }
                                    else
                                    {
                                        $cbath="";
                                    }
                                      if (!empty($value['mic'])) {
                                        $mic = $value['mic'];
                                    }
                                    else
                                    {
                                        $mic="";
                                    }
                                   $update_room=array(
                                    "room_title" => $value['room_title'],
                                    "additional_room" => $value['additional_room'],
                                    "room_details" => $value['room_details'],
                                    "ac"=>$ac,
                                    "tv"=>$ac,
                                    "cbath"=>$cbath,
                                    "mic"=>$mic,
                                );
                                    
                                     if ($request->hasFile('room.' . $key)) {
                                        foreach ($request->file('room.' . $key) as $m_image) {
                                            $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                                            $room_images = new Room_images();
                                            $room_images->property_id = $id;
                                            $room_images->room_id = $roomid;
                                            $room_images->image_name = $m_imagename;
                                            $room_images->save();
                                        }
                                    }
                                    $affected=DB::table('rooms_list')->where('room_id',$value['room_id'])->update($update_room); 
                        }
                                   

                                }
                    }
                       if ($request->has('room1')) 
                    {
                                foreach ($request->room1 as $key => $value) {
                                      if (!empty($value['ac'])) {
                                        $ac = $value['ac'];
                                    }
                                    else
                                    {
                                        $ac="";
                                    }
                                    if (!empty($value['tv'])) {
                                        $tv = $value['tv'];
                                    }
                                    else
                                    {
                                        $tv="";
                                    }
                                    if (!empty($value['cbath'])) {
                                        $cbath = $value['cbath'];
                                    }
                                    else
                                    {
                                        $cbath="";
                                    }
                                      if (!empty($value['mic'])) {
                                        $mic = $value['mic'];
                                    }
                                    else
                                    {
                                        $mic="";
                                    }
                                   $update_room=array(
                                    "room_title" => $value['room_title'],
                                    "additional_room" => $value['additional_room'],
                                    "room_details" => $value['room_details'],
                                    "ac"=>$ac,
                                    "tv"=>$ac,
                                    "cbath"=>$cbath,
                                    "mic"=>$mic,
                                );
                                    
                                     if ($request->hasFile('room1.' . $key)) {
                                        foreach ($request->file('room1.' . $key) as $m_image) {
                                            $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                                            $room_images = new Room_images();
                                            $room_images->property_id = $id;
                                            $room_images->room_id = $roomid;
                                            $room_images->image_name = $m_imagename;
                                            $room_images->save();
                                        }
                                    }
                                    $affected=DB::table('rooms_list')->where('room_id',$value['room_id'])->update($update_room);
                                    

                                }
                    }
                 
                 $affectedRows = Homeyproperties::where("user_id",auth()->user()->user_id)->where('property_id',$id)->update($update_array);

                    $success = true;
                $message = array('success'=>array('Property updated successfull'));
                   return  response()->json(['message' => $message], 200); 


                }
                catch (\Exception $e) {
                    // Handle the exception and return an error response
                    return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
                }
            }
        }
        return response()->json(['error' => 'Invalid request method'], 405);
    
    }

    function deleteimages(Request $request, $id)
    {
        try {
            $imagename = DB::table('property_images')->where('ID', $id)->first();
            $path = public_path('uploads/properties/' . $imagename->image_name);
            @unlink($path);
            $images = DB::table('property_images')->where('id', $id)->delete();

            $message = array('success' => array('Image deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deleteroomimages(Request $request, $id)
    {
        try {
            $imagename = DB::table('room_images')->where('id', $id)->first();
            $path = public_path('uploads/properties/' . $imagename->image_name);
            @unlink($path);
            $images = DB::table('room_images')->where('id', $id)->delete();

            $message = array('success' => array('Image deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deletehouseimages(Request $request, $id)
    {
        try {
            $imagename = DB::table('houseplan')->where('ID', $id)->first();
            $path = public_path('uploads/properties/' . $imagename->plan_image);
            @unlink($path);
            $images = DB::table('houseplan')->where('ID', $id)->update(['plan_image' => null]);

            $message = array('success' => array('Image deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deleteroomsection(Request $request, $id)
    {
        try {
            $roomimages = DB::table('room_images')->where('room_id', $id)->get();

            foreach ($roomimages as $imagesname) {
                $path = public_path('uploads/properties/' . $imagesname->image_name);
                @unlink($path);
                DB::table('room_images')->where('id', $imagesname->id)->delete();
            }

            $affect = DB::table('rooms_list')->where('room_id', $id)->delete();

            $message = array('success' => array('Room deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    function deletehousesection(Request $request, $id)
    {
        try {
            $imagename = DB::table('houseplan')->where('ID', $id)->first();
            $path = public_path('uploads/properties/' . $imagename->plan_image);
            @unlink($path);

            $images = DB::table('houseplan')->where('ID', $id)->delete();

            $message = array('success' => array('House deleted successfully!!'));
            return response()->json(['message' => $message], 200); // HTTP status 200 for success

        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
        }
    }

    // function deleteproperty(Request $request, $id)
    // {
    //   try {
    //         $deleteproperty = DB::table('homeyproperties')->where('property_id', $id)->delete();
    //         $rooms = DB::table('rooms_list')->where('property_id', $id)->get();

    //         foreach ($rooms as $room) {
    //             DB::table('rooms_list')->where('room_id', $room->room_id)->delete();

    //             $roomimages = DB::table('room_images')->where('room_id', $room->room_id)->get();

    //             foreach ($roomimages as $imagesname) {
    //                 $path = public_path('uploads/properties/' . $imagesname->image_name);
    //                 @unlink($path);
    //                 DB::table('room_images')->where('id', $imagesname->id)->delete();
    //             }
    //         }

    //         $houseplans = DB::table('houseplan')->where('property_id', $id)->get();

    //         foreach ($houseplans as $value) {
    //             $imagename = DB::table('houseplan')->where('ID', $value->id)->first();
    //             $path = public_path('uploads/properties/' . $imagename->plan_image);
    //             @unlink($path);
    //             DB::table('houseplan')->where('ID', $value->id)->delete();
    //         }

    //         $message = array('success' => array('Property deleted successfully!!'));
    //         return response()->json(['message' => $message], 200); // Changed response_code to 200

    //     } 
    //     catch (\Exception $e) {
    //         // Handle the exception and display the error message
    //         return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); // Internal Server Error
    //     }
    // }
    
     public function deleteproperty(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();

            try 
            {
       
              $update_array = array(
                           
                            "property_deleted" => 1,
                            "status"=>1,
                         );
        
                        $affectedRows =Homeyproperties::where("user_id",auth()->user()->user_id)->where('property_id','=',$id)->update($update_array);
                    
                    return response()->json(['message' => 'Property Successfully Deleted'], 200);
         
                
                
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
     public function hide_property(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();

            try 
            {
       
              $update_array = array(
                           
                            "status"=>1,
                         );
        
                        $affectedRows =Homeyproperties::where("user_id",auth()->user()->user_id)->where('property_id','=',$id)->update($update_array);
                    
                    return response()->json(['message' => 'Property Successfully Deleted'], 200);
         
                
                
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
 public function show_property(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();

            try 
            {
       
              $update_array = array(
                            "status"=>0,
                         );
        
                        $affectedRows =Homeyproperties::where("user_id",auth()->user()->user_id)->where('property_id','=',$id)->update($update_array);
                    
                    return response()->json(['message' => 'Property Successfully Deleted'], 200);
         
                
                
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }


    public function user_added_properties()
    {
        try
        {
            
            $userproperties = Homeyproperties::where('user_id',auth()->user()->user_id)->where('property_deleted', 0)->latest()->get();
            
            $userproperties_images = [];
            

            foreach($userproperties as $property) {
                $property_images = Property_images::where('property_id', $property->property_id)->get();
                if ($property_images->isNotEmpty()) {
                    $userproperties_images[$property->property_id] = $property_images;
                }
            }
            // $userproperties=Homeyproperties::where('user_id',Auth::guard('sanctum')->user()->user_id)->get();
            $response =[
                'userproperties'=>$userproperties,
                'userproperties_images'=>$userproperties_images,
                ];
            return response()->json($response);


        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
  

    }

    public function user_bookmarked_properties()
    {
        try
        {
            $user_bookmarked_properties=BookmarkProperty::where('user_id',Auth::guard('sanctum')->user()->user_id)->get();
           $properties = [];
                $images = [];

                foreach ($user_bookmarked_properties as $user_bookmarked_propertie) {
                    $property = Homeyproperties::where('property_id', $user_bookmarked_propertie->property_id)->first();
                    $property_images = Property_images::where('property_id', $user_bookmarked_propertie->property_id)->get();

                    if ($property) {
                        $properties[] = $property;
                    }

                    if ($property_images) {
                        $images[$user_bookmarked_propertie->property_id] = $property_images;
                    }
                }

                $response = [
                    'user_bookmarked_properties' => $user_bookmarked_properties,
                    'properties' => $properties,
                    'images' => $images,
                ];

                return response()->json($response);


        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
  

    }

    public function user_application_responses()
     {
        //  try
        // {
            
            
            
            
        //     $application = Application::where('user_id',auth()->user()->user_id)->get();
        //     $properties=[];
        //     $username=[];
        //      foreach ($application as $user_application) {
        //             $property = Homeyproperties::where('property_id', $user_application->property_id)->first();
        //             $user= User::where('user_id',$user_application->user_id)->first();

        //             if ($property) {
        //                 $properties[] = $property;
        //             }
        //             if($user)
        //             {
        //                 $username[$user->user_id]=$user->name;
                        
        //             }
        //         }
        //         $response=[
        //             'application'=>$application,
        //             'properties'=>$properties,
        //             'username'=>$username,
        //         ];

        //     return response()->json($response);
        // }
         try
        {
           $application = Application::where('user_id',auth()->user()->user_id)->get();
        
        $application_list = [];
        
            foreach ($application as $user_application) {
                $property = Homeyproperties::where('property_id', $user_application->property_id)->first();
                $user = User::where('user_id', $user_application->user_id)->first();
                $user_info=UserInfo::where('user_id', $user_application->user_id)->first();
            
                // $application = Application::where('user_id', $user_application->user_id)
                //                         ->where('property_id', $user_application->property_id)
                //                         ->where('agent_id', auth()->user()->user_id)
                //                         ->first();
            
                if ($property && $user) {
                    $application_list[] = [
                        'property_name' => $property->name,
                        'user_name' => $user->name,
                        'application_id'=>$user_application->ID,
                        'application' => !empty($user_application) ? 
                            ($user_application->application_status == 0 ?(!empty($user_info)?'Submit Your Application':
                            'Show Profile Settings')  : 'Application Submitted') :'Submit Your Application' ,
                        'application_received' => !empty($user_application) ? $user_application->created_at : null,
                        'application_status' => $user_application->approval_status == '' ? 'Pending' : 
                            ($user_application->approval_status == 1 ? 'Approved' : 'Rejected'),
                        'property_status' => $property->status == 0 ? 'Active' : 
                            ($property->status == 1 && $property->property_deleted == 1 ? 'Deleted' : 'Inactive')
                    ];
                }
            }

        
        $response = [
            'application_list' => $application_list,
        ];
        
        return response()->json($response);


         
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    
     public function user_application_details(Request $request, $id)
     {
         try
        {
            $application = Application::where('ID',$id)->get();
            $properties=[];
            $userdetails=[];
             foreach ($application as $user_application) {
                    $property = Homeyproperties::where('property_id', $user_application->property_id)->first();
                    $user= UserInfo::where('user_id',$user_application->user_id)->first();

                    if ($property) {
                        $properties[] = $property;
                    }
                    if($user)
                    {
                        $userdetails[$user->user_id]=$user;
                        
                    }
                }
                $response=[
                    'application'=>$application,
                    'properties'=>$properties,
                    'userdetails'=>$userdetails,
                ];

            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
       public function user_application_update(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
               'aadhar_card' => 'required',
            'present_address' => 'required',
            'employee_status' => 'required',
            'pan_no' => 'required',
            ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            try 
            {
                    $update_arr = [
                "aadhar_card" => $request->input('aadhar_card'),
                "present_address" => $request->input('present_address'),
                "application_status" => 1,
                "employee_status" => $request->input('employee_status'),
                "pan_no" => $request->input('pan_no'),
                "updated_at" => now(),
              ];

            // Update the application details
            Application::where("user_id", auth()->user()->user_id)
                ->where('ID', $id)
                ->update($update_arr);

                return response()->json(['message' => 'Details Updated Successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    
      public function user_application_delete(Request $request, $id)
    {
        // dd($request->all());
      
        $data = $request->all();
        
        // Delete the entry from the 'compare' table
        DB::table('application')
            ->where('user_id', auth()->user()->user_id)
            ->where('ID', $id)
            ->delete();

        $success = true;
        $message = ['success' => ['Application Deleted successfully']];

        // Return a JSON response for the API
        return response()->json([ 'success' => $success, 'message' => $message], 200);
    }

    public function user_intrested_properties()
    {
        try
            {
                // $user_intrested_properties = InterstedProperty::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
                // $user_intrested_properties_list = [];
                // $properties_images = [];

                // foreach ($user_intrested_properties as $user_intrested_propertie) {
                //     $property = Homeyproperties::where('property_id', $user_intrested_propertie->property_id)->first();
                //     $property_images = Property_images::where('property_id', $user_intrested_propertie->property_id)->get();

                //     if ($property) {
                //         $user_intrested_properties_list[] = $property;
                //     }

                //     if ($property_images) {
                //         $properties_images[$user_intrested_propertie->property_id] = $property_images;
                //     }
                // }

                // $response = [
                //     'user_intrested_properties' => $user_intrested_properties,
                //     'user_intrested_properties_list' => $user_intrested_properties_list,
                //     'properties_images' => $properties_images,
                // ];

                // return response()->json($response);
                 $user_applications = InterstedProperty::where('user_id', Auth::guard('sanctum')->user()->user_id)->get();
                $properties = [];
                $images = [];

                foreach ($user_applications as $user_application) {
                    $property = Homeyproperties::where('property_id', $user_application->property_id)->first();
                    $property_images = Property_images::where('property_id', $user_application->property_id)->get();

                    if ($property) {
                        $properties[] = $property;
                    }

                    if ($property_images) {
                        $images[$user_application->property_id] = $property_images;
                    }
                }

                $response = [
                    'user_application' => $user_applications,
                    'properties' => $properties,
                    'images' => $images,
                ];

                return response()->json($response);
            }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
    }

    public function user_dashboard()
    {
        try
        {
         
        $intersted = InterstedProperty::where('user_id', auth()->user()->user_id)->count();
            $bookmark = DB::table('bookmark_property')->where('user_id', auth()->user()->user_id)->count();
            $total_verified_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->count();
            $latest_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->latest()->take(6)->get();
            $latestBookmarkProperty = BookmarkProperty::where('user_id', auth()->user()->user_id)->latest()->take(4)->get();
            $latest_properties_images=[];
            $latest_bookmarked_properties_names=[];
            
            $check = Homeyproperties::where("user_id", Auth::guard('sanctum')->user()->user_id)->where('approval_status', '=', 1 )->where('property_deleted', 0)->count();
            
            if(!empty($check)) {
                $dashboard_message = "Show Owner And User Dashboard";
            } else {
                $dashboard_message = "Show User Dashboard";
            }
            
            foreach($latestBookmarkProperty as $latestBookmarkProperties)
            {
                $properties=Homeyproperties::where('property_id',$latestBookmarkProperties->property_id )->get();
                if($properties->isNotEmpty())
                {
                    $latest_bookmarked_properties_names[$latestBookmarkProperties->property_id ]=$properties;
                }
            }
            
        
            
            foreach($latest_properties as $property) {
                $property_images = Property_images::where('property_id', $property->property_id)->get();
                if ($property_images->isNotEmpty()) {
                    $latest_properties_images[$property->property_id] = $property_images;
                }
            }
            
            
            
            $user_id = auth()->user()->user_id;
            
            $response = [
                'intersted' => $intersted,
                'bookmark' => $bookmark,
                'total_verified_properties' => $total_verified_properties,
                'latest_properties' => $latest_properties,
                'latestBookmarkProperty' => $latestBookmarkProperty,
                'latest_bookmarked_properties_names'=>$latest_bookmarked_properties_names,
                'latest_properties_images' => $latest_properties_images,
                'check' => $check,
                'user_id' => $user_id,
                'dashboard_message' => $dashboard_message,
            ];
            
            return response()->json($response);

        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

        
    }

    public function owner_dashboard()
    {
        try
        {
        $propertys =  Homeyproperties::where("user_id",auth()->user()->user_id)->where('approval_status','=', 1 )->where('status', 0)->where('property_deleted', 0)->count();
        $intersted = InterstedProperty::where('agent_id',auth()->user()->user_id)->count();
        $bookmark =   DB::table('bookmark_property')->where('agent_id',auth()->user()->user_id)->count();
        $application = DB::table('application')->where('agent_id',auth()->user()->user_id)->where('approval_status',1)->count();
        $latest_properties = DB::table('homeyproperties')->where('approval_status', '=', 1)->where('status', 0)->where('property_deleted', 0)->where('user_id',auth()->user()->user_id)->latest()->take(6)->get();
            $latest_properties_images=[];
         foreach($latest_properties as $property) {
                $property_images = Property_images::where('property_id', $property->property_id)->get();
                if ($property_images->isNotEmpty()) {
                    $latest_properties_images[$property->property_id] = $property_images;
                }
            }
        
         $response=
         [
            'propertys'=>$propertys,
            'intersted' =>$intersted,
            'bookmark'=> $bookmark,
            'application'=>$application,
            'latest_properties'=>$latest_properties,
            'latest_properties_images'=>$latest_properties_images,
         ];
         return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
    }

    public function owner_intrested_properties()
    {
        try
        {
           $intersted = InterstedProperty::where('agent_id', auth()->user()->user_id)->get();
        
        $intrested_users_list = [];
        
        foreach ($intersted as $user_application) {
            $property = Homeyproperties::where('property_id', $user_application->property_id)->first();
            $user = User::where('user_id', $user_application->user_id)->first();
            
            $application = Application::where('user_id', $user_application->user_id)
                                    ->where('property_id', $user_application->property_id)
                                    ->where('agent_id', auth()->user()->user_id)
                                    ->first();
        
            if ($property && $user) {
                $intrested_users_list[] = [
                    'property_name' => $property->name,
                    'user_name' => $user->name,
                    'application_status' => !empty($application) ? 
                        ($application->application_status == 0 ? 'Null' : 'Application Submitted') : 
                        'Application Not Sent',
                    'application_received_at' => !empty($application) ? $application->created_at : null,
                    'property_status' => $property->status == 0 ? 'Active' : 
                        ($property->status == 1 && $property->property_deleted == 1 ? 'Deleted' : 'Inactive')
                ];
            }
        }
        
        $response = [
            'intrested_users_list' => $intrested_users_list,
        ];
        
        return response()->json($response);


         
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
        
    }

    public function owner_application_responses()
    {
        //  try
        // {
        //     $application = Application::where('agent_id',auth()->user()->user_id)->get();
        //     $properties=[];
        //     $username=[];
        //      foreach ($application as $user_application) {
        //             $property = Homeyproperties::where('property_id', $user_application->property_id)->first();
        //             $user= User::where('user_id',$user_application->user_id)->first();

        //             if ($property) {
        //                 $properties[] = $property;
        //             }
        //             if($user)
        //             {
        //                 $username[$user->user_id]=$user->name;
                        
        //             }
        //         }
        //         $response=[
        //             'application'=>$application,
        //             'properties'=>$properties,
        //             'username'=>$username,
        //         ];

        //     return response()->json($response);
        // }
        try
        {
           $application = Application::where('agent_id',auth()->user()->user_id)->get();
        
        $application_list = [];
        
            foreach ($application as $user_application) {
                $property = Homeyproperties::where('property_id', $user_application->property_id)->first();
                $user = User::where('user_id', $user_application->user_id)->first();
            
                // $application = Application::where('user_id', $user_application->user_id)
                //                         ->where('property_id', $user_application->property_id)
                //                         ->where('agent_id', auth()->user()->user_id)
                //                         ->first();
            
                if ($property && $user) {
                    $application_list[] = [
                        'property_name' => $property->name,
                        'user_name' => $user->name,
                        'application_id'=>$user_application->ID,
                        'application_Pending' => !empty($user_application) ? 
                            ($user_application->application_status == 0 ? 'Pending At User' : 'Application Submitted') : 
                            'Submit Your Application',
                        'application_received' => !empty($user_application) ? $user_application->created_at : null,
                        'application_status' => $user_application->approval_status == '' ? 'Pending' : 
                            ($user_application->approval_status == 1 ? 'approved' : 'rejected'),
                        'property_status' => $property->status == 0 ? 'Active' : 
                            ($property->status == 1 && $property->property_deleted == 1 ? 'Deleted' : 'Inactive')
                    ];
                }
            }

        
        $response = [
            'application_list' => $application_list,
        ];
        
        return response()->json($response);


         
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    public function owner_aggrement_details()
    {
       $propertys = Homeyproperties::where("user_id",auth()->user()->user_id)->where('approval_status','=', 1 )->count();
      if($propertys>= 1)
      {
        try
      
        {
           $agreement= Agreement::where('member_id',auth()->user()->user_id )->get();
           $properties=[];
             foreach ($agreement as $agreements) {
                    $property = Homeyproperties::where('property_id', $agreements->property_id)->first();
                  

                    if ($property) {
                        $properties[] = $property;
                    }
                  
                }
                $response=[
                    'agreement'=>$agreement,
                    'properties'=>$properties,
                   
                ];
            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }
      }
      else
      {
         return response()->json(['error' => 'An error occurred: '], 500);

      }
    }


    public function show_intrest(Request $request, $id)
    {
        try
        {
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
        $apply->user_id = auth()->user()->user_id;
        $apply->agent_id = $vid;
        // $apply->property_type = Homeyproperties::where('id','=',$id)->pluck('property_type')->first();
        $apply->status = 'Intersted';
        $apply->save();
        $message= 'Intrest submitted successfully';
        return response()->json($message,200);

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function user_contact_us(Request $request)
    {
        try{
             $data = $request->all();
        $formattedDate = date('Y-m-d', strtotime($data['datepicker-here']));
        $contact = new Contactus();
        $contact->name = $data['name'];
        $contact->user_id=auth()->user()->user_id;
        $contact->phone = $data['phone'];
        $contact->date=$formattedDate;
        $contact->time=$data['time'];
        $contact->save();
        $message="We will get Back Soon...!!!";
            
        return response()->json($message,200);

        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);       
             }
       
    }

    public function compare_properties(Request $request,$id)
    {
    try {
    $count = Compare::where('user_id', auth()->user()->user_id)->count();
    if ($count <= 4) {
        $compare_list = Compare::where('user_id', auth()->user()->user_id)->where('property_id', $id)->first();

        if (!empty($compare_list)) {
            $message = 'Already added to Compare';
            return response()->json(['message' => $message], 500);
        } else {
            $data = $request->all();
            $insert_array = [
                "user_id" => auth()->user()->user_id,
                "property_id" => $id,
            ];
            DB::table('compare')->insert($insert_array);
            $message = ['success' => ['Compare Added successfully']];
            return response()->json($message, 200);
        }
    } else {
        return response()->json(['error' => 'Property container have been full']);
    }
} catch (\Exception $e) {
    // Handle the exception and display the error message
    return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
}

  }

   public function user_profile_details()
    {
        try
        {
            $userinfo = UserInfo::where('user_id', auth()->user()->user_id)->get();
            $user = User::where('user_id', auth()->user()->user_id)->get();

            if (!$userinfo || !$user) {
                return response()->json(['error' => 'User information not found'], 404);
            }

            $response = [
                'userinfo' => $userinfo,
                'user' => $user,
            ];

            return response()->json($response, 200);   
        }
        catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }



   public function bookmark_property(Request $request,$id)
    {
      try {
            $bookmark_property = BookmarkProperty::where('user_id', auth()->user()->user_id)->where('property_id', $id)->get();

            if (!$bookmark_property->isEmpty()) {
                $success = false;
                $message = 'Already added to Bookmark';
                return response()->json(['message' => $message, 'success' => $success], 500);
            } else {
                $property = DB::table('bookmark_property')->get();
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

                $apply = new BookmarkProperty();
                $apply->property_id = $id;
                $apply->user_id = auth()->user()->user_id;
                $apply->agent_id = $vid;
                $apply->property_type = "RENT";
                $apply->status = 'Success';
                $apply->save();

                $success = true;
                $message = ['success' => ['User Details Added successfully']];
                return response()->json(['message' => $message, 'success' => $success], 200);
            }
        } catch (\Exception $e) {
            // Handle the exception and display the error message
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }

    }
 
   function user_profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'address' => 'required',
                'nationality' => 'required',
                'profile_pic' => 'required',
            ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            try 
            {
                if($request->file('profile_pic') != '')
                         {
                            $imageName = time() .'_'.$request->file('profile_pic')->getClientOriginalName();
                            $request->file('profile_pic')->move('uploads/user-profile/', $imageName); 
                            }else{
                                $imageName = "-";
                            }
                            if($request->file('cover_pic') != ''){
                             $cover_pic = time() .'_'.$request->file('cover_pic')->getClientOriginalName();
                            $request->file('cover_pic')->move('uploads/user-profile/', $cover_pic); 
                            }else{
                                $cover_pic = "-";
                            }

                $insert_array = [
                    "user_id" => auth()->user()->user_id,
                    "first_name" => $request->input('first_name'),
                    "last_name" => $request->input('last_name', ''), // You can set default values here
                    "email" => $request->input('email'),
                    "address" => $request->input('address'),
                    "gender" => $request->input('gender', ''), // Add default value if needed
                    "profile_pic" => $imageName,
                    "cover_pic" => $cover_pic, // Assuming there's no cover pic in API request
                    "note" => $request->input('note', ''), // Add default value if needed
                    "phone_no" => $request->input('phone_no'),
                    "nationality" => $request->input('nationality'),
                ];

                DB::table('user_basic_info')->insert($insert_array);

                return response()->json(['message' => 'Profile added successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);
    }
    
    
    public function update_profile(Request $request)
    {
        // if ($request->isMethod('put')) {
        //     try {
        //         $response_code = 200;
        //         $message = ['error' => ['something went wrong']];
        //         $success = false;
        //         $data = $request->all();

        //         $rules = [
        //             'first_name' => 'required',
        //             'email' => 'required',
        //             'phone_no' => 'required',
        //             'address' => 'required',
        //             'nationality' => 'required',
        //             //'profile_pic' => 'required',
        //         ];

        //         $validator = Validator::make($data, $rules);

        //         if ($validator->fails()) {
        //             return response()->json([
        //                 'success' => $success,
        //                 'message' => $message,
        //                 'errors' => $validator->errors()
        //             ], $response_code);
        //         } else {
                    
        //               if($request->file('profile_pic') != ''){
        //             $profile_pic = $request->file('profile_pic')->getClientOriginalName();
        //             $request->file('profile_pic')->move('uploads/user-profile/', $profile_pic); 
        //             $property_details = DB::table('user_basic_info')->where('user_id','=',auth()->user()->user_id)->first();
        //             $path = public_path('uploads/user-profile/'. $property_details->profile_pic);
        //             @unlink($path);
        //         }
        //         else
        //         {
        //             $property_details = DB::table('user_basic_info')->where('user_id','=',auth()->user()->user_id)->first();    
        //             $profile_pic = $property_details->profile_pic;
        //         }
        //         if($request->file('cover_pic') != '')
        //         {
        //             $cover_pic = $request->file('cover_pic')->getClientOriginalName();
        //             $request->file('cover_pic')->move('uploads/user-profile/', $cover_pic); 
        //             $property_details = DB::table('user_basic_info')->where('user_id','=',auth()->user()->user_id)->first();
        //             $path = public_path('uploads/user-profile/'. $property_details->cover_pic);
        //             @unlink($path);
        //         }
        //         else
        //         {
        //             $property_details = DB::table('user_basic_info')->where('user_id','=',auth()->user()->user_id)->first();    
        //             $cover_pic = $property_details->cover_pic;
        //         }  

        //             // Update user information
        //             $update_arr = [
        //                 "first_name" => $data['first_name'],
        //                 "last_name" => $data['last_name'],
        //                 "email" => $data['email'],
        //                 "address" => $data['address'],
        //                 "gender" => $data['gender'],
        //               "profile_pic" => $profile_pic,
        //                 "phone_no" => $data['phone_no'],
        //                 "nationality" => $data['nationality'],
        //                 'updated_at' =>    date('Y-m-d H:i:s'),
        //                 "cover_pic" => $cover_pic,
        //                 "note" => $data["note"],
        //             ];

        //             $affectedRows = UserInfo::where("user_id", auth()->user()->user_id)->update($update_arr);

        //             return response()->json([
        //                 'success' => true,
        //                 'message' => 'Profile updated successfully!!',
        //                 'data' => $update_arr
        //             ], $response_code);
        //         }
        //     } catch (\Exception $e) {
        //         // Handle the exception and return an error response
        //         return response()->json([
        //             'success' => false,
        //             'message' => 'An error occurred: ' . $e->getMessage()
        //         ], 500);
        //     }
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Invalid request method'
        //     ], 405);
        // }
        
          if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'address' => 'required',
                'nationality' => 'required',
                // 'profile_pic' => 'required',
            ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            try 
            {
                        if($request->file('profile_pic') != ''){
                        $profile_pic = $request->file('profile_pic')->getClientOriginalName();
                        $request->file('profile_pic')->move('uploads/user-profile/', $profile_pic); 
                        $property_details = DB::table('user_basic_info')->where('user_id','=',auth()->user()->user_id)->first();
                        $path = public_path('uploads/user-profile/'. $property_details->profile_pic);
                        @unlink($path);
                    }
                    else
                    {
                        $property_details = DB::table('user_basic_info')->where('user_id','=',auth()->user()->user_id)->first();    
                        $profile_pic = $property_details->profile_pic;
                    }
                    if($request->file('cover_pic') != '')
                    {
                        $cover_pic = $request->file('cover_pic')->getClientOriginalName();
                        $request->file('cover_pic')->move('uploads/user-profile/', $cover_pic); 
                        $property_details = DB::table('user_basic_info')->where('user_id','=',auth()->user()->user_id)->first();
                        $path = public_path('uploads/user-profile/'. $property_details->cover_pic);
                        @unlink($path);
                    }
                    else
                    {
                        $property_details = DB::table('user_basic_info')->where('user_id','=',auth()->user()->user_id)->first();    
                        $cover_pic = $property_details->cover_pic;
                    }

                $update_array = [
                    "user_id" => auth()->user()->user_id,
                    "first_name" => $request->input('first_name'),
                    "last_name" => $request->input('last_name', ''), // You can set default values here
                    "email" => $request->input('email'),
                    "address" => $request->input('address'),
                    "gender" => $request->input('gender', ''), // Add default value if needed
                    "profile_pic" => $profile_pic,
                    "cover_pic" => $cover_pic, // Assuming there's no cover pic in API request
                    "note" => $request->input('note', ''), // Add default value if needed
                    "phone_no" => $request->input('phone_no'),
                    "nationality" => $request->input('nationality'),
                ];

                DB::table('user_basic_info')->where('user_id',auth()->user()->user_id)->update($update_array);

                return response()->json(['message' => 'Profile updated successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);
    }


      public function Compare_list(Request $request)
    {
        $compare = Compare::select('property_id')
                          ->where('user_id', auth()->user()->user_id)
                          ->get();
                          
        $properties = [];
        $images = [];

        foreach ($compare as $compare_item) {
            $property = Homeyproperties::where('property_id', $compare_item->property_id)->first();
            $property_images = Property_images::where('property_id', $compare_item->property_id)->get();

            if ($property) {
                $properties[] = $property;
            }

            if ($property_images->isNotEmpty()) {
                $images[$compare_item->property_id] = $property_images;
            }
        }

        return response()->json(['properties' => $properties, 'images' => $images], 200);
    }
     public function removecompare(Request $request, $id)
    {
        // dd($request->all());
      
        $data = $request->all();
        
        // Delete the entry from the 'compare' table
        DB::table('compare')
            ->where('user_id', auth()->user()->user_id)
            ->where('property_id', $id)
            ->delete();

        $success = true;
        $message = ['success' => ['Compare Deleted successfully']];

        // Return a JSON response for the API
        return response()->json([ 'success' => $success, 'message' => $message], 200);
    }

    // delete intrested properties
      public function delete_intrested_property(Request $request, $id)
    {
         

        try{
          $affectedRows = InterstedProperty::where("user_id",auth()->user()->user_id)->where('property_id','=',$id)->delete();
           $success = true;
           $message=['success'=>['Intersted Property Deleted Successfully']];
           return response()->json([ 'success' => $success, 'message' => $message], 200);
        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

       public function delete_bookmarkd_property(Request $request, $id)
    {
         

        try{
          $affectedRows = BookmarkProperty::where("user_id",auth()->user()->user_id)->where('property_id','=',$id)->delete();
           $success = true;
           $message=['success'=>['Bookmarked Property Deleted Successfully']];
           return response()->json([ 'success' => $success, 'message' => $message], 200);
        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
    
     public function updatePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|min:8', // Example: Minimum 8 characters
            'cpassword' => 'required|same:newpassword',
        ]);

        // Check if the current password is correct
        if (!Hash::check($request->currentpassword, auth()->user()->password)) {
            return response()->json(['error' => 'Current Password Is Incorrect.'], 401);
        }

        // Update the user's password
        auth()->user()->update([
            'password' => Hash::make($request->newpassword),
        ]);

        return response()->json(['message' => 'Password Changed Successfully.'], 200);
    }
    
    // TESTIMONIALS
       public function about_users_testimonals()
     {
        //  try
        // {
        //     $testimonal = Testimonal::where('deleted_status',0)->latest()->take(5)->get();
        //     $users_profile=[];
        //     foreach($testimonal as $testimonals)
        //     {
        //         $user_profile_image=UserInfo::where('user_id',$testimonals->user_id)->first();
        //         if($user_profile_image)
        //         {
        //             $users_profile[$testimonals->user_id]=$user_profile_image->profile_pic;
        //         }
                
        //     }
        //         $response=[
        //             'testimonal'=>$testimonal,
        //             'users_profile'=>$users_profile,
        //         ];

        //     return response()->json($response);
        // }
        // catch (\Exception $e)
        // {
        //      return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        // }
        try {
                $testimonial = Testimonal::where('deleted_status', 0)->where('status',1)->latest()->take(5)->get();
                $users_profile = [];
            
                foreach ($testimonial as $testimonials) {
                    $user_profile_image = UserInfo::where('user_id', $testimonials->user_id)->first();
            
                    if ($user_profile_image) {
                        $users_profiles[$testimonials->user_id] = $user_profile_image->profile_pic;
                    }
                    $users_profile=[$users_profiles];
                    
                }
            
                $response = [
                    'testimonial' => $testimonial,
                    'users_profile' => $users_profile,
                ];
            
                return response()->json($response);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }


    }
     public function users_add_testimonals(Request $request)
     {
         if ($request->isMethod('post'))
        {
         $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();
       // return $data;
        $rules=[
        'user_name' => 'required',
        'user_email' => 'required',
        'message' => 'required',
        'rating' => 'required',
        ];
        $validator = Validator::make($data, $rules);
       if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }
        else
        {
            try
            {
                 $data = $request->all();
            $contact = new Testimonal();
            $contact->user_id = auth()->user()->user_id;
            $contact->user_name = $data['user_name'];
            $contact->user_email = $data['user_email'];
            $contact->message = $data['message'];
            $contact->rating= $data['rating'];
            $contact->status= 0;
            $contact->deleted_status= 0;
            $contact->save();
           return response()->json(['message' => 'Testimonial Successfully Added'], 200);
                
            }
               catch (\Exception $e)
            {
                 return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
    
            }
        }
        }
        return response()->json(['error' => 'Invalid request method'], 405);
     }
    

    
    
     public function users_testimonals()
     {
         try
        {
            $testimonal = Testimonal::where('user_id',auth()->user()->user_id)->where('deleted_status',0)->get();
                $response=[
                    'testimonal'=>$testimonal,
                ];

            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    
         public function users_testimonals_details(Request $request, $id)
     {
         try
        {
            $testimonals_details = Testimonal::where('id', $id)
                    ->where('user_id', auth()->user()->user_id)
                    ->first();    
                   
                $response=[
                    'testimonals_details'=>$testimonals_details,

                ];

            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
       public function users_testimonals_update(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();
            $validator = Validator::make($request->all(), [
                'user_name' => 'required',
            'user_email' => 'required|email', // Added email validation
            'message' => 'required',
            ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            try 
            {
                
                 if(!empty($data['rating']))
            {
                $rating=$data['rating'];
            }
            else
            {
                $rating= Testimonal::where('id', $id)
        ->where('user_id', auth()->user()->user_id)
        ->pluck('rating')->first();

            }
                    $update_arr = [
                 "user_name" => $data['user_name'], // Use array access instead of ->input()
                "user_email" => $data['user_email'], // Use array access instead of ->input()
                "status" => 0,
                "message" => $data['message'], // Use array access instead of ->input()
                "rating" => $rating, // Use array access instead of ->input()
                "updated_at" => now(),
              ];

            // Update the application details
           Testimonal::where("user_id", auth()->user()->user_id)
                ->where('id', $id)
                ->update($update_arr);

                return response()->json(['message' => 'Testimonial Successfully Updated'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    public function users_testimonals_delete(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();

            try 
            {
                $testimonial = Testimonal::where("user_id", auth()->user()->user_id)
            ->where('id', $id)
            ->first();
        if (!$testimonial) {
          return response()->json(['errors' => 'Testimonial not found.'], 422); 
        }
        else{
                    $update_arr = [
                    "deleted_status" =>1 , 
                    "updated_at" => now(),
                    ];
                    
                    // Update the application details
                    Testimonal::where("user_id", auth()->user()->user_id)
                    ->where('id', $id)
                    ->update($update_arr);
                    
                    return response()->json(['message' => 'Testimonial Successfully Deleted'], 200);
            }
                
                
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    
    
    // Agent Reviews
     public function users_add_agents_reviews(Request $request,$id)
     {
         if ($request->isMethod('post'))
        {
         $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();
       // return $data;
        $rules=[
             'rating' => 'required|integer|min:1|max:5',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
        ];
        $validator = Validator::make($data, $rules);
       if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }
        else
        {
            try
            {
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
               $review = new AgentReview();
        $review->property_id=$id;
        $review->member_id=$vid;
        $review->user_id=auth()->user()->user_id;
        $review->rating = $request->input('rating');
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->review = $request->input('review');

        // Save the review
        $review->save();
           return response()->json(['message' => 'Review Successfully Added'], 200);
                
            }
               catch (\Exception $e)
            {
                 return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
    
            }
        }
        }
        return response()->json(['error' => 'Invalid request method'], 405);
     }
     
    public function users_agents_reviews()
     {
         try
        {
            $reviews=AgentReview::where('user_id',auth()->user()->user_id)->latest()->get();
            $properties=[];
             foreach ($reviews as $review) {
         
        $property = Homeyproperties::where('property_id', $review->property_id)->first();

        if ($property) {
            $propertie['property_id'] = $property->property_id;
            $propertie['property_name'] = $property->name;
            
            if (!empty($property->agent_id)) {
                $agent_details = DB::table('agent_basic_information')
                    ->where('agent_id', $property->agent_id )
                    ->pluck('fname')->first();

                $propertie['agent_name'] = $agent_details;
            } else {
                $propertie['agent_name'] = 'By Homey';
            }
            
            $properties[$property->property_id] = $propertie;
        }
    }
                $response=[
                    'reviews'=>$reviews,
                    'properties'=>$properties,
                ];

            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    public function users_agents_reviews_details(Request $request, $id)
     {
         try
        {
            $reviews_details = AgentReview::where('id', $id)->where('user_id', auth()->user()->user_id)
                    ->first(); 
                      $properties=[];
            
            $property = Homeyproperties::where('property_id', $reviews_details->property_id)->first();
       

            if ($property) {
                $properties['property_id'] = $property->property_id;
                $properties['property_name'] = $property->name;
            }

        
                   
                $response=[
                    'reviews_details'=>$reviews_details,
                    'properties'=>$properties,

                ];

            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    public function users_agents_reviews_update(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();
            $validator = Validator::make($request->all(), [
               'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'review' => 'required|string',
            ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            try 
            {
                 // Get the request data
            $data = $request->all();
                
             if(!empty($data['rating']))
             {
               $rating=$data['rating'];
             }
            else
            {
                $rating=AgentReview::where('id', $id)->pluck('rating')->first();

            }
                    $update_arr = [
                    'name' => $data['name'],
                'email' => $data['email'],
                'review' => $data['review'],
                'rating' =>$rating,
                'updated_at'=>now(),
              ];

            // Update the reviews details
                 $update_review = AgentReview::where('id', $id)->where("user_id", auth()->user()->user_id)->update($update_arr);

                return response()->json(['message' => 'AgentReview Successfully Updated'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    public function users_agents_reviews_delete(Request $request, $id)
     {
        if ($request->isMethod('delete'))
        {
             $data = $request->all();

            try 
            {
                $agentReview = AgentReview::where("user_id", auth()->user()->user_id)
            ->where('id', $id)
            ->first();
        if (!$agentReview) {
          return response()->json(['errors' => 'AgentReview not found.'], 422); 
        }
        else{
                   $delete = AgentReview::where('id', $id)->where("user_id", auth()->user()->user_id)->delete();
                    
                    return response()->json(['message' => 'AgentReview Successfully Deleted'], 200);
            }
                
                
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    
     // Agent Reports
      public function users_add_agents_report(Request $request,$id)
     {
         if ($request->isMethod('post'))
        {
         $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();
       // return $data;
        $rules=[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'report_message' => 'required|string',
        ];
        $validator = Validator::make($data, $rules);
       if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }
        else
        {
            try
            {
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
        $review = new AgentReport();
        $review->property_id=$id;
        $review->member_id=$vid;
        $review->user_id=auth()->user()->user_id;
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->report_message = $request->input('report_message');

        // Save the review
        $review->save();
           return response()->json(['message' => 'Report Has Been Shared Successfully!'], 200);
                
            }
               catch (\Exception $e)
            {
                 return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
    
            }
        }
        }
        return response()->json(['error' => 'Invalid request method'], 405);
     }
    public function users_agents_report()
     {
       
        
        try {
    $reports = AgentReport::where('user_id', auth()->user()->user_id)->latest()->get();
    $properties = [];

    foreach ($reports as $report) {
        $property = Homeyproperties::where('property_id', $report->property_id)->first();

        if ($property) {
            $propertie['property_id'] = $property->property_id;
            $propertie['property_name'] = $property->name;
            
            if (!empty($property->agent_id)) {
                $agent_details = DB::table('agent_basic_information')
                    ->where('agent_id', $property->agent_id )
                    ->pluck('fname')->first();

                $propertie['agent_name'] = $agent_details;
            } else {
                $propertie['agent_name'] = 'By Homey';
            }
            
            $properties[$property->property_id] = $propertie;
            }
        }
    
        $response = [
            'reports' => $reports,
            'properties' => $properties,
        ];
    
        return response()->json($response);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }


    }
    public function users_agents_report_details(Request $request, $id)
     {
         try
        {
            $report_details = AgentReport::where('id', $id)->where('user_id', auth()->user()->user_id)
                    ->first(); 
                      $properties=[];
            
            $property = Homeyproperties::where('property_id', $report_details->property_id)->first();
       

            if ($property) {
                $properties['property_id'] = $property->property_id;
                $properties['property_name'] = $property->name;
            }

        
                   
                $response=[
                    'report_details'=>$report_details,
                    'properties'=>$properties,

                ];

            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    public function users_agents_report_update(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();
            $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'report_message' => 'required|string',
            ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            try 
            {
             // Get the request data
                $data = $request->all();

                // Prepare the update array
                $update_array= array(
                        'name' => $data['name'],
                        'email' =>$data['email'],
                        'report_message' => $data['report_message'],
                        'updated_at'=>now(),
                    );

                // Update the AgentReport
                $update_review = AgentReport::where('id', $id)->where("user_id", auth()->user()->user_id)->update($update_array);
                

                return response()->json(['message' => 'AgentReport Successfully Updated'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    public function users_agents_report_delete(Request $request, $id)
     {
        if ($request->isMethod('delete'))
        {
             $data = $request->all();

            try 
            {
                $agentreport = AgentReport::where("user_id", auth()->user()->user_id)
            ->where('id', $id)
            ->first();
             
        if (!$agentreport) {
          return response()->json(['errors' => 'AgentReport not found.'], 422); 
        }
        else{
                   $delete = AgentReport::where('id', $id)->where("user_id", auth()->user()->user_id)->delete();
                    
                    return response()->json(['message' => 'AgentReport Successfully Deleted'], 200);
            }
                
                
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    
    // Property Reviews
    
       public function users_add_property_reviews(Request $request,$id)
     {
         if ($request->isMethod('post'))
        {
         $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();
       // return $data;
        $rules=[
                'user_name' => 'required',
            'user_email' => 'required',
            'message' => 'required',
            'rating' => 'required',
        ];
        $validator = Validator::make($data, $rules);
       if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }
        else
        {
            try
            {
               $contact = new Reviews();
                $contact->property_id = $id;
                $contact->user_id = auth()->user()->user_id;
                $contact->user_name = $data['user_name'];
                $contact->user_email = $data['user_email'];
                $contact->message = $data['message'];
                $contact->rating= $data['rating'];
                $contact->date= now();
                $contact->status= 0;
                $contact->deleted_status= 0;
                $contact->save();
           return response()->json(['message' => 'Review Submitted Successfully'], 200);
                
            }
               catch (\Exception $e)
            {
                 return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
    
            }
        }
        }
        return response()->json(['error' => 'Invalid request method'], 405);
     }
    public function users_property_reviews()
     {
         try
        {
              $reviews=Reviews::where('user_id',auth()->user()->user_id)->where('deleted_status',0)->latest()->get();
            $properties=[];
             foreach ($reviews as $report) {
           $property = Homeyproperties::where('property_id', $report->property_id)->first();

        if ($property) {
            $propertie['property_id'] = $property->property_id;
            $propertie['property_name'] = $property->name;
            
            if (!empty($property->agent_id)) {
                $agent_details = DB::table('agent_basic_information')
                    ->where('agent_id', $property->agent_id )
                    ->pluck('fname')->first();

                $propertie['agent_name'] = $agent_details;
            } else {
                $propertie['agent_name'] = 'By Homey';
            }
            
            $properties[$property->property_id] = $propertie;
        }
    }
                $response=[
                    'reviews'=>$reviews,
                    'properties'=>$properties,
                ];

            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    public function users_property_reviews_details(Request $request, $id)
     {
         try
        {
            $reviews_details = Reviews::where('id', $id)->where('user_id', auth()->user()->user_id)->where('deleted_status',0)
                    ->first(); 
                      $properties=[];
            
            $property = Homeyproperties::where('property_id', $reviews_details->property_id)->first();
       

            if ($property) {
                $properties['property_id'] = $property->property_id;
                $properties['property_name'] = $property->name;
            }

        
                   
                $response=[
                    'reviews_details'=>$reviews_details,
                    'properties'=>$properties,

                ];

            return response()->json($response);
        }
        catch (\Exception $e)
        {
             return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);

        }

    }
    public function users_property_reviews_update(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();
            $validator = Validator::make($request->all(), [
                     'user_name' => 'required',
                'user_email' => 'required|email', // Added email validation
                'message' => 'required',
            ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            try 
            {
             // Get the request data
                $data = $request->all();
             if(!empty($data['rating']))
                {
                     $rating=$data['rating'];
    
                }
                else
                {
                    $rating=Reviews::where('id', $id)
            ->where('user_id', Auth::auth()->user()->user_id)->pluck('rating')->first();
                }
                // Validation passed, update application details
                $update_arr = [
                    "user_name" => $data['user_name'], // Use array access instead of ->input()
                    "user_email" => $data['user_email'], // Use array access instead of ->input()
                    "status" => 0,
                    "message" => $data['message'], // Use array access instead of ->input()
                    "rating" =>$rating , // Use array access instead of ->input()
                    "updated_at" => now(),
                ];
                // Update the application details
                Reviews::where('id', $id)->where("user_id", auth()->user()->user_id)->update($update_arr);
                

                return response()->json(['message' => 'Property Review Successfully Updated'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    public function users_property_reviews_delete(Request $request, $id)
     {
        if ($request->isMethod('post'))
        {
             $data = $request->all();

            try 
            {
                $propertyreview = Reviews::where("user_id", auth()->user()->user_id)
            ->where('id', $id)
            ->first();
             
        if (!$propertyreview) {
          return response()->json(['errors' => 'Reviews not found.'], 422); 
        }
        else{
                  $propertyreview->deleted_status = 1;
            $propertyreview->save();
                    
                    return response()->json(['message' => 'Property Review Successfully Deleted'], 200);
            }
                
                
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Invalid request method'], 405);

    }
    
    public function become_agent(Request $request)
    {
        
     if($request->isMethod('post'))
     {
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'name'=>'required',
                'email'=>'required',
                'mobile_no'=>'required',
                'city'=>'required',
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails())
            {
                     return response()->json(['errors' => $validator->errors()], 422);
            }
            else
            {
            try{  
              $code = BecomeAMember::orderBy('id', 'desc')->first();
                if($code == null){
                      $randomNumber = random_int(1000, 9999);
                 $id = "HOMEYB".$randomNumber.+1;
                }else{
                    $randomNumber = random_int(1000, 9999);
                 $id = "HOMEYB".$randomNumber.$code->id+1;
                }
              
                 
                $insert_array = array(
                    "application_id"=>$id,
                   "name"=>$data['name'],
                   "email"=>$data['email'],
                    "mobile_no" => $data['mobile_no'],
                     "city" => $data['city'],
                     "applied_for" => 0,
                     "status" => 0,
                      
                );
                DB::table('become_a_member')->insert($insert_array);
               
                     return response()->json(['message' => 'Request Successfully Submitted'], 200);
                }
                 catch (\Exception $e) 
                 {
            // Handle the exception and display the error message
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
                } 

              
            }
        }
          return response()->json(['error' => 'Invalid request method'], 405);
    
    }
     public function become_owner(Request $request)
    {
         if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'name'=>'required',
                'email'=>'required',
                'mobile_no'=>'required',
                'city'=>'required',
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                   return response()->json(['errors' => $validator->errors()], 422);
            }
            else
            { 
             try{
                $code = BecomeAMember::orderBy('id', 'desc')->first();
                if($code == null){
                      $randomNumber = random_int(1000, 9999);
                 $id = "HOMEYB".$randomNumber.+1;
                }else{
                    $randomNumber = random_int(1000, 9999);
                 $id = "HOMEYB".$randomNumber.$code->id+1;
                }
              
                 
                $insert_array = array(
                   "application_id"=>$id,
                   "name"=>$data['name'],
                   "email"=>$data['email'],
                    "mobile_no" => $data['mobile_no'],
                     "city" => $data['city'],
                     "applied_for" => 1,
                     "status" => 0,
                      
                );
                DB::table('become_a_member')->insert($insert_array);
              
                 return response()->json(['message' => 'Request Successfully Submitted'], 200);
            }
               catch (\Exception $e) 
                 {
            // Handle the exception and display the error message
                  return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
                }

            }

        }
          return response()->json(['error' => 'Invalid request method'], 405);
        
    }
    
    public function like_property_review(Request $request,$id)
    {
         if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
           
             try{
                 $review_details=Reviews::where('id',$id)->first();
            $data = $request->all();
            $contact = new LikeReview();
            $contact->review_id = $review_details->id;
            $contact->property_id = $review_details->property_id;
            $contact->user_id = auth()->user()->user_id;
            $contact->date = now();
            $contact->save();
              
                 return response()->json(['message' => 'Review Liked Successfully'], 200);
            }
               catch (\Exception $e) 
                 {
            // Handle the exception and display the error message
                  return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
                }

           

        }
          return response()->json(['error' => 'Invalid request method'], 405);
        
    }
    
    
    
    
        public function add_property_images(Request $request, $id)
    {
        
         try {
                $verify_property = DB::table('homeyproperties')
                    ->where('property_id', '=', $id)
                    ->where('user_id', auth()->user()->user_id)
                    ->first();
            
                if (!empty($verify_property)) {
                    if ($request->has('room')) 
                         {
                                foreach ($request->room as $key => $value) {
                                    if(!empty($value))
                                    {
                                        $code = Room::orderBy('id', 'desc')->first();
                                        if($code == null){
                                         $roomid = "room".+1;
                                        }else{
                                         $roomid = "room".$code->id+1;
                                        }
                                       
                                    $room = new Room();
                                    $room->property_id = $id;
                                    $room->room_id = $roomid;
                                    if (!empty($value['room_title'])) 
                                     {
                                      $room->room_title = $value['room_title'];
                                     }
                                    // $room->room_title = $value['room_title'];
                                    
                                      if (!empty($value['additional_room'])) 
                                     {
                                      $room->additional_room = $value['additional_room'];
                                     }
                                    //$room->additional_room = $value['additional_room'];
                                     if (!empty($value['room_details'])) 
                                     {
                                      $room->room_details = $value['room_details'];
                                     }
                                    
                                    //$room->room_details = $value['room_details'];
                                      if (!empty($value['ac'])) {
                                        $room->ac = $value['ac'];
                                    }
                                    if (!empty($value['tv'])) {
                                        $room->tv = $value['tv'];
                                    }
                                      if (!empty($value['cbath'])) {
                                        $room->cbath = $value['cbath'];
                                    }
                                      if (!empty($value['mic'])) {
                                        $room->mic = $value['mic'];
                                    }

                                    $room->save();
                                    if ($request->hasFile('room.' . $key)) {
                                        foreach ($request->file('room.' . $key) as $m_image) {
                                            $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                                            $room_images = new Room_images();
                                            $room_images->property_id = $id;
                                            $room_images->room_id = $roomid;
                                            $room_images->image_name =              $m_imagename;
                                            $room_images->save();
                                        }
                                    } 
                                    }
                                }
                         }
                 
                         if ($request->has('house')) 
                         {
                            foreach ($request->input('house') as $key => $value) 
                            {
                                if ($request->hasFile('house.' . $key)) {
                                    $h_image =$id.'_'. time() . '_' . $request->file('house.' . $key)->getClientOriginalName();
                                    $request->file('house.' . $key)->move('uploads/properties/', $h_image);
                                } else {
                                    $h_image = "-";
                                }
                                

                                $room = new House();
                                $room->property_id = $id;
                                 if (!empty($value['h_plan_title'])) {
                                        $room->plan_title = $value['h_plan_title'];
                                    }
                                
                               // $room->plan_title = $value['h_plan_title'];
                                 if (!empty($value['h_plan_details'])) {
                                        $room->plan_optional_info = $value['h_plan_details'];
                                    }
                                
                               // $room->plan_optional_info = $value['h_plan_info'];
                                 if (!empty($value['h_plan_details'])) {
                                        $room->plan_details = $value['h_plan_details'];
                                    }
                                //$room->plan_details = $value['h_plan_details'];
                                $room->plan_image = $h_image;
                                $room->save();
                            }
                         }
                    if ($request->has('m_image')) 
                    {
                            foreach ($request->file('m_image') as $m_image) {
                            $m_imagename = $id . 'm' . time() . '_' . $m_image->getClientOriginalName();
                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                            $property_images = new Property_images();
                            $property_images->property_id = $id;
                            $property_images->image_name = $m_imagename;
                            $property_images->added_by = auth()->user()->user_id;
                            $property_images->save();
                        }
                    }
                    $message = 'Property Images added By The User';
                    return response()->json($message, 200);
                } 
                else {
                    $message = 'Property Not added By The User';
                    return response()->json($message, 405);
                }
            } catch (\Exception $e) {
                // Handle the exception and display the error message
                return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
            }
            
             if($request->isMethod('post')){
            $response_code = 200;
            $message = array('error'=>array('something went wrong'));
            $success = false ;
            $data = $request->all();
            $rules=[
                'room'=>'required',
                'house'=>'required',
                'm_image'=>'required',
               
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                   return response()->json(['errors' => $validator->errors()], 422);
            }
            else
            { 
             try{
              $verify_property = DB::table('homeyproperties')
                    ->where('property_id', '=', $id)
                    ->where('user_id', auth()->user()->user_id)
                    ->first();
            
                if (!empty($verify_property)) {
                    if ($request->has('room')) 
                         {
                                foreach ($request->room as $key => $value) {
                                    if(!empty($value))
                                    {
                                        $code = Room::orderBy('id', 'desc')->first();
                                        if($code == null){
                                         $roomid = "room".+1;
                                        }else{
                                         $roomid = "room".$code->id+1;
                                        }
                                       
                                    $room = new Room();
                                    $room->property_id = $id;
                                    $room->room_id = $roomid;
                                    if (!empty($value['room_title'])) 
                                     {
                                      $room->room_title = $value['room_title'];
                                     }
                                    // $room->room_title = $value['room_title'];
                                    
                                      if (!empty($value['additional_room'])) 
                                     {
                                      $room->additional_room = $value['additional_room'];
                                     }
                                    //$room->additional_room = $value['additional_room'];
                                     if (!empty($value['room_details'])) 
                                     {
                                      $room->room_details = $value['room_details'];
                                     }
                                    
                                    //$room->room_details = $value['room_details'];
                                      if (!empty($value['ac'])) {
                                        $room->ac = $value['ac'];
                                    }
                                    if (!empty($value['tv'])) {
                                        $room->tv = $value['tv'];
                                    }
                                      if (!empty($value['cbath'])) {
                                        $room->cbath = $value['cbath'];
                                    }
                                      if (!empty($value['mic'])) {
                                        $room->mic = $value['mic'];
                                    }

                                    $room->save();
                                    if ($request->hasFile('room.' . $key)) {
                                        foreach ($request->file('room.' . $key) as $m_image) {
                                            $m_imagename = $roomid.time() . '_' . $m_image->getClientOriginalName();
                                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                                            
                                            $room_images = new Room_images();
                                            $room_images->property_id = $id;
                                            $room_images->room_id = $roomid;
                                            $room_images->image_name =              $m_imagename;
                                            $room_images->save();
                                        }
                                    } 
                                    }
                                }
                         }
                 
                         if ($request->has('house')) 
                         {
                            foreach ($request->input('house') as $key => $value) 
                            {
                                if ($request->hasFile('house.' . $key)) {
                                    $h_image =$id.'_'. time() . '_' . $request->file('house.' . $key)->getClientOriginalName();
                                    $request->file('house.' . $key)->move('uploads/properties/', $h_image);
                                } else {
                                    $h_image = "-";
                                }
                                

                                $room = new House();
                                $room->property_id = $id;
                                 if (!empty($value['h_plan_title'])) {
                                        $room->plan_title = $value['h_plan_title'];
                                    }
                                
                               // $room->plan_title = $value['h_plan_title'];
                                 if (!empty($value['h_plan_details'])) {
                                        $room->plan_optional_info = $value['h_plan_details'];
                                    }
                                
                               // $room->plan_optional_info = $value['h_plan_info'];
                                 if (!empty($value['h_plan_details'])) {
                                        $room->plan_details = $value['h_plan_details'];
                                    }
                                //$room->plan_details = $value['h_plan_details'];
                                $room->plan_image = $h_image;
                                $room->save();
                            }
                         }
                    if ($request->has('m_image')) 
                    {
                            foreach ($request->file('m_image') as $m_image) {
                            $m_imagename = $id . 'm' . time() . '_' . $m_image->getClientOriginalName();
                            $m_image->move(public_path('uploads/properties'), $m_imagename);
                            $property_images = new Property_images();
                            $property_images->property_id = $id;
                            $property_images->image_name = $m_imagename;
                            $property_images->added_by = auth()->user()->user_id;
                            $property_images->save();
                        }
                    }
                    $message = 'Property Deatails added By The User';
                    return response()->json($message, 200);
                } 
                else {
                    $message = 'Property Not added By The User';
                    return response()->json($message, 405);
                }
            }
               catch (\Exception $e) 
                 {
            // Handle the exception and display the error message
                  return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
                }

            }

        }
          return response()->json(['error' => 'Invalid request method'], 405);


        
        
        
        
        
  
    }

    
    
    



}
