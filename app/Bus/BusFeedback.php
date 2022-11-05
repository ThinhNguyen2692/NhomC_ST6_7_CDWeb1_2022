<?php

namespace App\Bus;

use App\Bus\Interface\IBusFeedback;
use App\Reposititory\Interface\IFeedbackReposititory;
use App\Reposititory\Interface\IFeedbackTypeReposititory;
use App\Models\Feedback;


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
    
}