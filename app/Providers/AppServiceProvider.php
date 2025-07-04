<?php

namespace App\Providers;

use App\Models\Admin\VisitorLog;
use App\Services\DatabaseTranslationLoader;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\Translator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // 取代 translation.loader
        $this->app->singleton('translation.loader', function ($app) {
            return new DatabaseTranslationLoader();
        });

        // 重新綁定 translator 為使用新 loader 的 Translator
        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];
            $locale = $app['config']['app.locale'];
            $trans = new Translator($loader, $locale);
            $trans->setFallback($app['config']['app.fallback_locale']);
            return $trans;
        });

        // 直接覆寫翻譯方法(關鍵)
        \Illuminate\Support\Facades\Lang::macro('get', function($key, array $replace = [], $locale = null) {
            $locale = $locale ?: app()->getLocale();

            // 先從快取獲取如果沒有直接從資料庫獲取翻譯
            $cacheKey = "translations.{$locale}.{$key}";
            $cachedTranslation = Cache::get($cacheKey);
            if ($cachedTranslation) {
                return $cachedTranslation;
            }

            $translation = \App\Models\Admin\TranslationsInfo::where('key', $key)->first();
            if ($translation && isset($translation->translations[$locale])) {
                // 將翻譯存入快取
                Cache::put($cacheKey, $translation->translations[$locale], 60 * 24 * 60); // 60天快取
                // 返回翻譯
                return $translation->translations[$locale];
            }

            // 返回原始鍵
            return trans($key, $replace, $locale);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if (
            request()->server('HTTP_X_FORWARDED_PROTO') == 'https' ||
            request()->server('HTTPS') == 'on' ||
            env('FORCE_HTTPS', false)
        ) {
            \URL::forceScheme('https');
        }

        View::composer(['layouts_main.footer'], function ($view) {
            // 傳遞固定區塊的資料到視圖
            $ip = request()->ip();
            $today = date('Y-m-d');

            // 檢查當天是否已有該 IP 的訪問記錄
            $exists = VisitorLog::where('ip', $ip)
                ->where('visit_date', $today)
                ->exists();

            if (!$exists) {
                VisitorLog::create(['ip' => $ip, 'visit_date' => $today]);
            }

            // 取得總訪問數
            $count = VisitorLog::count();

            // 取得今日所有訪問數
            $countToday = VisitorLog::where('visit_date', $today)
                ->count();

            // 將計數資料傳遞給視圖
            $view->with('visitorCount', $count)->with('visitorCountToday', $countToday);
        });
    }
}
