<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class HeroSlide extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'hero_slides';

    public $translatedAttributes = [
        'title',
        'image_624',
        'image_1024',
        'image_1280',
        'image_1920'
    ];

    public $fillable = [
        'link',
        'status', // 狀態
        'sort_order' // 排序
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'link' => 'string',
        'image_624' => 'json',
        'image_1024' => 'json',
        'image_1280' => 'json',
        'image_1920' => 'json',
        'status' => 'boolean', // 狀態
        'sort_order' => 'integer' // 排序
    ];

    public static array $rules = [
        'link' => 'nullable|url',
        'status' => 'boolean',
        'sort_order' => 'integer|min:0',
    ];

    public static array $translationRules = [
        'title' => 'nullable',
        'image_624' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        'image_1024' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        'image_1280' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        'image_1920' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
    ];


}
