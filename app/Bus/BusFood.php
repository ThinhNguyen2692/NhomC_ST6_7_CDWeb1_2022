<?php

namespace App\Bus;

use App\Bus\Interface\IBusFood;

use App\Reposititory\Interface\IFoodReposititory;
use Illuminate\Support\Facades\Cookie;
use App\Models\Food;


class BusFood implements IBusFood{
    private $foodReposititory;
    public function __construct(IFoodReposititory $foodReposititory){
        $this->foodReposititory = $foodReposititory;
        
    }

    public function GetListFood(){
        return $this->foodReposititory->GetAll();
    }

    public function AddFood($request, $imageName){
        $food = new Food();
        $food->food_name = $request->post("food_name");
        $food->food_price = $request->post("food_price");
        $food->food_description = $request->post("food_description");
        $food->food_Image = $imageName;

        try {
            $this->foodReposititory->AddFood($food);
            return "Thêm món thành công";
        } catch (\Throwable $th) {
            return "Thêm món thất bại";
        }
        
       
     
    }

    public function GetFoodById($id){
        $check = $this->foodReposititory->GetById($id);
        if(count($check) == 0) return null;
        $model = new Food();
        $model->id = $check[0]->id;
        $model->food_name = $check[0]->food_name;
        $model->food_price = $check[0]->food_price;
        $model->food_Image = $check[0]->food_Image;
        $model->food_description = $check[0]->food_description;
        return $model;
    }


    public function UpdateFood($request, $imageName){
        $food = new Food();
        $food->id = $request->post("food_id");
        $food->food_name = $request->post("food_name");
        $food->food_price = $request->post("food_price");
        $food->food_description = $request->post("food_description");
        $food->food_Image = $imageName;

        try {
            $this->foodReposititory->UpdateFood($food);
            return "Thêm món thành công";
        } catch (\Throwable $th) {
            return "Thêm món thất bại";
        }
        
       
     
    }

    public function DeleteFood($id){
        try {
            $this->foodReposititory->DeleteFood($id);
            return "Xóa thành công";
        } catch (\Throwable $th) {
            return "Xóa thất bại";
        }
       
    }


    public function GetFoodTen(){
        return $this->foodReposititory->GetFoodTen();
    }

   
      
}