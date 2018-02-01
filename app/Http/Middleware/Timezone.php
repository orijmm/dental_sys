<?php

namespace App\Http\Middleware;

use Closure;
use Settings;
use App;
use Config;
use Auth;

class Timezone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $systemTime = (Settings::get('timezone')) ? Settings::get('timezone') : Config::get('app.timezone');
        Config::set('app.timezone', $systemTime);

        return $next($request);
    }
}
