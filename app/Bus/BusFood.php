<?php

namespace App\Bus;

use App\Bus\Interface\IBusFood;
use Cart;
use App\Reposititory\Interface\IFoodReposititory;
use App\Reposititory\Interface\IBillDetailReposititory;
use App\Reposititory\Interface\IBillReposititory;
use Illuminate\Support\Facades\Cookie;
use App\Models\Food;
use App\Models\Bill;
use App\Models\BillDetail;


class BusFood implements IBusFood{
    private $foodReposititory;
    private $billDetailReposititory;
    private $billReposititory;
    public function __construct(IFoodReposititory $foodReposititory, IBillDetailReposititory $billDetailReposititory,IBillReposititory $billReposititory ){
        $this->foodReposititory = $foodReposititory;
        $this->billDetailReposititory = $billDetailReposititory;
        $this->billReposititory = $billReposititory;
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

    public function Cart($request){
        $id = $request->get("id");
        $name = $request->get("name");
        $image = $request->get("image");
        $price = $request->get("price");
        $quantity = $request->get("quantity");
        Cart::add($id,$name,$quantity,$price,0,['image'=>$image]);
    }

    public function Deletecart($request){
        $id = $request->get("id");
        Cart::remove($id);
    }

    public function UpdateCart($request){
        foreach (Cart::content() as $item){
            Cart::update($item->rowId, $request->post($item->rowId));
        }
    }

    public function UpdateCartDB(){
        foreach (Cart::content() as $item){
           $check = $this->foodReposititory->GetById($item->id);
            Cart::update($item->rowId, ['price'=> $check[0]->food_price]);
        }
    }

    public function AddBill($request){
        $bill = new Bill();
        $bill->id_bill = $this->generateRandomString(10);
        $bill->name = $request->get("name");
        $bill->phone = $request->get("phone");
        $bill->email = $request->get("email");
        $bill->address = $request->get("address");
        $bill->status = 0;
        $bill->total = 0;
        $this->billReposititory->AddBill($bill);
       
        foreach (Cart::content() as $item){
           $billDetail = new BillDetail();
           $billDetail->id_bill = $bill->id_bill;
           $billDetail->food_id = $item->id;
           $billDetail->food_name = $item->name;
           $billDetail->food_price = $item->price;
           $billDetail->quantity = $item->qty;
           $billDetail->total = $item->qty*$item->price;
           $bill->total = $bill->total +  $billDetail->total;
           $this->billDetailReposititory->AddBillDetail($billDetail);
         }
         $this->billReposititory->UpdateBill($bill->toArray());
         Cart::destroy();
         return $bill->id;
    }
   
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function GetBillAll(){
      return $this->billReposititory->GetBill();
    }
    public function GetBillById($id){
        return $this->billReposititory->GetBillById($id);
    }
    public function GetBillDetailById($id){
        return $this->billDetailReposititory->GetBillDetailById($id);
    }

    public function DeleteBill($id){
        $this->billDetailReposititory->DeleteBillDetail($id);
        $this->billReposititory->DeleteBill($id);
    }
}