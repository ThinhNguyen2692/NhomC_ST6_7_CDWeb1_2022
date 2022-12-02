<?php

namespace App\Reposititory;

use App\Models\User;
use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Reposititory;

class UserReposititory extends Reposititory implements IUserReposititory{

    protected $model;

    public function __construct(User $model){
        $this->model = $model;
    }

    public function GetAll(){
       return response()->json($this->all());
    }
    public function GetFindById($id){
        return response()->json($this->findById($id));
    }
    public function Login($id, $pass){
        return $this->model::Where("user_id", "=", $id)->where("password","=", $pass)->get();
    }

    public function GetUserByName($userName){
        return $this->model::Where("user_name", "=", $userName)->limit(1)->get();
    }
    public function AddUser($user){
        try {
            $this->create($user);
            return true;
          }
          catch (Exception $e) {
            return false;
          }
    }

    public function GetId($userId, $modelname){
       return $this->findById($userId, $modelname);
    }
    public function UpdatePass($Pass, $userId){
       
        $modelname = "user_id";
       $user = $this->GetId($userId, $modelname);
       $this->model::where('user_id','=', $userId)->update(['password' => $Pass]);
    }

    public function DeleteUser($modelId){
        $modelIdName = "user_id";
        $check = $this->Delete($modelId,$modelIdName);
    
    }
  
}   