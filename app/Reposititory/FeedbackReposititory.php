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

    public function GetfeedBackById($modelId){
        try {
            $modelIdName = "id";
           $check = $this->findById($modelId, $modelIdName);
           return $check;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function DeleteFeedback($modelId){
        $modelIdName = "id";
        $check = $this->Delete($modelId,$modelIdName);
        return $check;
    }

    public function GetFeebackAll(){
        return $this->model->join('feedback_type', 'feedback.feedback_type_id', '=', 'feedback_type.feedback_type_id')
        ->get();
    }

    public function GetFeebackByType($userId){
        return $this->model->join('feedback_type', 'feedback_type.feedback_type_id', '=', 'feedback.feedback_type_id')
        ->join('user_feedback','user_feedback.feedback_type_id', '=', 'feedback_type.feedback_type_id')
        ->where('user_feedback.user_id', '=', $userId)->get();
    }

    public function UpdateFeedback($feedback){
        $modelIdName = "id";
        //var_dump($feedback["id"]);
       return $this->Update($feedback, $modelIdName, $feedback["id"]);
    }

}