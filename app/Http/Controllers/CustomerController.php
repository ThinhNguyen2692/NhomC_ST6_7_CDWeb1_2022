<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusFeedback;
use  App\Models\Food;
use App\Bus\Interface\IBusFood;


class CustomerController extends Controller
{
    private $busFeedback;
    private $busFood;

    public function __construct(IBusFeedback $busFeedback, IBusFood $busFood){
        $this->busFeedback = $busFeedback;
        $this->busFood = $busFood;
    }

    public function Index(){
        $model = $this->busFood->GetFoodTen();
      
        return View('welcome')->with('foods',$model);
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

    public function Cart(){
        $this->busFood->Cart(1,1);
        
    }

}