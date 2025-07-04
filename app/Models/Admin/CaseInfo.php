<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CaseInfo
 * @package App\Models\Admin
 * @version October 12, 2024, 5:48 pm UTC
 *
 * @property string $occupation
 * @property string $name
 * @property string $case_title
 * @property string $case_content
 */
class CaseInfo extends EloquentModel
{
    use SoftDeletes;


    public $table = 'case_infos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'case_title',
        'case_content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'case_title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
