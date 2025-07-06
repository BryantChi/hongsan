<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductCategoriesTranslation extends Model
{
    public $table = 'product_category_translations';

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
