<?php

namespace App\Http\Controllers;

use App\Models\Admin\ProductsInfo;
use App\Repositories\Admin\SeoSettingRepository;
use Illuminate\Http\Request;

class AttachmentsController extends Controller
{
    //
    public function index(Request $request)
    {
        $seoInfo = SeoSettingRepository::getInfo('/attachments');

        $query = ProductsInfo::query();

        $query->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ]);

        // 這裡可以根據需要添加其他條件
        $query->where('application_categories_info_id', 2); // 2 是液壓類別的 ID

        // 如果有搜尋條件，可以在這裡添加
        // 依品牌搜尋
        if ($request->has('brand')) {
            $brand = $request->input('brand');
            $query->where('brands_info_id', $brand);
        }

        // 如果有分類搜尋
        if ($request->has('category')) {
            $category = $request->input('category');
            $query->where('product_categories_id', $category);
        }

        // 分頁查詢
        $attachmentsList = $query->orderBy('created_at', 'desc')->paginate(12);

        // 取得目前語系翻譯所有品牌資訊,
        $brandsInfo = \App\Models\Admin\BrandsInfo::query()
            ->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])
            ->where('application_categories_info_id', 2)
            ->get();

        // 取得目前語系翻譯所有分類資訊,
        $categoriesInfo = \App\Models\Admin\ProductCategories::query()
            ->with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])
            ->where('application_categories_info_id', 2)
            ->get();

        return view('attachments-list', compact('seoInfo', 'brandsInfo', 'categoriesInfo', 'attachmentsList'));
    }

    public function pgCategory()
    {
        // 取得 SEO 設定
        $seoInfo = SeoSettingRepository::getInfo('/attachments');

        // 取得產品分類資訊，並載入翻譯
        $categories = \App\Models\Admin\ProductCategories::with(['translations' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])
        ->where('application_categories_info_id', 2) // 2 是液壓類別的 ID
        ->orderBy('created_at', 'desc')->get();

        return view('attachments-category-list', compact('seoInfo', 'categories'));
    }

    public function productIntro($locale, $id)
    {
        // 取得 SEO 設定
        $seoInfo = SeoSettingRepository::getInfo('/products');

        // 取得產品資訊，並載入翻譯
        $product = ProductsInfo::with(['translations' => function ($query) {
            $query->where('locale', app()->getLocale());
        }])->findOrFail($id);

        // 取得產品圖片
        $images = $product->images;

        return view('product-intro', compact('product', 'seoInfo', 'images'));
    }
}
