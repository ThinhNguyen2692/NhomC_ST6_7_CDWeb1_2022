<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IUserReposititory extends IReposititory{
    public function Login($id, $pass);
    public function AddUser($user);
    public function GetUserByName($userName);
    public function UpdatePass($Pass, $userId);
    public function DeleteUser($modelId);
}