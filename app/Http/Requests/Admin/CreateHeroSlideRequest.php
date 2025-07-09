<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\HeroSlide;
use Illuminate\Foundation\Http\FormRequest;

class CreateHeroSlideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = HeroSlide::$rules;
        // Add translation rules for multi-language support
        foreach (config('translatable.locales') as $locale) {
            $rules = array_merge($rules, [
                "{$locale}.title" => HeroSlide::$translationRules['title'],
                "{$locale}.image_624" => HeroSlide::$translationRules['image_624'],
                "{$locale}.image_1024" => HeroSlide::$translationRules['image_1024'],
                "{$locale}.image_1280" => HeroSlide::$translationRules['image_1280'],
                "{$locale}.image_1920" => HeroSlide::$translationRules['image_1920'],
            ]);
        }
        return $rules;
    }
}
