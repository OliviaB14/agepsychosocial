<?php

namespace AgePsychoSocial\Http\Middleware;

use Closure;

class CheckIfAdmin
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
        if ($request->user()->role->title != "admin") {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
