<?php

namespace App\Bus;

use App\Bus\Interface\IBusLogin;
use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Interface\IUserReposititory;


class BusLogin implements IBusLogin{
    private $userReposititory;

    public function __construct(IUserReposititory $userReposititory){
        $this->userReposititory = $userReposititory;
    }

    public function Login($request){
        $usser_id = $request->post('user_id');
        $password = $request->post('password');
       $check = $this->userReposititor->Login();
       if($check){
        return true;
       }else{
        return false;
       }
    }
}