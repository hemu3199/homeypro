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
use App\Models\AgentReview;

class AgentReviewController extends Controller
{

	 public function add_agent_review(Request $request )
	{
        //dd($request->all());
        //Validate the form data
        $request->validate([
            // 'rating' => 'required|integer|min:1|max:5',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
        ]);

        $review = new AgentReview();
        $review->property_id=$request->property_id;
        $review->member_id=$request->member_id;
        $review->user_id=auth()->user()->user_id;
        // $review->rating = $request->input('rating');
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->review = $request->input('review');

        // Save the review
        $review->save();
        return back()->with('message', 'Review Submitted Successfully!');
    }

    public function get_agents_reviews(Request $request)
    {
        $reviews=AgentReview::where('user_id',auth()->user()->user_id)->latest()->get();
        return view('user.agents-reviews',compact('reviews'));
    }

   public function edit_agent_review(Request $request, $id)
{
    $reviews_details = AgentReview::where('id', $id)->first();
    
    // Check if the request method is POST
    if ($request->isMethod('post')) {
        try {
            // Validate the request data
            $request->validate([
               
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'review' => 'required|string',
            ]);

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

            // Prepare the update array
            $update_array = [
                'name' => $data['name'],
                'email' => $data['email'],
                'review' => $data['review'],
                'rating' =>$rating,
                'updated_at'=>now(),
            ];

            // Update the AgentReview
            $update_review = AgentReview::where('id', $id)->update($update_array);

            // Return a success message
            return back()->with('message', 'Review Updated Successfully');
        } catch (\Exception $e) {
            // Handle any exceptions and return an error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // If the request method is not POST, return the view for editing agent reviews
    return view('user.edit-agent-reviews', compact('reviews_details'));
}

public function delete_agent_review(Request $request, $id)
{
    // Delete the agent review
    $delete = AgentReview::where('id', $id)->delete();

    // Return a success message
    return back()->with('message', 'Review Deleted Successfully');
}





    
}
