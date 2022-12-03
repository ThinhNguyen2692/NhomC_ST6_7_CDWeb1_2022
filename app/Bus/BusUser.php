<?php

namespace App\Bus;
use App\Bus\Interface\IBusUser;
use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Interface\IUserProfileReposititory;

use App\Reposititory\Interface\IUserFeedbackReposititory;
use App\Models\UserFeedback;
use App\Models\UserProfile;
use App\Models\User;

class BusUser implements IBusUser{
    private $userReposititory;
    private $userProfileReposititory;
    private $userFeedbackReposititory;

    public function __construct(IUserReposititory $userReposititory, IUserProfileReposititory $userProfileReposititory, IUserFeedbackReposititory  $userFeedbackReposititory){
        $this->userReposititory = $userReposititory;
        $this->userProfileReposititory = $userProfileReposititory;
        $this->userFeedbackReposititory = $userFeedbackReposititory;
    }
    
    public function GetAllUser(){
        $getalluser = $this->userProfileReposititory->GetAll();
        return $getalluser;
    }
    public function GetFindById($id){
        $getuser = $this->userReposititory->findById($id);
       // var_dump($getuser);
        return $getuser;
    }

    public function AddNewUser($request, $imageName){
      
      
        $user = new User();
        $user->user_name = $request->post('user_name');
        $user->password = md5("123456789");
        try {
            $check = $this->userReposititory->AddUser($user);
          }
          catch (Exception $e) {
            return false;
          }
          $userNew = $this->userReposititory->GetUserByName($user->user_name);
          
          foreach ($userNew as $item) {
            $user->user_id =  $item->user_id;
          }
       
        
        $userProfile = new UserProfile();
        $userProfile->user_id =  $user->user_id;
        $userProfile->full_name = $request->post('full_name');
        $userProfile->phone = $request->post('phone');
        $userProfile->address = $request->post('address');
        $userProfile->email = $request->post('email');
        $userProfile->postion_id = $request->post('postion_id');
        $userProfile->status = 1;
        $month = date('m');
        $day = date('d');
        $year = date('Y');
        
        $today = $year . '-' . $month . '-' . $day;
        $userProfile->create_time_at_account = $today;
        $userProfile->last_logged_in = $today;
        $userProfile->avatar = $imageName;
        $check = $this->userProfileReposititory->AddUserProfile($userProfile);
        $userFeedback = new UserFeedback();
        $userFeedback->user_id =  $user->user_id;   
        $userFeedback->feedback_type_id = $request->post('feedback_type_id');
        $check = $this->userFeedbackReposititory->AddUserFeedback($userFeedback);
        return $user->user_id;   
    }

    public function GetInformationUser($id){
    $user = $this->userProfileReposititory->GetInformationUser($id);
      $user["password"] = "";
      return $user;
    }


    public function AdminUpdatePass($request){
      $user_id = $request->get("id");
      $pass = md5("123456789");
      $this->userReposititory->UpdatePass($pass,$user_id);
    }

    public function UpdatePass($request, $user_id){
      $password = md5($request->post("password"));
      $check = $this->userReposititory->Login( $user_id, $password);
     
       if(count($check) != 0){
         $pass = md5($request->post("passwordNew"));
         $this->userReposititory->UpdatePass($pass,$user_id);
         return true;
       }
      return false;
      
    }

    public function UpdateUser($request){
      $userProfile = new UserProfile();
      $userProfile->user_id = $request->post('user_id');
      $userProfile->full_name = $request->post('full_name');
      $userProfile->phone = $request->post('phone');
      $userProfile->address = $request->post('address');
      $userProfile->email = $request->post('email');
      $userProfile->postion_id = $request->post('postion_id');
      $userProfile->status = $request->post('status');
    
      $userProfile->create_time_at_account = $request->post('create_time_at_account');
      $userProfile->last_logged_in = $request->post('last_logged_in');
      $userProfile->avatar = $request->post('avatar');
      $check = $this->userProfileReposititory->UpdateUser($userProfile);
      $userFeedback = new UserFeedback();
      $userFeedback->user_id =  $request->post('user_id');
      $userFeedback->feedback_type_id = $request->post('feedback_type_id');
      $check = $this->userFeedbackReposititory->UpdateUserTyupe($userFeedback);
    }

    public function DeleteUser($modelId){
      $this->userFeedbackReposititory->DeleteUserType($modelId);
      $this->userProfileReposititory->DeleteUserProfile($modelId);
      $this->userReposititory->DeleteUser($modelId);

    }

    public function SearchUser($key){
      return  $this->userProfileReposititory->SearchUser($key);
    }

}