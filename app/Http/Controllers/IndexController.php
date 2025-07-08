<?php

namespace App\Http\Controllers;

use App\Models\Admin\ActivityInfo;
use App\Models\Admin\CaseInfo;
use App\Models\Admin\Course;
use App\Repositories\Admin\SeoSettingRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $seoInfo = SeoSettingRepository::getInfo('/*');

        // 取得最新產品資訊
        $products = \App\Models\Admin\ProductsInfo::with(['translations' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // 取得最新消息資訊
        $newsItems = \App\Models\Admin\NewsInfo::with(['translations' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();

        // 取得友情連結資訊
        $linkInfos = \App\Models\Admin\LinkInfo::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('index')
            ->with('seoInfo', $seoInfo)
            ->with('linkInfos', $linkInfos)
            ->with('products', $products)
            ->with('newsItems', $newsItems);
    }
}
