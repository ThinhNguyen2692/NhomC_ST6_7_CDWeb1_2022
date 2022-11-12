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
        cookie::queue('userlogin', true);
        cookie::queue('user_id', $usser_id);
        return true;
       }else{
        return false;
       }
    }
    public function GetInformationUser($user_id){
       
        $user = $this->userProfileReposititory->GetById($user_id);
        foreach ($user as $item) {
              if($item->status == 0) return false;
            cookie::queue('full_name', $item->full_name);
            cookie::queue('phone', $item->phone);
            cookie::queue('postion_id', $item->postion_id);
            cookie::queue('email', $item->email);
            cookie::queue('status', $item->status);
            cookie::queue('address', $item->address);
            cookie::queue('avatar', $item->avatar);
        }
        return true;
    }
}