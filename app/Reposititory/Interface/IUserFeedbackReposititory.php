<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IUserFeedbackReposititory extends IReposititory{
    public function AddUserFeedback($userFeedback);
    public function UpdateUserTyupe($UserTyupe);
    public function DeleteUserType($modelId);
}