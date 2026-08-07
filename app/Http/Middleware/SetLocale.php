<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public const array SUPPORTED_LOCALES = ['ar', 'en'];

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->session()->get('locale', 'ar');

        if (! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            $locale = 'ar';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
