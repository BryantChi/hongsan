<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    public $table = 'contact_infos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'machine_type',
        'phone',
        'email',
        'location',
        'country',
        'message'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'machine_type' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'location' => 'string',
        'country' => 'string'
    ];

    public static array $rules = [
        'name' => ['required', 'string', 'regex:/^[\x{4e00}-\x{9fa5}a-zA-Z\s]{2,20}$/u'],
        'machine_type' => ['required', 'string', 'regex:/^[\x{4e00}-\x{9fa5}a-zA-Z\s]{2,20}$/u'],
        'phone' => ['required', 'regex:/^(09\d{8}|0\d{1,2}-?\d{6,8})$/'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'location' => ['required', 'string', 'regex:/^[\x{4e00}-\x{9fa5}a-zA-Z\s]{2,20}$/u'],
        'country' => ['nullable', 'string', 'regex:/^[\x{4e00}-\x{9fa5}a-zA-Z\s]{2,20}$/u'],
        'message' => ['nullable', 'string', 'max:1000']
    ];

    public static array $message = [
        'name.required' => '請輸入姓名',
        'name.regex' => '姓名格式不正確，僅限中文或英文',
        'machine_type.required' => '請輸入機型',
        'machine_type.regex' => '機型格式不正確，僅限中文或英文',
        'phone.required' => '請輸入電話號碼',
        'phone.regex' => '電話號碼格式不正確',
        'email.required' => '請輸入電子郵件地址',
        'email.email' => '電子郵件地址格式不正確',
        'location.required' => '請輸入所在地點',
        'location.regex' => '所在地點格式不正確，僅限中文或英文',
        'country.regex' => '國家格式不正確，僅限中文或英文',
        'message.max' => '留言內容不能超過1000字'
    ];


}
