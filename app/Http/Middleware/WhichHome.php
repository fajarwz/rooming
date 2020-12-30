<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class WhichHome
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
        if(Auth::user() && (Auth::user()->role == 'USER'))
            return $next($request);
        elseif(Auth::user() && (Auth::user()->role == 'ADMIN'))
            return redirect('/admin');
        return response('Unauthorized. <a href="javascript:history.back()">Go Back</a>', 401);
    }
}
