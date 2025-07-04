<?php

namespace App\Http\Controllers;

use App\Repositories\Admin\SeoSettingRepository;
use Illuminate\Http\Request;

class CatetypeController extends Controller
{
    //
    public function index()
    {
        $seoInfo = SeoSettingRepository::getInfo('/catetype');
        return view('catetype')
        ->with('seoInfo', $seoInfo);
    }

    public function construction()
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction');
        return view('construction')
        ->with('seoInfo', $seoInfo);
    }

    public function constructionRent()
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction-rent');
        return view('construction-rent')
        ->with('seoInfo', $seoInfo);
    }

    public function constructionRentList()
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction-rent-list');
        return view('construction-rent-list')
        ->with('seoInfo', $seoInfo);
    }

    public function constructionBuy()
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction-buy');
        return view('construction-buy')
        ->with('seoInfo', $seoInfo);
    }

    public function constructionBuyList()
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction-buy-list');
        return view('construction-buy-list')
        ->with('seoInfo', $seoInfo);
    }
}
