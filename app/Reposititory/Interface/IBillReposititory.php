<?php

namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IBillReposititory extends IReposititory{
    public function AddBill($bill);
    public function UpdateBill($bill);
    public function GetBillById($modelId);
    public function DeleteBill($modelId);
    public function UpdateBillstatus($model);
}