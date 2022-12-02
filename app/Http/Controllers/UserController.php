<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bus\Interface\IBusUser;
use App\Bus\Interface\IBusFeedback;
use Illuminate\Support\Facades\Cookie;

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
        $user_id = $request->get('id');
        if($user_id != Cookie::get('user_id')){
            if(Cookie::get('postion_id') != 1){
                return to_route('feedback');
            }
        }
        $UserInformation = $this->BusUser->GetInformationUser($user_id);
        $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
        return View('account-information')->with('UserInformation',$UserInformation)->with('TypeFeedbacks',$TypeFeedbacks);
    }

    public function InfomationUserLogin(){
      $id = Cookie::get('user_id');
      if(!$id){  return to_route(''); }
     $UserInformation = $this->BusUser->GetInformationUser($id);
    $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
    return View('account-information')->with('UserInformation',$UserInformation)->with('TypeFeedbacks',$TypeFeedbacks);
    }

    public function AdminUpdatePass(Request $request){
        $token = md5(Cookie::get('user_id')."quananngon");
        if($token != $request->get("token")){
            return redirect()->back();
        }
     $this->BusUser->AdminUpdatePass($request);
     return redirect()->back();

    }
    public function UpdatePass(Request $request){
        $request->validate([
            'password' => 'required',
            'passwordNew' => 'required',
            'passwordNew2' => 'required',
        ]);
        if($request->post("passwordNew") != $request->post("passwordNew2")) {
            return View('user-password')->with('mess',"Mật khẩu không trùng khớp");
        }
        $user_id = Cookie::get('user_id');
        $check = $this->BusUser->UpdatePass($request, $user_id);
        if($check){ $mess = "Đổi mật khẩu thành công";} else $mess = "Đổi mật khẩu thất bại";
     return View('user-password')->with('mess',$mess);
    }

    public function UpdateUser(Request $request){
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $this->BusUser->UpdateUser($request);
        return redirect()->back();
    }

    public function DeleteUser(Request $request){
        $token = md5(Cookie::get('user_id')."quananngon");
        $user_id = $request->get("id");
        if($token != $request->get("token") || Cookie::get('user_id') == $user_id){
            return redirect()->back();
        }
        
       $this->BusUser->DeleteUser($user_id);
        return redirect()->back();
    }
}
