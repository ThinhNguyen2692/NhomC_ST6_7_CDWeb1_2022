<?php

namespace App\Bus\Interface;

interface IBusUser{
    public function GetAllUser();
    public function GetFindById($id);
    public function AddNewUser($request, $imageName);
    public function GetInformationUser($id);
}