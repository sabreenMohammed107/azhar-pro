<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redirect;
use Closure;
use Auth;
class IsAdmin
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
    //     if(auth()->user()){
          
    //         if(auth()->user()->is_admin == 1){
    //             // return Redirect::to('admin/home');
    //             return $next($request);
    //         }
    //     }else{
    //         return Redirect::to('/home');
    //     }
       
    //     return $next($request);
       
    // }
    if (Auth::user() &&  Auth::user()->is_admin == 1) {
        return $next($request);
   }

   return redirect('/login')->with('error','You have not admin access');
}
}

