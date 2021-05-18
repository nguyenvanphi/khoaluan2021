<?php

namespace App\Http\Middleware;

use Closure;

class CheckInfo
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
        if(session('info_order')){
            return $next($request);
        }else{
            return redirect('/shop');
        }
    }
}
