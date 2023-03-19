<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {
        $user = Auth::user();
        foreach($roles as $role) {
            if($role == 'student' && $user->profile_type == 'App\Models\student') {
                return $next($request);
            }
            elseif($role == 'Admin' && $user->profile_type == 'App\Models\Admin') {
                return $next($request);
            }
        }

        return redirect()->route('login');
    }
}
