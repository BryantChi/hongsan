<?php

namespace App\Http\Controllers;

use App\Repositories\Admin\SeoSettingRepository;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        $seoInfo = SeoSettingRepository::getInfo('/about');
        // $cases = CaseInfo::orderBy('created_at', 'desc')->limit(2)->get();
        // $activity = ActivityInfo::orderBy('created_at', 'desc')->limit(2)->get();
        return view('about')
            ->with('seoInfo', $seoInfo);
    }
}
