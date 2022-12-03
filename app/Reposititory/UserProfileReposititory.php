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
        return $this->model->paginate(10);
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
      return $this->model::where('user_profile.user_id', '=', $id, 'and', 'feedback_type.feedback_type_id', '=', 'user_feedback.feedback_type_id')
        ->join('users','users.user_id','=','user_profile.user_id')
        ->join('user_feedback', 'user_feedback.user_id','=','users.user_id')
        ->join('feedback_type', 'feedback_type.feedback_type_id','=','user_feedback.feedback_type_id')->first();
        
    }
    public function UpdateUser($User){
        $user = $this->model::where('user_id','=', $User->user_id)->update($User->toArray());
     
     }
     public function DeleteUserProfile($modelId){
        $modelIdName = "user_id";
        $check = $this->Delete($modelId,$modelIdName);
       
    }

    public function SearchUser($key){
        $key = "%".$key."%";
        $modelIdName = "user_id";
        return $this->Search($key, $modelIdName);
    }


}