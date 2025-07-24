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
        // 取得產品資訊，並載入翻譯
        $products = \App\Models\Admin\ProductsInfo::with(['translations' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])->orderBy('created_at', 'desc')->paginate(12);

        return view('products')
            ->with('seoInfo', $seoInfo)
            ->with('products', $products);
    }

    public function productIntro($locale, $id)
    {
        // 取得 SEO 設定
        $seoInfo = SeoSettingRepository::getInfo('/products');

        // 取得產品資訊，並載入翻譯
        $product = \App\Models\Admin\ProductsInfo::with(['translations' => function ($query) {
                $query->where('locale', app()->getLocale());
            },
            'productCategories' => function ($query) {
                $query->with(['translations' => function ($q) {
                    $q->where('locale', app()->getLocale());
                }]);
            }
        ])->findOrFail($id);

        // 取得產品圖片
        $images = $product->images;

        return view('product-intro', compact('seoInfo', 'product', 'images'));
    }
}
