<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->roleID == 3){
                return redirect()->intended('asm/trainerinformation/'.Auth::user()->id);
            }
            else if(Auth::user()->roleID ==1){
                return redirect()->intended('asm/viewaccount');
            }
            else if(Auth::user()->roleID ==2){
                return redirect()->intended('asm/trainingmenu');
            }
        }
        return $next($request);
    }
}
