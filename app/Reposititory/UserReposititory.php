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
}