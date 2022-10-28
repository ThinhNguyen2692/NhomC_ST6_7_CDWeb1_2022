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

 
  
}