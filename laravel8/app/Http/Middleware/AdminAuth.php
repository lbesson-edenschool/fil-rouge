<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UsersController;
use Closure;

class AdminAuth
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
        if(UsersController::checkLogin($request)){
            return $next($request);
        } else return redirect(route('login'));
    }
}
   