<?php

namespace App\Bus\Interface;

interface IBusUser{
    public function GetAllUser();
    public function GetFindById($id);
}