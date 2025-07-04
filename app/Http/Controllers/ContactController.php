<?php

namespace App\Http\Controllers;

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
}
