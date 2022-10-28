<?php

namespace App\Bus;

use App\Bus\Interface\IBusFeedback;
use App\Reposititory\Interface\IFeedbackReposititory;

class BusFeedback implements IBusFeedback{
    private $feedbackReposititory;

    public function __construct(IFeedbackReposititory  $feedbackReposititory){
        $this->feedbackReposititory =  $feedbackReposititory;
    }
    
}