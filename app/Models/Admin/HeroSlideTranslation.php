<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class HeroSlideTranslation extends Model
{
    public $timestamps = false;

    public $table = 'hero_slide_translations';

    public $fillable = [
        'locale',
        'title',
        'image_624',
        'image_1024',
        'image_1280',
        'image_1920'
    ];

    protected $casts = [
        'locale' => 'string',
        'title' => 'string',
        'image_624' => 'json',
        'image_1024' => 'json',
        'image_1280' => 'json',
        'image_1920' => 'json'
    ];

}
