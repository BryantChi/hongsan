<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ContactInfo;
use App\Repositories\BaseRepository;

class ContactInfoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'machine_type',
        'phone',
        'email',
        'location',
        'country',
        'message'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ContactInfo::class;
    }
}
