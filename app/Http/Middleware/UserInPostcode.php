<?php

namespace App\Http\Middleware;

use Closure;

class UserInPostcode
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
        if ($request->user->postcode !== auth()->user()->postcode) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
