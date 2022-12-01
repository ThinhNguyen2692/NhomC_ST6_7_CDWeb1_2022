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
       if($this->busFeedback->AddFeedBackType($request)){
            $check = "Thêm thành công";
       }else{ $check = "Thêm thất bại";}
        $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
        return View('add-feedback-type')->with('TypeFeedbacks',$TypeFeedbacks)->with('check', $check);
        
    }

    public function DeleteFeedbackType(Request $request){
        $token = md5($request->get('id').Cookie::get('user_id').Cookie::get('full_name')."deletefeedback");
        if( $request->get('token') == $token){
            $check = $this->busFeedback->DeletefeedbackType($request->get('id'));
            $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
            return View('add-feedback-type')->with('TypeFeedbacks',$TypeFeedbacks)->with('check', $check);
        }
        else{
            return redirect()->back();
        }
    }



    public function Showfeedback(Request $request){
        $Feedback = $this->busFeedback->GetFeedbackbyId($request->get('id'));
        if($Feedback != null){
            return View('reply-feedback')->with('Feedback',$Feedback);
        } else{
            return redirect()->back();
        }
    }
    public function DeleteFeedback(Request $request){
        $Feedback = $this->busFeedback->GetFeedbackbyId($request->get('id'));
        if($Feedback != null){
           $delete = $this->busFeedback->DeleteFeeBack($request->get('id'));
           $check = "";
           if($delete){
            $check = "Xóa thành công";
           }
           $user_id = Cookie::get('user_id');
           $postion = Cookie::get('postion_id');
           $feedbackList =  $this->busFeedback->GetFeedbackByUser($user_id,$postion);
           return View('feedback-list')->with('feedbackList',$feedbackList)->with("status", 0)->with('check', $check);
        } else{
            return redirect()->back();
        }
    }

    public function UpdateFeedback(Request $request)
    {
        $request->validate([
            'feedback_content' => ['required']]);
          $Feedback = $this->busFeedback->Reply($request);
          //var_dump($Feedback);
           if($Feedback != null){
             return View('reply-feedback')->with('Feedback',$Feedback);
         } else{
             return redirect()->back();
         }
    }
    
}