<?php

namespace App\Http\Middleware;

use App;
use Closure;
use View;

class Localization {
    public function handle($request, Closure $next) {
        $language = $request->route()->parameter('lang');

        App::setLocale($language);

        // Not super necessary unless you really want to use
        // number_format or even money_format.
        if ($language == "en") {
            setLocale(LC_ALL, "en_US.UTF-8");
        } else {
            setLocale(LC_ALL, $language."_CH.UTF-8");
        }

        View::share('lang', $language);

        return $next($request);
    }
}
