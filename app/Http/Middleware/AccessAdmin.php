<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessAdmin
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
        if($user->type=='A'){
            return $next($request);
        }
        return redirect('home')->with('error','Only a administrator can manage users');;
       
    }
}
