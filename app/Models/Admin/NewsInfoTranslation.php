<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class NewsInfoTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content'
    ];

    // 定義表名
    protected $table = 'news_info_translations';
}
