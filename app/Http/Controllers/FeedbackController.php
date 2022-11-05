<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusFeedback;


class FeedbackController extends Controller
{
    private $busFeedback;

    public function __construct(IBusFeedback $busFeedback){
        $this->busFeedback = $busFeedback;
    }

    public function feedbackList(){
        return View('feedback-list');
    }
    
}