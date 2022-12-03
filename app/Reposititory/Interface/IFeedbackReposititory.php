<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IFeedbackReposititory extends IReposititory{
    public function AddFeedback($feedback);
    public function GetFeebackAll($status);
    public function GetFeebackByType($userId);
    public function GetfeedBackById($modelId);
    public function DeleteFeedback($modelId);
    public function UpdateFeedback($feedback);
    public function SearchFeedback($key);
    public function GetFeebackAllCheck();
}