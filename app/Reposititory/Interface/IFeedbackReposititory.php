<?php

namespace App\Reposititory\Interface;
use App\Models\Feedback;
use App\Reposititory\Interface\IReposititory;

interface IFeedbackReposititory extends IReposititory{
    public function AddFeedback($feedback);
    public function GetFeebackAll();
    public function GetFeebackByType($userId);
}