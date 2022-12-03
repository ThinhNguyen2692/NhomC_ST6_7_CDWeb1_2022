<?php
namespace App\Reposititory;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Reposititory\Interface\IReposititory;


class Reposititory implements IReposititory{

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function all(){
        return $this->model->paginate(5);
    }
    public function findById($modelId, $modelIdName){
        return $this->model::where($modelIdName, $modelId)->limit(1)->get();
    }

    public function GetFoodTen(){
        return $this->model::limit(10)->get();
    }

    public function create($model){
    $this->model->insert($model->toArray());
    }

    public function Delete($modelId, $modelIdName){
        return $this->model::where($modelIdName, $modelId)->delete();
    }
    
    public function Update($modelNew, $modelIdName, $modelId){
        $model = $this->model::where($modelIdName, $modelId);
        
         return $model->update($modelNew);
    }
    
    public function Search($key, $modelIdName){
        return  $this->model::where($modelIdName, 'like', $key)->paginate(5); 
    }

}