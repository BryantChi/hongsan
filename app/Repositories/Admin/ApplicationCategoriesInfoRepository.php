<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ApplicationCategoriesInfo;
use App\Repositories\BaseRepository;

class ApplicationCategoriesInfoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ApplicationCategoriesInfo::class;
    }
}
