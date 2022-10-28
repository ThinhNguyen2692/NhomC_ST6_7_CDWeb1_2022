<?php

namespace App\Reposititory;

use App\Models\FeedbackType;
use App\Reposititory\Interface\IFeedbackTypeReposititory;
use App\Reposititory\Reposititory;

class FeedbackTypeReposititory extends Reposititory implements IFeedbackTypeReposititory{

    protected $model;

    public function __construct(FeedbackType $model){
        $this->model = $model;
    }


}