<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRole;

class NotCustomer
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
        if ($request->user()->role === UserRole::getKey(1)) {
            return redirect()->route('index');
        }
        return $next($request);
    }
}
