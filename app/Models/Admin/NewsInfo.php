<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

/**
 * Class NewsInfo
 * @package App\Models\Admin
 * @version January 8, 2025, 4:16 am UTC
 *
 * @property string $title
 * @property string $content
 * @property string $cover_front_image
 * @property boolean $status
 */
class NewsInfo extends Model implements TranslatableContract
{
    use SoftDeletes, Translatable;

    protected $table = 'news_infos';

    // 可以填充的欄位
    protected $fillable = [
        'cover_front_image',
        'status'
    ];

    // 定義哪些屬性是可翻譯的
    public $translatedAttributes = [
        'title',
        'content'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cover_front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status' => 'nullable'
    ];

    /**
     * 取得指定語系的標題，若不存在則回傳預設語系
     */
    public function getTitleAttribute()
    {
        return $this->translate()?->title ?? $this->translate(config('translatable.fallback_locale'))?->title;
    }

    /**
     * 取得指定語系的內容，若不存在則回傳預設語系
     */
    public function getContentAttribute()
    {
        return $this->translate()?->content ?? $this->translate(config('translatable.fallback_locale'))?->content;
    }

}
