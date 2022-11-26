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
    public function all(): Collection{
        return $this->model->all();
    }
    public function findById($modelId, $modelIdName){
        return $this->model::where($modelIdName, $modelId)->limit(1)->get();
    }
    public function create($model){
    $this->model->insert($model->toArray());
    }

    public function Delete($modelId, $modelIdName){
        return $this->model::where($modelIdName, $modelId)->delete();
    }
    
    
}