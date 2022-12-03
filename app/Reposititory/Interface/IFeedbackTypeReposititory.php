<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IFeedbackTypeReposititory extends IReposititory{
    public function GetAll();
    public function AddFeedbackType($feedbackType);
    public function Deletefeedbacktype($modelId);
    public function SearchFeedbackType($key);
}