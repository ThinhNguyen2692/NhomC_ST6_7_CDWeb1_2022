<?php

namespace App\Bus;
use App\Bus\Interface\IBusUser;
use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Interface\IUserProfileReposititory;
use App\Reposititory\Interface\IFeedbackTypeReposititory;
use App\Reposititory\Interface\IUserFeedbackReposititory;

class BusUser implements IBusUser{
    private $userReposititory;
    private $userProfileReposititory;
    private $feedbackTypeReposititory;
    private $userFeedbackReposititory;

    public function __construct(IUserReposititory $userReposititory, IUserProfileReposititory $userProfileReposititory, IFeedbackTypeReposititory $feedbackTypeReposititory, IUserFeedbackReposititory  $userFeedbackReposititory){
        $this->userReposititory = $userReposititory;
        $this->userProfileReposititory = $userProfileReposititory;
        $this->feedbackTypeReposititory = $feedbackTypeReposititory;
        $this->userFeedbackReposititory = $userFeedbackReposititory;
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