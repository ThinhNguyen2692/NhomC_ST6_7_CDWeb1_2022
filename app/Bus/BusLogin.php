<?php

namespace App\Bus;

use App\Bus\Interface\IBusLogin;
use App\Reposititory\Interface\IUserReposititory;


class BusLogin implements IBusLogin{
    private $userReposititory;

    public function __construct(IUserReposititory $userReposititory){
        $this->userReposititory = $userReposititory;
    }

    public function Login($request){
        
    }
}