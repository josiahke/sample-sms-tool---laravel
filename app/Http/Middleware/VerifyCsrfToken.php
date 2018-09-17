<?php

namespace App\Http\Middleware;

//use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;
use Route;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

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
        $route = Route::getRoutes()->match($request);
        $routeAction = $route->getAction();

        if (isset($routeAction['nocsrf']) && $routeAction['nocsrf']) {
            return $next($request);
        }

        try
        {
            return parent::handle($request, $next);
        }
        catch(TokenMismatchException $e)
        {
            return redirect()->back()->withError('Token Mismatch !! Have you been away? Please try submitting the form afresh !')->withInput()->withErrors(['tokenMismatch' => 'Have you been away? Please try submitting the form again!']);
        }
        //return parent::handle($request, $next);
    }

}
