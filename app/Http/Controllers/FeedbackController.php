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
        $postion = Cookie::get('postion_id');
        $feedbackList =  $this->busFeedback->GetFeedbackByUser($user_id,$postion);
          return View('feedback-list')->with('feedbackList',$feedbackList)->with("status", 1);
    }

    public function addFeedbackType(){
        return View('add-feedback-type');
    }
    
}