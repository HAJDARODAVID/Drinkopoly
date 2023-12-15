<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserOnlineStatus;

class UserController extends Controller
{
    static public function getUserOnlineStatus($user){
        //7200s => 120min
        $player = UserOnlineStatus::where('user_id', $user)->first();
        if(!($player===NULL) && time()-strtotime($player->updated_at)<7200){
            return true;
        }else{
            return false;
        }
    }
}
