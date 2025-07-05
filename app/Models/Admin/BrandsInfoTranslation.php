<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BrandsInfoTranslation extends Model
{
    public $table = 'brands_info_translations';

    public $timestamps = false;

    protected $fillable = [
        'locale',
        'name'
    ];

    protected $casts = [
        'locale' => 'string',
        'name' => 'string'
    ];
}
