<?php

namespace App\Bus;
use App\Bus\Interface\IBusUser;
use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Interface\IUserProfileReposititory;

use App\Reposititory\Interface\IUserFeedbackReposititory;

class BusUser implements IBusUser{
    private $userReposititory;
    private $userProfileReposititory;
    private $userFeedbackReposititory;

    public function __construct(IUserReposititory $userReposititory, IUserProfileReposititory $userProfileReposititory, IUserFeedbackReposititory  $userFeedbackReposititory){
        $this->userReposititory = $userReposititory;
        $this->userProfileReposititory = $userProfileReposititory;
        $this->userFeedbackReposititory = $userFeedbackReposititory;
    }
    
    public function GetAllUser(){
        $getalluser = $this->userProfileReposititory->GetAll();
        return $getalluser;
    }
    public function GetFindById($id){
        $getuser = $this->userReposititory->findById($id);
        $item = "userid la:".$getuser->id."ten la: ".$getuser->name;
        return $item;
    }

}