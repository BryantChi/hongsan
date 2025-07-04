<?php

namespace App\Repositories\Admin;

use App\Models\Admin\CaseInfo;
use App\Repositories\BaseRepository;

/**
 * Class CaseInfoRepository
 * @package App\Repositories\Admin
 * @version October 12, 2024, 5:48 pm UTC
*/

class CaseInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'case_title',
        'case_content'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CaseInfo::class;
    }
}
