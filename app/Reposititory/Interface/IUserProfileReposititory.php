<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IUserProfileReposititory extends IReposititory{
    public function GetById($id);
    public function GetAll();
    
}