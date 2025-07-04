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
        // $cases = CaseInfo::orderBy('created_at', 'desc')->limit(2)->get();
        // $activity = ActivityInfo::orderBy('created_at', 'desc')->limit(2)->get();
        return view('index')
            ->with('seoInfo', $seoInfo);
    }
}
