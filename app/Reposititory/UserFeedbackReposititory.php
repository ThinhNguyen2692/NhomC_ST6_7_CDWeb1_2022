<?php

namespace App\Reposititory;

use App\Models\UserFeedback;
use App\Reposititory\Interface\IUserFeedbackReposititory;
use App\Reposititory\Reposititory;

class UserFeedbackReposititory extends Reposititory implements IUserFeedbackReposititory{

    protected $model;

    public function __construct(UserFeedback $model){
        $this->model = $model;
    }

    public function AddUserFeedback($userFeedback){
        try{
             $this->create($userFeedback);
             return true;
        }catch(ex){
            return false;
        }
    }
    public function UpdateUserTyupe($UserTyupe){
        $user = $this->model::where('user_id','=', $UserTyupe->user_id)->update($UserTyupe->toArray());
     }

     public function DeleteUserType($modelId){
        $modelIdName = "user_id";
        $check = $this->Delete($modelId,$modelIdName);
    }
}