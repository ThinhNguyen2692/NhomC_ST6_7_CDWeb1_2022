<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusFeedback;
use Cookie;

class FeedbackController extends Controller
{
    private $busFeedback;

    public function __construct(IBusFeedback $busFeedback){
        $this->busFeedback = $busFeedback;
    }
    public function feedbackList(){
        $user_id = Cookie::get('user_id');
        $postion = Cookie::get('postion_id');
        $feedbackList =  $this->busFeedback->GetFeedbackByUser($user_id,$postion);
        return View('feedback-list')->with('feedbackList',$feedbackList)->with("status", 0);
    }
    public function feedbackListhistory(){
        $user_id = Cookie::get('user_id');
        $postion =  Cookie::get('postion_id');
        $feedbackList =  $this->busFeedback->GetFeedbackByUser($user_id,$postion);
          return View('feedback-list')->with('feedbackList',$feedbackList)->with("status", 1);
    }

    public function addFeedbackType(){
        $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
        return View('add-feedback-type')->with('TypeFeedbacks',$TypeFeedbacks);
    }

    public function replyFeedback(){
        return View('reply-feedback');
    }

    public function FeedbackTypeAdd(Request $request){
        $request->validate([
            'feedback_name' => ['required','min:1'],
        ]);
        $this->busFeedback->AddFeedBackType($request);
        $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
        return View('add-feedback-type')->with('TypeFeedbacks',$TypeFeedbacks);
        
    }

    public function DeleteFeedbackType(Request $request){
        $token = md5($request->get('id').Cookie::get('user_id').Cookie::get('full_name')."deletefeedback");
        if( $request->get('token') == $token){
            return "true";
        }
        else{
            return addFeedbackType();
        }
    }
    
}