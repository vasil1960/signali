<?php

namespace App\Http\Middleware;

use Closure;

class Access112
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

        // if($request->session()->get('Access112') === 0){
        //     return redirect('https://sysytem.iag.bg');
        // }

        return $next($request);
    }
}
