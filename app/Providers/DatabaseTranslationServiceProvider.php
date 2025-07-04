<?php
namespace App\Providers;

use App\Services\DatabaseTranslationLoader;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\Translator;

class DatabaseTranslationServiceProvider extends ServiceProvider
{
    public function register()
    {
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
    }
}
