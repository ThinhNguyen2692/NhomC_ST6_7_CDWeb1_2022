<?php

namespace App\Reposititory;

use App\Models\Feedback;
use App\Reposititory\Interface\IFeedbackReposititory;
use App\Reposititory\Reposititory;

class FeedbackReposititory extends Reposititory implements IFeedbackTypeReposititory{

    protected $model;

    public function __construct(Feedback $model){
        $this->model = $model;
    }


}