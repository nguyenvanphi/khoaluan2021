<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckLogin
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
            $role = Auth::user()->role_id;
            $result = DB::table('roles')->where('id',$role)->first();
            if($result->name==='admin')
                return redirect('/dashboard');
            else
            return redirect('/');
        }else{
            return $next($request);
        }
    }
}
