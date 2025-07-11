<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class LinkInfo extends Model
{
    public $table = 'link_infos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'url',
        'image',
        'sort_order',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'url' => 'string',
        'image' => 'json', // Assuming image is stored as JSON, adjust if necessary
        'sort_order' => 'integer',
        'status' => 'boolean'
    ];

    public static array $rules = [
        'name' => 'nullable|string|max:255',
        'url' => 'nullable|url|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        'sort_order' => 'nullable|integer|min:0',
        'status' => 'nullable|boolean',
    ];


}
