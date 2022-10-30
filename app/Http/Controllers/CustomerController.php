<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusFeedback;


class CustomerController extends Controller
{
    private $busFeedback;

    public function __construct(IBusFeedback $busFeedback){
        $this->busFeedback = $busFeedback;
    }

    public function Index(){
        return View('welcome');
    }

    public function SendFeedback(Request $request){
        
    }
    

}