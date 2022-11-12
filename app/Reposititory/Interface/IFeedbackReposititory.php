<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IFeedbackReposititory extends IReposititory{
    public function AddFeedback($feedback);
    public function GetFeebackAll();
    public function GetFeebackByType($userId);
    public function GetfeedBackById($modelId);
    public function DeleteFeedback($modelId);
}