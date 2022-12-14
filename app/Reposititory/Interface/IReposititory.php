<?php

namespace App\Reposititory\Interface;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IReposititory{
 public function all();
  public function findById($modelId, $modelIdName);
 public function create($model);
 public function Delete($modelId, $modelIdName);
 public function Update($model, $modelIdName, $modelId);
 public function GetFoodTen();
 public function Search($key, $modelIdName);
}