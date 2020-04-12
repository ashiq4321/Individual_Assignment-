<?php

namespace App\Http\Middleware;
use Closure;

class checkforBusManager
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
        if(Session('role')!="busmanager"){
            return response()->view('busmanager.notbusmanager');
            
        }
        else{
            return $next($request);
        }
    }
}
