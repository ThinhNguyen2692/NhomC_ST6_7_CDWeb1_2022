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
        $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
        return View('welcome')->with("TypeFeedbacks",$TypeFeedbacks);
    }

    public function SendFeedback(Request $request){
        $request->validate([
            'customer_email' => 'required|email',
            'customer_name' => ['required','max:255'],
            'feedback_type_id' => 'required',
            'feedback_content' => 'required',
            'captcha' => 'required|captcha'
        ]);
       $check = $this->busFeedback->sendFeedback($request);
       if($check == true){
        return View('welcome')->with("mess","Cảm ơn đã phản hồi");
       }else{
        return View('welcome')->with("mess","Xin lỗi phản hồi thất bại");
       }
    }
    
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('math')]);
    }



}