<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_path',
        'sort_order'
    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(ProductsInfo::class, 'product_id');
    }
}
