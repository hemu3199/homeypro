<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
use Validator,Auth,DB;
use App\Models\Application;
use App\Models\Agreement;
use App\Facades\ResponseHelper;
use App\Models\Homeyproperties;
use App\Models\AgentReview;
use App\Models\AgentReport;



class AgentReportReviewController extends Controller
{

    public function agents_report(Request  $request)
    {
        $reports=AgentReport::paginate(10);
        return view('admin.agents-reports',compact('reports'));
        
    }
    public function agents_reviews( Request $request)
    {
        $reviews=AgentReview::paginate(10);
        return view('admin.agents-reviews',compact('reviews'));
        
    }

      public function delete_agents_report(Request $request, $id)
    {
        // Delete the agent review
        $delete = AgentReport::where('id', $id)->delete();

        // Return a success message
        return back()->with('message', 'Report deleted successfully');
    }

      public function delete_agents_review(Request $request, $id)
    {
        // Delete the agent review
        $delete = AgentReview::where('id', $id)->delete();

        // Return a success message
        return back()->with('message', 'Review deleted successfully');
    }
    
	

}
