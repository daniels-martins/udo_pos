<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        // dd(Auth::guard('emp')->check());
        if (Auth::guard('web')->check())   return   redirect()->intended(RouteServiceProvider::HOME);

        if  (Auth::guard('emp')->check())   return redirect(RouteServiceProvider::HOMEY);
        // return redirect('/login');

            
        // bug 
        // https://laracasts.com/discuss/channels/laravel/default-guard-set-in-middleware-being-overwritten
        // $guardsConfigArray = config('auth.guards');
        // $guards = array_keys($guardsConfigArray);
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         Auth::shouldUse($guard);
        //         $finalGuard = $guard;
        //     }
        // }
        // dd($finalGuard);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if (Auth::guard('web')->check()) Auth::guard('web')->logout();
        if (Auth::guard('emp')->check()) Auth::guard('emp')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
