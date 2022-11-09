<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusFeedback;
use Illuminate\Support\Facades\Cookie;


class FeedbackController extends Controller
{
    private $busFeedback;

    public function __construct(IBusFeedback $busFeedback){
        $this->busFeedback = $busFeedback;
    }

    public function feedbackList(){
        $user = Cookie::get('userlogin');
       // $feedbackList =  $this->busFeedback->GetFeedbackByUser($user);
        return $user;
        //return View('feedback-list');
    }

    public function addFeedbackType(){
        return View('add-feedback-type');
    }
    
}