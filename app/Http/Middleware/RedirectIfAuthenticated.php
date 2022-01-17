<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    switch (Auth::guard($guard)->user()->status) {
                        case "Active":
                            return redirect()->route('cms.admin.index');
                            break;

                        case "Blocked":
                            //Design a page for blocked!
                            break;
                    }
                }
              case 'customer':
                if (Auth::guard($guard)->check()) {
                    switch (Auth::guard($guard)->user()->status) {
                        case "Active":
                            return redirect()->route('auth.customer.dashboard');
                            break;

                        case "Blocked":
                            //Design a page for blocked!
                            break;
                    }
                }
                break;
        }

        return $next($request);
    }
}
