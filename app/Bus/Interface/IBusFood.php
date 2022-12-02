<?php

namespace App\Bus\Interface;

interface IBusFood{
    public function GetListFood();
    public function AddFood($request, $imageName);
    public function GetFoodById($id);
    public function UpdateFood($request, $imageName);
    public function DeleteFood($id);
    public function GetFoodTen();
    public function Cart($id, $quantity);


}