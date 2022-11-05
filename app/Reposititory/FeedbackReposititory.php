<?php

namespace App\Reposititory;

use App\Models\Feedback;
use App\Reposititory\Interface\IFeedbackReposititory;
use App\Reposititory\Reposititory;
use Illuminate\Support\Facades\DB;

class FeedbackReposititory extends Reposititory implements IFeedbackReposititory{

    protected $model;

    public function __construct(Feedback $model){
        $this->model = $model;
    }
    public function AddFeedback($feedback){
        try{
             $this->create($feedback);
             return true;
        }catch(ex){
            return false;
        }
    }

    public function GetFeebackAll(){
        $this->model->all();
    }
}