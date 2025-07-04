<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    public $table = 'classification';

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'nullable'
    ];

    public function konwledges()
    {
        return $this->hasMany(Konwledge::class);
    }

}
