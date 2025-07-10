<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TranslationsInfo;
use App\Repositories\BaseRepository;

class TranslationsInfoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'key',
        'translations'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TranslationsInfo::class;
    }


}
