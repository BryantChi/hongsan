<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\ApplicationCategoriesInfo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationCategoriesInfoRequest extends FormRequest
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
        $rules = ApplicationCategoriesInfo::$rules;
        
        return $rules;
    }
}
