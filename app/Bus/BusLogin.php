<?php

namespace App\Bus;

use App\Bus\Interface\IBusLogin;

use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Interface\IUserProfileReposititory;
use Illuminate\Support\Facades\Auth;


class BusLogin implements IBusLogin{
    private $userReposititory;
    private $userProfileReposititory;

    public function __construct(IUserReposititory $userReposititory, IUserProfileReposititory $userProfileReposititory){
        $this->userReposititory = $userReposititory;
        $this->userProfileReposititory = $userProfileReposititory;
    }

    public function Login($request){
        $usser_id = $request->post('user_id');
        $password = md5( $request->post('password'));
       $check = $this->userReposititory->Login( $usser_id, $password);
      if($check){
        $userProfile =  $this->userProfileReposititory->GetById($usser_id);
        foreach ($userProfile as $item) {
            $user = [
                'user_id' => $item->user_id,
                'user_name' => $item->user_name,
                'user_fullname' => $item->full_name,
                'user_phone' => $item->phone,
                'user_postion_id' => $item->postion_id,
                'user_status' => $item->status,
                'user_address' => $item->address,
                'user_create_time_at_account' => $item->last_logged_in,
                'user_last_logged_in' => $item->last_logged_in,
                'user_avatar' => $item->avatar
            ];
        }
       
         //Auth::attempt($user);
        return $userProfile;
       }else{
        return false;
       }
    }
}