<?php

namespace App\Repositories\Admin;

use App\Models\Admin\VisitorLog;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Request;

/**
 * Class VisitorLogRepository
 * @package App\Repositories\Admin
 * @version March 14, 2025, 8:30 am UTC
*/

class VisitorLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ip',
        'visit_date'
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
        return VisitorLog::class;
    }

}
