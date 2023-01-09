<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessUser
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
        $user=auth()->user();
        if($user->type=='U'){
            return $next($request);
        }
        return redirect('home')->with('error','Only a user can access');;
       
    }
}
