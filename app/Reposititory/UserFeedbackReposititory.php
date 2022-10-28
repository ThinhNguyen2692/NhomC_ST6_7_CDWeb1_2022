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


}