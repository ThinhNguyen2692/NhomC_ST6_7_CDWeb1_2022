<?php

namespace App\Reposititory;

use App\Models\BillDetail;
use App\Reposititory\Interface\IBillDetailReposititory;
use App\Reposititory\Reposititory;
use Illuminate\Support\Facades\DB;

class BillDetailReposititory extends Reposititory implements IBillDetailReposititory{

    protected $model;

    public function __construct(BillDetail $model){
        $this->model = $model;
    }
    public function AddBillDetail($billDetail){
        try{
             $this->create($billDetail);
             return true;
        }catch(ex){
            return false;
        }
    }
    public function GetBillDetailById($modelId){
        return $this->model::where("id_bill", '=', $modelId)->get();
    }

    public function DeleteBillDetail($modelId){
        $modelIdName = "id_bill";
        $check = $this->Delete($modelId,$modelIdName);
        return $check;
    }
}