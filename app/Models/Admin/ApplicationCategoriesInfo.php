<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ApplicationCategoriesInfo extends Model
{
    public $table = 'application_categories_infos';

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
