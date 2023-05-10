<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $redirectToRoute = null): Response
    {

        if($request->user()->rol === 1){
            if ($request->user() && $request->user() instanceof MustVerifyEmail && ! $request->user()->hasVerifiedEmail()) {
                return $request->expectsJson()
                    ? abort(403, 'Your email address is not verified.')
                    : Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));
            }
        }else{
            if ($request->user() && $request->user() instanceof MustVerifyEmail && ! $request->user()->hasVerifiedEmail()) {
                //dd('Holaaaa...');
                return $request->expectsJson()
                    ? abort(403, 'Your email address is not verified.')
                    : Redirect::guest(URL::route($redirectToRoute ?: 'empresa-validacion.create'));
            }
        }

        return $next($request);
    }
}
