<?php
namespace App\Reposititory;

use App\Models\Food;
use App\Reposititory\Interface\IFoodReposititory;
use App\Reposititory\Reposititory;

class FoodReposititory extends Reposititory implements IFoodReposititory{
    protected $model;

    public function __construct(Food $model){
        $this->model = $model;
    }

    public function GetAll(){
       return $this->all();

    }

    public function GetFoodTen(){
        return $this->model::limit(10)->get();
     }

    public function AddFood($model){
         $this->create($model);
    }
    public function GetById($id){
        $modelName = "id";
       $check = $this->findById($id, $modelName);
       return $check;
    }

    public function UpdateFood($modelNew){
        $modelName = "id";
       $this->model::where('id','=', $modelNew->id)->update($modelNew->toArray());
    }
    public function DeleteFood($id){
        $modelIdName = "id";
        $this->Delete($id,$modelIdName);
    }

    public function SearchFood($key){
        $key = "%".$key."%";
        $modelIdName = "food_name";
        return $this->Search($key, $modelIdName);
    }

    
}