<?php

namespace App\Bus\Interface;

interface IBusUser{
    public function GetAllUser();
    public function GetFindById($id);
    public function AddNewUser($request, $imageName);
    public function GetInformationUser($id);
    public function AdminUpdatePass($request);
    public function UpdatePass($request, $user_id);
    public function UpdateUser($request);
    public function DeleteUser($modelId);
}