<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CatalogInfo extends Model
{
    public $table = 'catalog_infos';

    public $fillable = [
        'name',
        'phone',
        'loaction',
        'product_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'loaction' => 'string',
        'product_id' => 'integer'
    ];

    public static array $rules = [
        'name' => ['required', 'string', 'max:255', 'regex:/^[\x{4e00}-\x{9fa5}a-zA-Z\s]{2,20}$/u'],
        'phone' => ['required', 'regex:/^(09\d{8}|0\d{1,2}-?\d{6,8})$/'],
        'loaction' => ['required', 'string', 'max:255', 'regex:/^[\x{4e00}-\x{9fa5}a-zA-Z\s]{2,20}$/u'],
        'product_id' => 'required|exists:products_infos,id'
    ];

    public static array $message = [
        'name.required' => '請輸入姓名',
        'name.regex' => '姓名格式不正確，僅限中文或英文',
        'phone.required' => '請輸入聯絡電話',
        'phone.regex' => '聯絡電話格式不正確',
        'loaction.required' => '請輸入所在縣市',
        'loaction.regex' => '所在縣市格式不正確，僅限中文或英文',
        'product_id.required' => '請選擇產品'
    ];


}
