<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\ProductsInfo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsInfoRequest extends FormRequest
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
        $rules = ProductsInfo::$rules;
        // Add translation rules for multi-language support
        foreach (config('translatable.locales') as $locale) {
            $rules = array_merge($rules, [
                "{$locale}.name" => ProductsInfo::$translationRules['name'],
                "{$locale}.piping" => ProductsInfo::$translationRules['piping'],
                "{$locale}.glue_block" => ProductsInfo::$translationRules['glue_block'],
                "{$locale}.introduction" => ProductsInfo::$translationRules['introduction'],
            ]);
        }
        return $rules;
    }
}
