<?php

namespace App\Http\Controllers;

use App\Repositories\Admin\SeoSettingRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index()
    {
        $seoInfo = SeoSettingRepository::getInfo('/news');

        $query = \App\Models\Admin\NewsInfo::query();
        $query->with([
            'translations' => function ($query) {
                $query->where('locale', app()->getLocale());
            }
        ]);
        $newsItems = $query->get();

        return view('news')
            ->with('seoInfo', $seoInfo)
            ->with('newsItems', $newsItems);
    }

    public function detail($locale, $id)
    {
        $seoInfo = SeoSettingRepository::getInfo('/news');

        $query = \App\Models\Admin\NewsInfo::query();
        $query->with([
            'translations' => function ($query) {
                $query->where('locale', app()->getLocale());
            }
        ]);
        $news = $query->findOrFail($id);

        return view('news-details')
            ->with('seoInfo', $seoInfo)
            ->with('news', $news);
    }
}
