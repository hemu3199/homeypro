<?php

namespace App\Http\Controllers\Admin;
use App\Models\AddAgent;
use App\Models\Agent;
use App\Models\InterstedProperty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Validator,Auth,DB,Hash;
use App\Facades\ResponseHelper;
use App\Models\Homeyproperties;
use App\Models\Property_images;
use App\Models\BecomeAMember;

class BecomeResponseController extends Controller
{
	public function becomeagent(Request $request)
	{

		$agent=BecomeAMember::where('applied_for',0)->latest()->paginate(10);
		return view('admin.becomeagent',compact('agent'));


	}
		public function becomeowner(Request $request)
	{
		$owner=BecomeAMember::where('applied_for',1)->latest()->paginate(10);
		return view('admin.becomeowner',compact('owner'));
	}
}