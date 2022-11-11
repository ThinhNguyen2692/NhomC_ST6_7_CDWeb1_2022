<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusUser;


class UserController extends Controller
{
    private $BusUser;

    public function __construct(IBusUser $BusUser){
        $this->BusUser = $BusUser;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->BusUser->GetAllUser();
        return $this->BusUser->GetAllUser();
    }

    public function userPassword(){
        return View('user-password');
    }
    
    public function addUser(){
        return View('add-user');
    }

    public function accountInformation(){
        return View('account-information');
    }

    public function employeeList(){
         $GetUsers = $this->BusUser->GetAllUser();
        return View('employee-list')->with("users", $GetUsers);
    }

    public function Addnewuser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'user_name' => ['required','max:50'],
            'phone' => ['required','max:10'],
            'full_name' => ['required','max:255'],
            'address' => ['required','max:255'],
            'avarta' =>'required',
        ]);
        $request->hasFile('avarta');
        $img = $request->avarta;
        $Location = "..\public\images";
        $imageName = $img->getClientOriginalName();
        if(!@is_array(getimagesize($Location.$imageName))){
            $img->move($Location, $img->getClientOriginalName());
            $check = $this->BusUser->AddNewUser($request,  $imageName);
            if($check == false)  echo "<script type='text/javascript'>alert('tên tài khoản đã tồn tại');</script>";
            return View('add-user')->with("userid", $check);
        }
    }
}
