<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SocialLogin
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
        $provider = $request->route()->getParameter('provider');

        if (! in_array($provider, config('auth.social.providers'))) {
            throw new NotFoundHttpException;
        }

        return $next($request);
    }
}
