<?php

namespace App\Http\Middleware;

use Closure;

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
        $admin=$request->session()->get('admin');
        if(!$admin){
             return redirect('/log/create')->with('msg','请您先登录');
        }
        return $next($request);
    }
}
