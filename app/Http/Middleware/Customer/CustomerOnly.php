<?php

namespace App\Http\Middleware\Customer;

use Closure;
use App\Enums\UserRole;

class CustomerOnly
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
        dd($request->user->role);
        if ($request->user->role === UserRole::getKey(1)) {
            return redirect()->route('customer.login');
        }
        return $next($request);
    }
}
