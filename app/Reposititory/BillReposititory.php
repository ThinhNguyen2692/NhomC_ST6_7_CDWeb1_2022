<?php

namespace App\Reposititory;

use App\Models\Bill;
use App\Reposititory\Interface\IBillReposititory;
use App\Reposititory\Reposititory;
use Illuminate\Support\Facades\DB;

class BillReposititory extends Reposititory implements IBillReposititory{

    protected $model;

    public function __construct(Bill $model){
        $this->model = $model;
    }
    public function AddBill($bill){
        try{
             $this->create($bill);
             return true;
        }catch(ex){
            return false;
        }
    }

    public function UpdateBill($bill){
        $modelIdName = "id_bill";
        //var_dump($feedback["id"]);
       return $this->Update($bill, $modelIdName, $bill["id_bill"]);
    }

    public function GetBill(){
        try{
           return $this->all();
       }catch(ex){
           return false;
       }
    }

    public function GetBillById($modelId){
        $modelIdName = "id_bill";
        return $this->findById($modelId, $modelIdName);
    }
    
    public function DeleteBill($modelId){
        $modelIdName = "id_bill";
        $check = $this->Delete($modelId,$modelIdName);
        return $check;
    }

     
    public function UpdateBillstatus($model){
        $modelIdName = "id_bill";
        $check = $this->Update($model,$modelIdName,$model["id_bill"]);
    }
}