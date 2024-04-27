<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Başarılı giriş işlemi
            return redirect()->intended('dashboard');
        } else {
            // Hatalı giriş işlemi
            return redirect()->route('login')->withErrors(['login' => 'Kullanıcı adı veya şifre yanlış.']);
        }
        
        $request->authenticate();

        $request->session()->regenerate();

        $notification = array(
            'message' => 'Profile Login Successfully',
            'alert-type' => 'success'
        );

        if (Auth::user()->isAdmin()) {
            return redirect()->intended(RouteServiceProvider::HOME)->with($notification); // Admin sayfasına yönlendirme
        }

        return redirect()->intended(RouteServiceProvider::SHOME)->with($notification); // Diğer kullanıcılar için site ana sayfasına yönlendirme
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        

        return redirect('/');
    }
}
