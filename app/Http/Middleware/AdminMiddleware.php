<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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

        $allowed_role_ids = [2,3];

        if (!in_array($request->user()->role_id, $allowed_role_ids))
        {
            return redirect('/');
        }

        return $next($request);
    }
}
