<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ProductsInfo extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'products_infos';

    protected $dates = ['deleted_at'];

    // 非翻譯欄位
    public $fillable = [
        'prod_img_cover',
        'application_categories_info_id',
        'brands_info_id',
        // 'product_categories_id',
        'purchase_lease', // 新增購買/租賃欄位
        'version',
        'quick_bucket_changer',
        'operating_converter',
        'pdf' // PDF欄位
    ];

    // 定義可翻譯屬性
    public $translatedAttributes = [
        'name',
        'piping',
        'glue_block',
        'introduction'
    ];

    protected $casts = [
        'id' => 'integer',
        'prod_img_cover' => 'json',
        'application_categories_info_id' => 'integer',
        'brands_info_id' => 'integer',
        // 'product_categories_id' => 'integer',
        'purchase_lease' => 'string', // 購買/租賃欄位
        'version' => 'string',
        'quick_bucket_changer' => 'boolean',
        'operating_converter' => 'boolean',
        'pdf' => 'json', // PDF欄位
    ];

    public static array $rules = [
        'prod_img_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // 封面圖片
        'application_categories_info_id' => 'required|exists:application_categories_infos,id',
        'brands_info_id' => 'required|exists:brands_infos,id',
        // 'product_categories_id' => 'required|exists:product_categories,id',
        'purchase_lease' => 'nullable|string|max:255',
        'version' => 'nullable|string|max:255',
        'pdf' => 'nullable|file|mimes:pdf|max:2048', // PDF欄位
    ];

    public static array $translationRules = [
        'name' => 'required|string|max:255',
        'piping' => 'nullable|string',
        'glue_block' => 'nullable|string',
        'introduction' => 'nullable|string',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('sort_order', 'asc');
    }

    public function applicationCategory()
    {
        return $this->belongsTo(\App\Models\Admin\ApplicationCategoriesInfo::class, 'application_categories_info_id');
    }

    public function brand()
    {
        return $this->belongsTo(\App\Models\Admin\BrandsInfo::class, 'brands_info_id');
    }

    // public function productCategory()
    // {
    //     return $this->belongsTo(\App\Models\Admin\ProductCategories::class, 'product_categories_id');
    // }

    public function productCategories()
    {
        return $this->belongsToMany(ProductCategories::class, 'product_prod_categories', 'product_id', 'product_category_id');
    }

}
