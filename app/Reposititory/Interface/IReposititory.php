<?php

namespace App\Reposititory\Interface;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IReposititory{
 public function all(): Collection;
 public function findById(int $modelId): ?Model;
}


