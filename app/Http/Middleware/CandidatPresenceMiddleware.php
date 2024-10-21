<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CandidatPresenceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Auth::check() &&
            (Auth::user()->role === 'Scolarité') ||
            Auth::user()->role === 'Accueil' ||
            Auth::user()->role === 'SI Admin'
        ) {
            return $next($request);
        }
        return abort(401);
    }
}
