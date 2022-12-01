<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusUser;
use App\Bus\Interface\IBusFeedback;


class UserController extends Controller
{
    private $BusUser;
    private $busFeedback;

    public function __construct(IBusUser $BusUser,IBusFeedback $busFeedback){
        $this->BusUser = $BusUser;
        $this->busFeedback = $busFeedback;
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
    public function ShowUser(Request $request){
        $user_id = $request->get('user_id');
        if($user_id != Cookie::get('user_id')){
            if(Cookie::get('postion_id') != 1){
                return to_route('feedback');
            }
        }
        $UserInformation = $this->BusUser->GetInformationUser($user_id);
        $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
        return View('account-information')->with('UserInformation',$UserInformation)->with('TypeFeedbacks',$TypeFeedbacks);;
    }
}
