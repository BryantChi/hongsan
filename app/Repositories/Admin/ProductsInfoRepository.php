<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductsInfo;
use App\Repositories\BaseRepository;

class ProductsInfoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'application_categories_info_id',
        'brands_info_id',
        'product_categories_id',
        'version',
        'quick_bucket_changer',
        'operating_converter',
        'piping',
        'glue_block',
        'introduction'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ProductsInfo::class;
    }
}
