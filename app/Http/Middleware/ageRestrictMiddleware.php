<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ageRestrictMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $birthday = auth()->user()->birthday;
        $dbDate = Carbon::parse($birthday);
        $diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);

        App::setLocale('bn');

        if ($diffYears >= 10){
            return $next($request);
        }

        return redirect('dashboard');
    }
}
