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
    
    public function GetAll(){
        return $this->model->get();
    }

    public function AddUserProfile($userProfile){
        try{
             $this->create($userProfile);
             return true;
        }catch(ex){
            return false;
        }
    }
    
    public function GetInformationUser($id){
        $this->model::where('user_id', '=', $id)->join('user','user.user_id', '=', 'user_id')
        ->join('user_feedback', 'user_feedback.user_id', '=', 'user_id')->join('feedback_type', 'feedback_type.feedback_type_id ', '=', 'user_feedback.feedback_type_id ')->limit(1)->get();
    }
  
}