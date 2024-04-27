<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class CheckAdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $userId = $request->user()->id;

            if ($userId !== 1) {
                return redirect('/'); // Ya da başka bir sayfaya yönlendirebilirsiniz.
            }
        }else{
            return redirect('/login');
        }

        return $next($request);
    }

}

class CheckUserAccessToDashboard
{
    public function handle($request, Closure $next)
    {
        // Kullanıcı giriş yapmış mı kontrol edelim.
        if (Auth::check()) {
            // Giriş yapmış kullanıcı var, bu kullanıcının ID'sini alalım.
            $userId = Auth::id();

            // ID'si 1 olan kullanıcılara erişime izin verelim, diğerlerine erişim izni vermeyelim.
            if ($userId == 1) {
                return $next($request);
            }
        }

        // Buraya kadar ulaşıldıysa, kullanıcı ID'si 1 olmayan veya giriş yapmamış demektir. Erişime izin verilmeyecektir.
        abort(403, 'Unauthorized access.'); // 403 HTTP hatası ile erişimi reddediyoruz.
    }
}

