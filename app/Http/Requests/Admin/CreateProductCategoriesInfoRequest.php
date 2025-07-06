<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\ProductCategories as ProductCategoriesInfo;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductCategoriesInfoRequest extends FormRequest
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
        $rules = ProductCategoriesInfo::$rules;
        // Add translation rules for multi-language support
        foreach (config('translatable.locales') as $locale) {
            $rules = array_merge($rules, [
                "{$locale}.name" => ProductCategoriesInfo::$translationRules['name'],
            ]);
        }
        return $rules;
    }
}
