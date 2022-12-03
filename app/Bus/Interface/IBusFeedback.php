<?php

namespace App\Bus\Interface;



interface IBusFeedback{
   public function sendFeedback($request);
   public function GetAllTypeFeedback();
   public function GetFeedbackByUser($user, $postion,$status);
   public function AddFeedBackType($request);
   public function DeletefeedbackType($feedbackTypeId);
   public function GetFeedbackbyId($id);
   public function DeleteFeeBack($modelId);
   public function Reply($request);
   public function SearchFeedback($key);
   public function SearchFeedbackType($key);
}