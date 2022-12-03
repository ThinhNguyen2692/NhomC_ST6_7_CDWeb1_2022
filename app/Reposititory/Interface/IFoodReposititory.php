<?php
namespace App\Reposititory\Interface;
use App\Reposititory\Interface\IReposititory;

interface IFoodReposititory extends IReposititory{
    public function GetAll();
    public function AddFood($model);
    public function GetById($id);
    public function UpdateFood($modelNew);
    public function DeleteFood($id);
    public function GetFoodTen();
    public function SearchFood($key);

}