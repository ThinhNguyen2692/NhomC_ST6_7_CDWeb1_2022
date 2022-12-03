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

    public function GetAll(){
        return $this->all();
     }

     public function AddFeedbackType($feedbackType){
        try{
             $this->create($feedbackType);
             return true;
        }catch(ex){
            return false;
        }
    }

    public function Deletefeedbacktype($modelId){
      try{
        $modelIdName = "feedback_type_id";
        $check = $this->Delete($modelId,$modelIdName);
      }catch(ex){
        return false;
      }
    }

    public function SearchFeedbackType($key){
      $key = "%".$key."%";
      $modelIdName = "feedback_type_name";
      return $this->Search($key, $modelIdName);
  }


}