<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TranslationsInfo extends Model
{
    public $table = 'translations_infos';

    public $fillable = [
        'key',
        'translations',
        'note'
    ];

    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'translations' => 'array',
        'note' => 'string',
    ];

    public static array $rules = [
        // key 只能小寫英文不可以輸入數字、特殊符號、連字號、空格，但可以輸入底線及點，編輯模式下可以編輯
        'key' => 'required|string|regex:/^[a-z_\.]+$/|max:255|unique:translations_infos,key',
        // translations 必須是陣列
        'translations' => 'required|array',

        'note' => 'nullable|string',
    ];

    /**
     * 取得更新時使用的驗證規則
     *
     * @param int $id 正在編輯的記錄 ID
     * @return array
     */
    public static function getUpdateRules($id): array
    {
        return [
            'key' => 'required|string|regex:/^[a-z_\.]+$/|max:255|unique:translations_infos,key,'.$id,
            'translations' => 'required|array',
            'note' => 'nullable|string',
        ];
    }
}
