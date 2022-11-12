<?php

namespace App\Bus;

use App\Bus\Interface\IBusFeedback;
use App\Reposititory\Interface\IFeedbackReposititory;
use App\Reposititory\Interface\IFeedbackTypeReposititory;
use App\Models\Feedback;
use App\Models\FeedbackType;


class BusFeedback implements IBusFeedback{
    private $feedbackReposititory;
    private $feedbackTypeReposititory;

    public function __construct(IFeedbackReposititory  $feedbackReposititory, IFeedbackTypeReposititory $feedbackTypeReposititory){
        $this->feedbackReposititory =  $feedbackReposititory;
        $this->feedbackTypeReposititory = $feedbackTypeReposititory;
    }

    public function sendFeedback($request){
        $feedback = new Feedback();
        $feedback->customer_name = $request->post('customer_name');
        $feedback->customer_email = $request->post('customer_email');
        $feedback->feedback_type_id	 = $request->post('feedback_type_id');
        $feedback->feedback_content = $request->post('feedback_content');
        $feedback->response_time = $request->post('date');
        $feedback->status = 0;
        $check = $this->feedbackReposititory->AddFeedback($feedback);
        return $check;
    }

    public function GetAllTypeFeedback(){
        $TypeFeedback = $this->feedbackTypeReposititory->GetAll();
       return $TypeFeedback;
    }

    public function GetFeedbackByUser($user_id, $postion){
        if($postion == 3){
            $feedbackList = $this->feedbackReposititory->GetFeebackByType($user_id);
        }else{
            $feedbackList = $this->feedbackReposititory->GetFeebackAll();
        }
     return $feedbackList;
    }

    public function AddFeedBackType($request){
        $feedbackType = new FeedbackType();
        $feedbackType->feedback_type_name = $request->post('feedback_name');
      $check =  $this->feedbackTypeReposititory->AddFeedbackType($feedbackType);
      return $check;
    }

    public function DeletefeedbackType($feedbackTypeId){
        $feedbackList = $this->feedbackReposititory->GetFeebackAll();

        foreach ($feedbackList as $item) {
            if($item->feedback_type_id == $feedbackTypeId){
                return "Xóa thất bại";
            }
        }
        $check = $this->feedbackTypeReposititory->Deletefeedbacktype($feedbackTypeId);
        return "Xóa thành công";
    }

    public function GetFeedbackbyId($id){
        $check = $this->feedbackReposititory->GetfeedBackById($id);
        return $check;
    }
    public function DeleteFeeBack($modelId){
        $check = $this->feedbackReposititory->DeleteFeedback($modelId);
        return $check;
    }
}