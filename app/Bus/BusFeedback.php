<?php

namespace App\Bus;

use App\Bus\Interface\IBusFeedback;
use App\Reposititory\Interface\IFeedbackReposititory;
use App\Reposititory\Interface\IFeedbackTypeReposititory;


class BusFeedback implements IBusFeedback{
    private $feedbackReposititory;
    private $feedbackTypeReposititory;

    public function __construct(IFeedbackReposititory  $feedbackReposititory, IFeedbackTypeReposititory $feedbackTypeReposititory){
        $this->feedbackReposititory =  $feedbackReposititory;
        $this->feedbackTypeReposititory = $feedbackTypeReposititory;
    }

    public function sendFeedback($request){
        
        return $request;
    }

    
}