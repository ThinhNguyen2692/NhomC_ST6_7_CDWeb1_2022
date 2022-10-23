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
    public function findById(int $modelId): ?Model{
        return $this->model->find($modelId);
    }
}
