<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Cek role user
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('message', 'You are already logged in!');
            } elseif ($user->role == 'employee') {
                return redirect()->route('employee.dashboard')->with('message', 'You are already logged in!');
            } else {
                return redirect()->route('error.permission');
            }
        }
        return $next($request);
    }
}
