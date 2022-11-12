<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\UserCustomer;


class LoginController extends Controller
{
    private $busLogin;

    public function __construct(IBusLogin $busLogin){
        $this->busLogin = $busLogin;
    }

    public function Index(){
        return View('Login');
    }    

    public function Login(Request $request){
        $request->validate([
            'user_id' => ['required','max:255'],
            'password' => ['required','max:255']
        ]);

        $check = $this->busLogin->Login($request);
     
        if($check){
        $user_id =  $request->post('user_id');
        $getUserInformation = $this->busLogin->GetInformationUser($user_id);
        return to_route('feedback');
      }else {
        return View('Login');
       }
    }
    public function Logout(){
        $cookieUser = Cookie::forget('user_id');
        $cookieLogin = Cookie::forget('userlogin');
        $cookieFullname = cookie::forget('full_name');
       $cookieUsername = cookie::forget('user_name');
         $cookiePostion =  cookie::forget('postion_id');
         $cookieStatus = cookie::forget('status');
          $cookieAvatar =  cookie::forget('avatar');
        return view('Welcome')
        ->withCookie($cookieUser)
        ->withCookie($cookieLogin)
        ->withCookie($cookieFullname)
        ->withCookie($cookiePostion)
        ->withCookie($cookieStatus)
        ->withCookie($cookieAddress)
        ->withCookie($cookieUsername)
        ->withCookie($cookieAvatar);
    }
}