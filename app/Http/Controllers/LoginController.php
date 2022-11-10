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

        $user_id = Cookie::get('user_id');
        $getUserInformation = $this->busLogin->GetInformationUser($user_id);
       if($check && $getUserInformation){
        return to_route('feedback');
      }else {
        return View('Login');
       }
    }
}