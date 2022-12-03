<?php

namespace App\Bus\Interface;

interface IBusFood{
    public function GetListFood();
    public function AddFood($request, $imageName);
    public function GetFoodById($id);
    public function UpdateFood($request, $imageName);
    public function DeleteFood($id);
    public function GetFoodTen();
    public function Cart($request);
    public function Deletecart($request);
    public function UpdateCart($request);
    public function UpdateCartDB();
    public function AddBill($request);
    public function GetBillAll();
    public function GetBillDetailById($id);
    public function GetBillById($id);
    public function DeleteBill($id);
    public function UpdateBill($id);
    public function Search($key);
}