<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ProductCategories extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'product_categories';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'application_categories_info_id',
        'slug',
        'icon',
        'image',
    ];

    // 可翻譯的欄位
    public array $translatedAttributes = [
        'name'
    ];

    protected $casts = [
        'id' => 'integer',
        'application_categories_info_id' => 'integer',
        'slug' => 'string',
        'icon' => 'json',
        'image' => 'json',
    ];

    public static array $rules = [
        'application_categories_info_id' => 'nullable',
        'slug' => 'nullable|string|max:255|unique:product_categories,slug',
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

    public static array $translationRules = [
        'name' => 'required|string|max:255',
    ];


}
