<?php

namespace App\Reposititory;

use App\Models\UserProfile;
use App\Reposititory\Interface\IUserProfileReposititory;
use App\Reposititory\Reposititory;

class UserProfileReposititory extends Reposititory implements IUserProfileReposititory{

    protected $model;

    public function __construct(UserProfile $model){
        $this->model = $model;
    }

    public function GetById($id){
        return $this->model::where("user_id", "=", $id)->get();
        //return response()->json($this->model->where("user_id", "=", $id)->get());
    }
 
  
}