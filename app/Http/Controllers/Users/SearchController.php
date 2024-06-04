<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Validator,Auth,DB;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use App\Facades\ResponseHelper;
use App\Models\User;
use App\Models\Homeyproperties;
use App\Models\Property_images;

class SearchController extends Controller
{

    public function fn_search(Request $request)
    {
    	//dd($request->all());
        $address = $request->input('address');
        $state = $request->input('State');
        $category = $request->input('cat');
        $price = $request->input('price');
        $city=$request->input('city');

        $query = Homeyproperties::query();

        if (!empty($address)) {
            $query->where('address', 'like', '%' . $address . '%');
        }

        if (!empty($state)) {

            $query->where('country', 'like', '%' . $state . '%');
        }

        if ($category !== 'All Categories') {
            $query->where('categories', 'LIKE', '%'.$category.'%');
        }

      	if($price > 1)
        {
            $query->whereBetween('price', [0, $price]);
        }
        if( $city !== 'All Cities')
        {
        	$query->where('city','like','%'.$city.'%');
        }
        

        $property_rent = $query->where('approval_status','=', 1 )->paginate(10);
            $sharebutton=\Share::page( 
                 url('/').'/property/details/', 
                 'here is the text',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();
       

        return view('user.propertyrent',compact('property_rent','city','sharebutton'));
    }


    public function search(Request $request)
    {
    	//dd($request->all());
        $city = $request->input('city');
        $category = $request->input('cat');
        // $price = $request->input('price');
        // $area = $request->input('area');
        $propertyId = $request->input('property_id');
        if(!empty( $propertyId))
        {
        	 $prop= DB::table('homeyproperties')->where('property_id','=',$propertyId)->where('approval_status','=', 1 )->first();
        	if(!empty($prop))
        	{
          $property_rent_details = DB::table('homeyproperties')->where('property_id','=',$propertyId)->first();
          $images = Property_images::where('property_id','=',$propertyId)->get();
       
          $categories = DB::table('homeyproperties')->where('property_id','=',$propertyId)->pluck('categories');
          
                 $property_rent = DB::table('homeyproperties')->where('approval_status','=', 1 )->where('featured','=',1)->latest()->take(3)->get();

        
        $similar = DB::table('homeyproperties')->where('categories','=',$categories)->take(5)->get();


                        $sharebutton=\Share::page( 
                 url('/').'/property/details/'.$propertyId, 
                 'here is the text'.$property_rent_details->name,
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();

        return view('user.property-rent-details',compact('property_rent_details','property_rent','images','similar','sharebutton'));
   		 }

	 }
        else
        {

        $query = Homeyproperties::query();

        if ($city !== 'All Cities') {
            $query->where('city', $city);
        }

        if ($category !== 'All Categories') {
           $query->where('categories', 'LIKE', '%'.$category.'%');
        }

        if (!empty($price)) {
            [$minPrice1, $maxPrice1] = explode(';', $price);
            $query->whereBetween('price', [$minPrice1, $maxPrice1]);
        }

        // if (!empty($area) ) {
        //     [$area1, $area2] = explode(';', $area);
        //     $query->whereBetween('yard_size', [$area1, $area2]);
        // }
        // if (!empty($propertyId)) {
        //     $query->where('property_id', $propertyId);
        // }
		$property_rent = $query->where('approval_status','=', 1 )->paginate(10);
            $sharebutton=\Share::page( 
                 url('/').'/property/details/', 
                 'here is the text',
                 

                 )
                ->facebook()
                ->telegram()
                 ->linkedin()
                 ->whatsapp()
                 
                 ->twitter()
                 ->pinterest();
       return view('user.propertyrent',compact('property_rent','city','sharebutton'));
   		}
	}




}
