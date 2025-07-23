<?php

namespace App\Http\Controllers;

use App\Models\Admin\ProductsInfo;
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

    public function constructionRent(Request $request)
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction-rent');

        // 取得目前語系翻譯所有分類資訊,
        $categoriesInfo = \App\Models\Admin\ProductCategories::query()
            ->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])
            ->where('application_categories_info_id', 1)
            ->get();

        return view('construction-rent')
        ->with('seoInfo', $seoInfo)->with('categoriesInfo', $categoriesInfo);
    }

    public function constructionRentList(Request $request)
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction-rent-list');

        $query = ProductsInfo::query();

        $query->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ]);

        // 這裡可以根據需要添加其他條件
        $query->where('application_categories_info_id', 1); // 1 是建設類別的 ID

        // 如果有搜尋條件，可以在這裡添加
        // 依品牌搜尋
        if ($request->has('brand')) {
            $brand = $request->input('brand');
            $query->where('brands_info_id', $brand);
        }

        // 如果有分類搜尋
        if ($request->has('category')) {
            $category = $request->input('category');
            // $query->where('product_categories_id', $category);
            $query->whereHas('productCategories', function($q) use ($category) {
                $q->where('id', $category);
            });
        }

        // 分頁查詢
        $machineryList = $query->orderBy('created_at', 'desc')->paginate(12);

        // // 取得目前語系翻譯所有品牌資訊,
        // $brandsInfo = \App\Models\Admin\BrandsInfo::query()
        //     ->with([
        //         'translations' => function ($query) {
        //             $query->where('locale', app()->getLocale());
        //         }
        //     ])
        //     ->where('application_categories_info_id', 1)
        //     ->get();

        // // 取得目前語系翻譯所有分類資訊,
        // $categoriesInfo = \App\Models\Admin\ProductCategories::query()
        //     ->with([
        //         'translations' => function ($query) {
        //             $query->where('locale', app()->getLocale());
        //         }
        //     ])
        //     ->where('application_categories_info_id', 1)
        //     ->get();

        return view('construction-rent-list')
        ->with('seoInfo', $seoInfo)->with('machineryList', $machineryList);
    }

    public function constructionBuy(Request $request)
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction-buy');

        // 取得目前語系翻譯所有品牌資訊,
        $brandsInfo = \App\Models\Admin\BrandsInfo::query()
            ->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])
            ->where('application_categories_info_id', 1)
            ->get();

        return view('construction-buy')
        ->with('seoInfo', $seoInfo)->with('brandsInfo', $brandsInfo);
    }

    public function constructionBuyList(Request $request)
    {
        $seoInfo = SeoSettingRepository::getInfo('/construction-buy-list');

        $query = ProductsInfo::query();

        $query->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ]);

        // 這裡可以根據需要添加其他條件
        $query->where('application_categories_info_id', 1); // 1 是建設類別的 ID

        // 如果有搜尋條件，可以在這裡添加
        // 依品牌搜尋
        if ($request->has('brand')) {
            $brand = $request->input('brand');
            $query->where('brands_info_id', $brand);
        }

        // 如果有分類搜尋
        if ($request->has('category')) {
            $category = $request->input('category');
            // $query->where('product_categories_id', $category);
            $query->whereHas('productCategories', function($q) use ($category) {
                $q->where('id', $category);
            });
        }

        // 分頁查詢
        $machineryList = $query->orderBy('created_at', 'desc')->paginate(12);

        // // 取得目前語系翻譯所有品牌資訊,
        // $brandsInfo = \App\Models\Admin\BrandsInfo::query()
        //     ->with([
        //         'translations' => function ($query) {
        //             $query->where('locale', app()->getLocale());
        //         }
        //     ])
        //     ->where('application_categories_info_id', 1)
        //     ->get();

        // 取得目前語系翻譯所有分類資訊,
        $categoriesInfo = \App\Models\Admin\ProductCategories::query()
            ->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])
            ->where('application_categories_info_id', 1)
            ->get();

        return view('construction-buy-list')
        ->with('seoInfo', $seoInfo)->with('machineryList', $machineryList)
        ->with('categoriesInfo', $categoriesInfo);
    }

    public function productIntro($locale, $id)
    {
        // 取得 SEO 設定
        $seoInfo = SeoSettingRepository::getInfo('/products');

        // 取得產品資訊，並載入翻譯
        $product = ProductsInfo::with(['translations' => function ($query) {
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

        return view('product-intro', compact('product', 'seoInfo', 'images'));
    }
}
