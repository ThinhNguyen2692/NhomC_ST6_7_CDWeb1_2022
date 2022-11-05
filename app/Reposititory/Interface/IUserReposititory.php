<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IUserReposititory extends IReposititory{
    public function Login($id, $pass): ?Model;
}