<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductsInfoTranslation extends Model
{
    public $table = 'products_info_translations';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'piping',
        'glue_block',
        'introduction'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'piping' => 'string',
        'glue_block' => 'string'
    ];

}
