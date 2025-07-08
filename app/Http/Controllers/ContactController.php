<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateContactInfoRequest;
use App\Models\Admin\ContactInfo;
use App\Repositories\Admin\SeoSettingRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function index()
    {
        $seoInfo = SeoSettingRepository::getInfo('/contact');
        return view('contact')
            ->with('seoInfo', $seoInfo);
    }

    public function store(CreateContactInfoRequest $request)
    {
        if ($request->filled('website')) {
            abort(403, '非法請求'); // 機器人填了 honeypot
        }

        $input = $request->all();

        // 儲存需求表單資料
        // 這裡可以使用模型來儲存資料到資料庫
        $conatct = ContactInfo::create($input);


        // 回傳成功訊息
        return redirect()->back()->with('success', '表單已送出！');
    }
}
