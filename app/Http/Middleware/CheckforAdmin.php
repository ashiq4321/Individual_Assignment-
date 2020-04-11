<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use App\User;
use Closure;
use Illuminate\Http\Request;

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
       
        if($request->session()->get('role')!="admin"){
                return view('admin.notadmin');
            }
        else{
            return $next($request);
        }
    }
}
