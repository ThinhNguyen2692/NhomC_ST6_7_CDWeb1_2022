<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusLogin;


class LoginController extends Controller
{
    private $busLogin;

    public function __construct(IBusLogin $busUser){
        $this->BusUser = $BusUser;
    }

    

}