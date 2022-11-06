<?php

namespace App\Bus;

use App\Bus\Interface\IBusLogin;

use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Interface\IUserProfileReposititory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\UserCustomer;


class BusLogin implements IBusLogin{
    private $userReposititory;
    private $userProfileReposititory;

    public function __construct(IUserReposititory $userReposititory, IUserProfileReposititory $userProfileReposititory){
        $this->userReposititory = $userReposititory;
        $this->userProfileReposititory = $userProfileReposititory;
    }

    public function Login($request){
        $usser_id = $request->post('user_id');
        $password = md5( $request->post('password'));
       $check = $this->userReposititory->Login( $usser_id, $password);
      if($check){
        $user = $this->userProfileReposititory->GetById( $usser_id);
        $arr = [
            'user_id' => $usser_id,
            'password' => $password
        ];

        cookie::queue('postion', '1');
       var_dump(Cookie::get('postion'));
        return $check;
       }else{
        return false;
       }
    }
}