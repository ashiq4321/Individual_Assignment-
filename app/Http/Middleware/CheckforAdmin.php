<?php

namespace App\Http\Middleware;
use Closure;

class CheckforAdmin
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
        if(Session('role')!="admin"){
            return response()->view('admin.notadmin');
            
        }
        else{
            return $next($request);
        }
    }
}
