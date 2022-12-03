<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus\Interface\IBusFood;
use Cookie;
use  App\Models\Food;

class FoodController extends Controller
{
    private $busFood;

    public function __construct(IBusFood $busFood){
        $this->busFood = $busFood;
    }

    public function Index(){
        $viewModel = $this->busFood->GetListFood();
        return View("view-food")->with("foods",$viewModel);
    }

    public function AddViewFood(){
        $model = new Food(); 
        $model->id =0;
        return View("food-add")->with('food', $model);
    }

    public function AddFood(Request $request){

        $request->validate([
            'food_name' => 'required',
            'food_price' => 'required',
            'food_description' => 'required',
            'food_Image' => 'required'
        ]);


        $request->hasFile('food_Image');
        $img = $request->food_Image;
        $Location = "..\public\images";
        $imageName = $img->getClientOriginalName();
        if(!@is_array(getimagesize($Location.$imageName))){
            $img->move($Location, $img->getClientOriginalName());
            $mess = $this->busFood->AddFood($request, $imageName);
            $model = new Food(); 
            $model->id =0;
            return View("food-add")->with('food', $model)->with('mess', $mess);
        }
    }

    public function Showfood(Request $request){
        $id = $request->get("id");
        $model = $this->busFood->GetFoodById($id);
        if($model == null){ $model = new Food(); 
            $model->id =0;
            return View("food-add")->with('food', $model)->with('mess', "Không tồn tại");
        }
      
        return View("food-add")->with('food', $model);
    }

    public function UpdateFood(Request $request){
        $imageName = "";
        if($request->hasFile("food_Image") == true){
            $request->hasFile('food_Image');
            $img = $request->food_Image;
            $Location = "..\public\images";
            $imageName = $img->getClientOriginalName();
            if(!@is_array(getimagesize($Location.$imageName))){
                $img->move($Location, $img->getClientOriginalName());
            }
        }
        else $imageName = $request->post("food_Image_2");

        $this->busFood->UpdateFood($request,$imageName);
        //var_dump($imageName);
       return redirect()->back();

    }

    public function DeleteFood(Request $request){
        $token = md5(Cookie::get('user_id')."quananngon");
        $id = $request->get("id");
        if($token != $request->get("token") ){
            return redirect()->back();
        }
        
       $mess = $this->busFood->DeleteFood($id);
       $viewModel = $this->busFood->GetListFood();
        return View("view-food")->with("foods",$viewModel)->with('mess', $mess);
    }


    public function ViewBill(){
        $viewModel = $this->busFood->GetBillAll();
        return View("view-bill")->with("bills",$viewModel);
    }

    public function ViewBillDetail(Request $request){
        $id = $request->get("id");
        $bill = $this->busFood->GetBillById($id);
        $billDetail = $this->busFood->GetBillDetailById($id);
        return View("view-bill-Detail")->with("bill",$bill)->with("billDetail",$billDetail);
    }

    public function DeleteBill(Request $request){
        $token = md5(Cookie::get('user_id')."quananngon");
        $id = $request->get("id");
        if($token != $request->get("token") ){
            return redirect()->back();
        }
        $this->busFood->DeleteBill($id);
        return redirect()->back();
    }
    
}
