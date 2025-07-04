<?php
// app/Services/DatabaseTranslationLoader.php
namespace App\Services;

use App\Models\Admin\TranslationsInfo as Translation;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DatabaseTranslationLoader implements Loader
{
    /**
     * 回傳群組（Group）翻譯。因為我們只用 JSON 模式，可回傳空陣列。
     */
    public function load($locale, $group, $namespace = null): array
    {
        Log::info("Loader called: locale=$locale, group=$group");
        // 嘗試從快取獲取
        $cacheKey = "translations.{$locale}";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        // 從資料庫獲取
        $items = Translation::all(['key', 'translations']);
        $lines = [];

        foreach ($items as $item) {
            if (isset($item->translations[$locale])) {
                $lines[$item->key] = $item->translations[$locale];
            }
        }

        // 儲存到快取
        Cache::put($cacheKey, $lines, now()->addHours(24));

        return $lines;
        // Log::info("Loader called: locale=$locale, group=$group");

        // if ($group === '*') {
        //     return $this->getTranslationsFromDatabase($locale);
        // }

        // return [];
    }

    /**
     * 以下三個方法可留空（不用命名空間）
     */
    public function addNamespace($namespace, $hint) {}
    public function namespaces(): array
    {
        return [];
    }
    public function addJsonPath($path) {}

    /**
     * Load JSON translation paths for the given locale.
     */
    public function loadJsonPaths($locale): array
    {
        Log::info("loadJsonPaths called: locale=$locale");
        // 嘗試從快取獲取
        $cacheKey = "translations.{$locale}";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        // 從資料庫獲取
        $items = Translation::all(['key', 'translations']);
        $lines = [];

        foreach ($items as $item) {
            if (isset($item->translations[$locale])) {
                $lines[$item->key] = $item->translations[$locale];
            }
        }

        // 儲存到快取
        Cache::put($cacheKey, $lines, now()->addHours(24));
        Log::info('loadJsonPaths loaded: ' . json_encode($lines));
        return $lines;
    }

    /**
     * 新增這個公開方法用於獲取資料庫翻譯
     */
    // public function loadJsonPaths($locale): array
    // {
    //     Log::info("Custom loadJsonPaths called: locale=$locale");
    //     return $this->getTranslationsFromDatabase($locale);
    // }

    /**
     * 從資料庫獲取翻譯的輔助方法
     */
    private function getTranslationsFromDatabase($locale): array
    {
        // 嘗試從快取獲取
        $cacheKey = "translations.{$locale}";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        // 從資料庫獲取
        $items = Translation::all(['key', 'translations']);
        $lines = [];

        foreach ($items as $item) {
            if (isset($item->translations[$locale])) {
                $lines[$item->key] = $item->translations[$locale];
            }
        }

        // 儲存到快取
        Cache::put($cacheKey, $lines, now()->addHours(24));
        Log::info('Loaded translations: ' . json_encode($lines));
        return $lines;
    }
}
