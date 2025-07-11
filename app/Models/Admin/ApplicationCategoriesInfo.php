<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ApplicationCategoriesInfo extends Model
{
    public $table = 'application_categories_infos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    public static array $rules = [

    ];


}
