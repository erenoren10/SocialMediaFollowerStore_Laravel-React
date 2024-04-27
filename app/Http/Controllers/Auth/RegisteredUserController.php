<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'string', 'max:255'],
            

        ]);


        $parent = User::where('user_code',$request['referance'])->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'user_code'=> uniqid(),
            'user_parent_id' =>$parent != null ? $parent -> id : 0,
            
        ]);

        event(new Registered($user));

        Auth::login($user);

        if (Auth::user()->isAdmin()) {
            return redirect()->intended(RouteServiceProvider::HOME)->with('Profile Login Successfully'); // Admin sayfasına yönlendirme
        }

        return redirect()->intended(RouteServiceProvider::SHOME)->with('Profile Login Successfully'); // Diğer kullanıcılar için site ana sayfasına yönlendirme
    }
}
