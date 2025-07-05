<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\BrandsInfo;
use Illuminate\Foundation\Http\FormRequest;

class CreateBrandsInfoRequest extends FormRequest
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
        // Merge the rules from the BrandsInfo model and add custom rules if needed
        $rules = BrandsInfo::$rules;
        // Add translation rules for multi-language support
        foreach (config('translatable.locales') as $locale) {
            $rules = array_merge($rules, [
                "{$locale}.name" => BrandsInfo::$translationRules['name'],
            ]);
        }
        return $rules;

    }
}
