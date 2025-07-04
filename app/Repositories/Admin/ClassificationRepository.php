<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Classification;
use App\Repositories\BaseRepository;

class ClassificationRepository extends BaseRepository
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
        return Classification::class;
    }
}
