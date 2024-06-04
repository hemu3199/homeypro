<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
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
use App\Models\Testimonal;
use App\Models\AgentReport;

class AgentReportController extends Controller
{

	 public function add_agent_report(Request $request )
	{
       


       try{
           //dd($request->all());
        //Validate the form data
       
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'report_message' => 'required|string',
        ]);

        $review = new AgentReport();
        $review->property_id=$request->property_id;
        $review->member_id=$request->member_id;
        $review->user_id=auth()->user()->user_id;
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->report_message = $request->input('report_message');

        // Save the review
        $review->save();
        return back()->with('message', 'Report Has Been Shared Successfully!');


        }
         catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
       

     
    }
    public function get_agents_report(Request $request)
    {
        $reports=AgentReport::where('user_id',auth()->user()->user_id)->latest()->get();
        return view('user.agents-reports',compact('reports'));
    }

       public function edit_agent_report(Request $request, $id)
    {
        $report_details = AgentReport::where('id', $id)->first();
        
        // Check if the request method is POST
        if ($request->isMethod('post')) {
            try {
                // Validate the request data
                $request->validate([
                   'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'report_message' => 'required|string',
                ]);

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
                $update_review = AgentReport::where('id', $id)->update($update_array);

                // Return a success message
                return back()->with('message', 'Report Updated Successfully');
            } catch (\Exception $e) {
                // Handle any exceptions and return an error message
                return back()->with('error', 'An error occurred: ' . $e->getMessage());
            }
        }

        // If the request method is not POST, return the view for editing agent reviews
        return view('user.edit-agent-reports', compact('report_details'));
    }

    public function delete_agent_report(Request $request, $id)
    {
        // Delete the agent review
        $delete = AgentReport::where('id', $id)->delete();

        // Return a success message
        return back()->with('message', 'Report Deleted Successfully');
    }





    
}
