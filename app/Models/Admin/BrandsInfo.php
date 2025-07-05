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
        'slug'
    ];

    // 可翻譯的欄位
    public array $translatedAttributes = [
        'name'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string'
    ];

    public static array $rules = [
        'slug' => 'nullable|string|max:255|unique:brands_infos,slug',
    ];

    public static array $translationRules = [
        'name' => 'required|string|max:255',
    ];

}
