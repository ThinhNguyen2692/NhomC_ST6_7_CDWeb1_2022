<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusFeedback;
use  App\Models\Food;
use App\Bus\Interface\IBusFood;
use Illuminate\Support\Facades\Cookie;


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
        $model = $this->busFood->GetFoodTen();
        if($check == true){
            return View('welcome')->with("mess","Cảm ơn đã phản hồi")->with('foods',$model);
        }else{
            return View('welcome')->with("mess","Xin lỗi phản hồi thất bại")->with('foods',$model);
        }
    }
    
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('math')]);
    }

    public function Cart(Request $request){
        $this->busFood->Cart($request);
        return redirect()->back();
    }

    public function ViewCart(){
        $this->busFood->UpdateCartDB();
        return View('cart-view');
    }
    public function Deletecart(Request $request){
        $this->busFood->Deletecart($request);
        return redirect()->back();
    }

    public function UpdateCart(Request $request){
       $this->busFood->UpdateCart($request);
        return redirect()->back();
      
    }

    public function AddBill(Request $request){
        $request->validate([
            'email' => 'required|email',
            'phone' => ['required'],
            'name' => 'required',
            'address' => 'required'
        ]);

        $idBill = $this->busFood->AddBill($request);
        cookie::queue('bill', $idBill, 30);
        $bill = $this->busFood->GetBillById($idBill);
        $billDetail = $this->busFood->GetBillDetailById($idBill);
        return View('paypal')->with('bill',$bill)->with('billDetail',$billDetail);
    }

    public function UpdateBill(Request $request){
        $id = $request->get('id');
        $this->busFood->UpdateBill($id);
        $cookieBill =  \Cookie::forget('bill');
        return to_route('home')->withCookie($cookieBill);
    }

    public function pay(){
        $idBill = cookie::get('bill');
        $bill = $this->busFood->GetBillById($idBill);
        $billDetail = $this->busFood->GetBillDetailById($idBill);
        return View('paypal')->with('bill',$bill)->with('billDetail',$billDetail);
    }

}