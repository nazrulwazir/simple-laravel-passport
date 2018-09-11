<?php

namespace App\Http\Middleware;

use Closure;

class ApiHeader
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
        $acceptHeader = $request->header('Accept');
        if ('application/vnd.NAZRULWAZIR.v1+json' != $acceptHeader) {
            return response()->json(['message' => 'Invalid Accept Header'], 400);
        }

        return $next($request);
    }
}
