<?php

namespace App\Bus\Interface;



interface IBusFeedback{
   public function sendFeedback($request);
   public function GetAllTypeFeedback();
   public function GetFeedbackByUser($user, $postion);
   public function AddFeedBackType($request);
   public function DeletefeedbackType($feedbackTypeId);
   public function GetFeedbackbyId($id);
   public function DeleteFeeBack($modelId);
}