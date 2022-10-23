<?php

namespace App\Bus;
use App\Bus\Interface\IBusUser;
use App\Reposititory\Interface\IUserReposititory;

class BusUser implements IBusUser{
    private $userReposititory;

    public function __construct(IUserReposititory $userReposititory){
        $this->userReposititory = $userReposititory;
    }
    
    public function GetAllUser(){
        $getalluser = $this->userReposititory->all();
        $arr = [];
        foreach ($getalluser as $key) {
            $item = "userid la:".$key->id."ten la: ".$key->name;
            array_push($arr, $item);
        }
        return $arr;
    }
    public function GetFindById($id){
        $getuser = $this->userReposititory->findById($id);
        $item = "userid la:".$getuser->id."ten la: ".$getuser->name;
        return $item;
    }
}