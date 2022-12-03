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
    public function feedbackList(Request $request){
        $user_id = Cookie::get('user_id');
        $postion = Cookie::get('postion_id');
        if($request->get("key") !== null){
            $key = $request->get("key");
            $feedbackList = $this->busFeedback->SearchFeedback($key);
        }else{
            $feedbackList =  $this->busFeedback->GetFeedbackByUser($user_id,$postion,0);
        }
       
        return View('feedback-list')->with('feedbackList',$feedbackList)->with("key","");
    }
    public function feedbackListhistory(){
        $user_id = Cookie::get('user_id');
        $postion =  Cookie::get('postion_id');
        $feedbackList =  $this->busFeedback->GetFeedbackByUser($user_id,$postion,1);
          return View('feedback-list')->with('feedbackList',$feedbackList)->with("key","");
    }

    public function addFeedbackType(Request $request){
        if($request->get("key") !== null){
            $key = $request->get("key");
            $TypeFeedbacks = $this->busFeedback->SearchFeedbackType($key);
        }else{
            $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
        }
       
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
        if(count($Feedback) != 0){
            return View('reply-feedback')->with('Feedback',$Feedback);
        } else{
           
            return to_route('feedback');
        }
    }
    public function DeleteFeedback(Request $request){
        $token = md5(Cookie::get('user_id')."quananngon");
        $user_id = $request->get("id");
        if($token != $request->get("token")){
            return redirect()->back();
        }
        $Feedback = $this->busFeedback->GetFeedbackbyId($request->get('id'));
        if($Feedback != null){
           $delete = $this->busFeedback->DeleteFeeBack($request->get('id'));
           $check = null;
           if($delete){
            $check = "Xóa thành công";
           }
           $user_id = Cookie::get('user_id');
           $postion = Cookie::get('postion_id');
           $feedbackList =  $this->busFeedback->GetFeedbackByUser($user_id,$postion, 0);
           return View('feedback-list')->with('feedbackList',$feedbackList)->with('check', $check);
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