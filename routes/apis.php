 try
            {
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





$property_rent = DB::table('homeyproperties')->where('approval_status','=', 1 )->where('featured','=',1)->latest()->take(6)->get();
        $property_rents = DB::table('homeyproperties')->where('approval_status','=', 1 )->latest()->take(6)->get();
        $property = Property_sale::where('property_type','=','sale')->first();
        $property_sale = DB::table('properties')->where('property_type','=',$property->property_type)->where('approval','=', 1 )->paginate(3);
        $user = User::select('id')->first();
        $agents = AddAgent::latest()->take(5)->get();
        $city=  DB::table('homeyproperties')->select('city')->distinct()->get();
        $categories= DB::table('homeyproperties')->select('categories')->distinct()->get();
        $details=
        [
                    'property_rent'=>$property_rent,
                     'property_rents'=>$property_rents,
                     'agents'=> $agents,
                     'city'=>   $city,
                      'categories'=>   $categories,
        ];
        return response()->json($details);