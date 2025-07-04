<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        if (in_array($locale, config('translatable.locales'))) {
            App::setLocale($locale);
        } else {
            // 設置默認語系
            $defaultLocale = config('app.locale', 'zh_TW'); // 使用 zh-TW 作為備用默認值
            App::setLocale($defaultLocale);
        }
        // 檢查語系是否在配置的 translatable.locales 中
        // if (in_array($locale, config('translatable.locales', []))) {
        //     App::setLocale($locale);
        //     session(['locale' => $locale]); // 儲存到 session 以保持一致
        // } else {
        //     // 設置默認語系
        //     $defaultLocale = config('app.locale', 'zh_TW');
        //     App::setLocale($defaultLocale);
        //     session(['locale' => $defaultLocale]);
        // }

        return $next($request);
    }
}
