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
        return view('news')
            ->with('seoInfo', $seoInfo);
    }

    public function detail($id)
    {
        $seoInfo = SeoSettingRepository::getInfo('/news');
        // Here you would typically fetch the news item by ID from the database
        // $newsItem = News::findOrFail($id);
        return view('news-detail')
            ->with('seoInfo', $seoInfo);
            // ->with('newsItem', $newsItem);
    }
}
