<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use App\Models\UserOnlineStatus;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class getUserOnlineStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dump($request->user());
        if(!($request->user() === NULL) && $request->getRequestUri() != '/livewire/update'){
            if($request->user()->type == User::TYPE_PLAYER){  
                if(UserOnlineStatus::where('user_id',Auth::user()->id)->get()->count() == 0){
                    UserOnlineStatus::create(['user_id' => Auth::user()->id]);
                }else{
                    UserOnlineStatus::where('user_id',Auth::user()->id)->update(['user_id' => $request->user()->id]);
                }
            }
        }

        if($request->getRequestUri() == '/logout'){
            UserOnlineStatus::where('user_id', $request->user()->id)->delete();
        }
        
        return $next($request);
    }
}
