<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return Auth::guard('web')->check()
            ?   redirect()->intended(RouteServiceProvider::HOME)
            :   redirect()->intended(RouteServiceProvider::HOMEY);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // former setting
        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect('/');

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
