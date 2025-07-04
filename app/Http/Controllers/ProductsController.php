<?php

namespace App\Http\Controllers;

use App\Repositories\Admin\SeoSettingRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $seoInfo = SeoSettingRepository::getInfo('/products');
        // $cases = CaseInfo::orderBy('created_at', 'desc')->limit(2)->get();
        // $activity = ActivityInfo::orderBy('created_at', 'desc')->limit(2)->get();
        return view('products')
            ->with('seoInfo', $seoInfo);
    }
}
