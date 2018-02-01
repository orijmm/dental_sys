<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Cookies\CookieServiceProvider;
use Illuminate\Session\Middleware\StartSession;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {
	    if ($this->isReading($request) || $this->tokensMatch($request))
	    {
	        return $this->addCookieToResponse($request, $next($request));
	    }

    	return $next($request);
  	}
}
