<?php

namespace App\Bus\Interface;



interface IBusFeedback{
   public function sendFeedback($request);
   public function GetAllTypeFeedback();
   public function Login($request);
}