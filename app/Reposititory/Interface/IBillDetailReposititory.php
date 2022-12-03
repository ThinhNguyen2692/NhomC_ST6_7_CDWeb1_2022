<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IBillDetailReposititory extends IReposititory{
    public function AddBillDetail($billDetail);
    public function GetBillDetailById($modelId);
    public function DeleteBillDetail($modelId);
}