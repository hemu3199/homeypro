<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,DB;



use App\Facades\ResponseHelper;
use App\Models\User;
use App\Models\InterstedProperty;
use App\Models\Property_rent;
use App\Models\Property_sale;
use App\Models\Contactus;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\BookMarkProperty;
use App\Models\Homeyproperties;


class PropertyComparisonController extends Controller
{
    public function index(Request $request)
    {
        $propertyIds = $request->session()->get('comparison_properties', []);

        $properties = Homeyproperties::whereIn('id', $propertyIds)->get();

        return view('comparison.index', compact('properties'));
    }

    public function addToComparison(Request $request, $propertyId)
    {
        $propertyIds = $request->session()->get('comparison_properties', []);
        $propertyIds[] = $propertyId;
        $request->session()->put('comparison_properties', $propertyIds);

        return redirect()->route('property.compare');
    }

    public function removeFromComparison(Request $request, $propertyId)
    {
        $propertyIds = $request->session()->get('comparison_properties', []);
        $propertyIds = array_diff($propertyIds, [$propertyId]);
        $request->session()->put('comparison_properties', $propertyIds);

        return redirect()->route('property.compare');
    }

    public function clearComparison(Request $request)
    {
        $request->session()->forget('comparison_properties');

        return redirect()->route('property.compare');
    }
}
