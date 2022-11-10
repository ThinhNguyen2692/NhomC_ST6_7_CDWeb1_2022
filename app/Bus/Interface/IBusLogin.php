<?php

namespace App\Bus\Interface;

interface IBusLogin{
    public function Login($request);
    public function GetInformationUser($user_id);
}