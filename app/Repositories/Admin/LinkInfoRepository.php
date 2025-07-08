<?php

namespace App\Repositories\Admin;

use App\Models\Admin\LinkInfo;
use App\Repositories\BaseRepository;

class LinkInfoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'url',
        'image',
        'sort_order',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return LinkInfo::class;
    }
}
