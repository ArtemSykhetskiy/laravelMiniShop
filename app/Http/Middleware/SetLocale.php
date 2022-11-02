<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Cookie::get('locale')){
            App::setLocale('en');
            Cookie::queue('locale', 'en', 3600);
        }else{
            $locale = Cookie::get('locale');
            App::setLocale($locale);
        }

//        if(session('locale') && in_array(session('locale'), config('app.available_locales'))){
//            App::setLocale(session('locale'));
//        }

        return $next($request);
    }
}
