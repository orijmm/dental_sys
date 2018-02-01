<?php 

namespace App\Http\Middleware;

use Closure;
use Settings;
use Session;
use Illuminate\Support\Facades\Auth;

class Locale {

/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */
public function handle($request, Closure $next, $guard = null)
{
    $systemLang = (Session::has('locale')) ? Session::get('locale') : Settings::get('language_default');
    app()->setLocale($systemLang);

    return $next($request);
}

}