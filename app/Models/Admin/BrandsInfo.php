<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class BrandsInfo extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'brands_infos';

    public $fillable = [
        'application_categories_info_id',
        'slug'
    ];

    // 可翻譯的欄位
    public array $translatedAttributes = [
        'name'
    ];

    protected $casts = [
        'id' => 'integer',
        'application_categories_info_id' => 'integer',
        'name' => 'string',
        'slug' => 'string'
    ];

    public static array $rules = [
        'application_categories_info_id' => 'nullable',
        'slug' => 'nullable|string|max:255|unique:brands_infos,slug',
    ];

    public static array $translationRules = [
        'name' => 'required|string|max:255',
    ];

}
