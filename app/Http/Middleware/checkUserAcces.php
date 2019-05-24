<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkUserAcces
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
        if(Auth::user()){
        return $next($request);
    }else{
        //return abort(404); pour le rederiger vers une page 404 pour plus de securiter
        return redirect(route('showClassroomList'));
    }
    }
}
