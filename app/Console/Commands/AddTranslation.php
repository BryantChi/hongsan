<?php
// app/Console/Commands/AddTranslation.php
namespace App\Console\Commands;

use App\Models\Admin\TranslationsInfo as Translation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class AddTranslation extends Command
{
    protected $signature = 'translation:add {key} {translations}';
    protected $description = 'Add or update a translation with JSON format';

    public function handle()
    {
        $key = $this->argument('key');
        $translations = json_decode($this->argument('translations'), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error('Invalid JSON format for translations.');
            return;
        }

        $translation = Translation::firstOrNew(['key' => $key]);
        $translation->translations = $translations;
        $translation->save();

        // 清除所有語系的快取
        foreach (config('translatable.locales', []) as $locale) {
            Cache::forget('translations.' . $locale);
        }

        $this->info("Translation for key '{$key}' added/updated successfully.");
    }
}
