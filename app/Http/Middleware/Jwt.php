<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions as JWTExceptions;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

/**
 * Class Jwt
 * @package App\Http\Middleware
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class Jwt extends BaseMiddleware
{
    /**
     * Handle an incoming request to ensure every call to the api has a
     * valid token
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @throws JWTExceptions\
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if (empty($user)) {
            return response()->json(['status' => 'User not authorized']);
        }
        return $next($request);
    }
}
