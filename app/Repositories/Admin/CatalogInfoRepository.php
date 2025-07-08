<?php

namespace App\Repositories\Admin;

use App\Models\Admin\CatalogInfo;
use App\Repositories\BaseRepository;

class CatalogInfoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'phone',
        'loaction',
        'product_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CatalogInfo::class;
    }
}
