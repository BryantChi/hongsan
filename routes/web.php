<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AgricultureController;
use App\Http\Controllers\AttachmentsController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CatetypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RecyclingController;
use App\Repositories\Admin\SeoSettingRepository;
use App\Services\DatabaseTranslationLoader;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 添加在已有路由之前
Route::get('/', function () {
    // 獲取默認語系
    $locale = config('app.locale', 'zh_TW');

    // 重定向到默認語系的首頁
    return redirect()->to("/{$locale}");
});

Route::any('/clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // return "All Cache is cleared";
    // $pageInfo = PageSettingInfo::getHomeBanner('/index');
    // return view('index', ['pageInfo' => $pageInfo]);
    $locale = config('app.locale', 'zh_TW');
    return redirect()->to("/{$locale}");
});

Route::group([
    'prefix' => '{locale}',                     // URL 前綴，如 /zh_TW 或 /en
    'middleware' => ['setlocale'],             // 設定語系
    'where' => ['locale' => implode('|', config('translatable.locales'))],
], function () {
    // Route::get('/test-loader', function () {
    //     $loader = App::make(DatabaseTranslationLoader::class);
    //     $result = $loader->loadJsonPaths('zh_TW');
    //     Log::info('Manual loader result: ' . json_encode($result));
    //     return $result;
    // });
    // Route::get('/test-locale', function () {
    //     $locale = app()->getLocale();
    //     $translations = \App\Models\Admin\TranslationsInfo::all(['key', 'translations']);
    //     return [
    //         'locale' => $locale,
    //         'translation_about' => __('about'),
    //         'db_translations' => $translations->map(function($item) {
    //             return [
    //                 'key' => $item->key,
    //                 'translations' => $item->translations
    //             ];
    //         })
    //     ];
    // });

    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::get('/history', [HistoryController::class, 'index'])->name('history');

    Route::get('/catetype', [CatetypeController::class, 'index'])->name('catetype');
    Route::get('/construction', [CatetypeController::class, 'construction'])->name('construction');
    Route::get('/construction-rent', [CatetypeController::class, 'constructionRent'])->name('construction.rent');
    Route::get('/construction-rent-list', [CatetypeController::class, 'constructionRentList'])->name('construction.rent.list');
    Route::get('/construction-buy', [CatetypeController::class, 'constructionBuy'])->name('construction.buy');
    Route::get('/construction-buy-list', [CatetypeController::class, 'constructionBuyList'])->name('construction.buy.list');

    Route::get('/agriculture', [AgricultureController::class, 'index'])->name('agriculture');
    Route::get('/agriculture/{id}', [AgricultureController::class, 'productIntro'])->name('agriculture.detail');

    Route::get('/recycling', [RecyclingController::class, 'index'])->name('recycling');
    Route::get('/recycling/{id}', [RecyclingController::class, 'productIntro'])->name('recycling.detail');

    Route::get('/attachments-categories', [AttachmentsController::class, 'pgCategory'])->name('attachments.categories');
    Route::get('/attachments', [AttachmentsController::class, 'index'])->name('attachments');
    Route::get('/attachments/{id}', [AttachmentsController::class, 'productIntro'])->name('attachments.detail');

    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/{id}', [NewsController::class, 'detail'])->name('news.detail');
    // Route::get('/news-detail-mock', function () {
    //     $seoInfo = SeoSettingRepository::getInfo('/news');
    //     return view('news-details')->with('seoInfo', $seoInfo);
    // })->name('news.detail.mock');


    Route::get('/products', [ProductsController::class, 'index'])->name('products');
    Route::get('/products/{id}', [ProductsController::class, 'productIntro'])->name('products.detail');
    Route::post('/download-catalog', [CatalogController::class, 'download'])->name('download.catalog');
    // Route::get('/products-details', function () { return view('product-intro'); })->name('products.detail.mock');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

});



Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::resource('seoSettings', \App\Http\Controllers\Admin\SeoSettingController::class, ["as" => 'admin']);
        // Route::resource('marqueeInfos', App\Http\Controllers\Admin\MarqueeInfoController::class, ["as" => 'admin']);
        Route::resource('heroSlides', \App\Http\Controllers\Admin\HeroSlideController::class, ["as" => 'admin']);
        Route::resource('newsInfos', \App\Http\Controllers\Admin\NewsInfoController::class, ["as" => 'admin']);
        // Route::resource('caseInfos', App\Http\Controllers\Admin\CaseInfoController::class, ["as" => 'admin']);
        // Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class, ["as" => 'admin']);
        // Route::resource('catalogs', App\Http\Controllers\Admin\CatalogController::class, ["as" => 'admin']);
        // Route::resource('productTypes', App\Http\Controllers\Admin\ProductTypeController::class, ["as" => 'admin']);
        // Route::resource('products', App\Http\Controllers\Admin\ProductController::class, ["as" => 'admin']);
        Route::resource('translationsInfos', \App\Http\Controllers\Admin\TranslationsInfoController::class, ["as" => 'admin']);
        Route::resource('applicationCategoriesInfos', \App\Http\Controllers\Admin\ApplicationCategoriesInfoController::class, ["as" => 'admin']);
        Route::resource('brandsInfos', \App\Http\Controllers\Admin\BrandsInfoController::class, ["as" => 'admin']);
        Route::resource('productCategoriesInfos', \App\Http\Controllers\Admin\ProductCategoriesInfoController::class, ["as" => 'admin']);
        Route::resource('productsInfos', \App\Http\Controllers\Admin\ProductsInfoController::class, ["as" => 'admin']);
        Route::resource('linkInfos', \App\Http\Controllers\Admin\LinkInfoController::class, ["as" => 'admin']);
        Route::resource('contactInfos', \App\Http\Controllers\Admin\ContactInfoController::class, ["as" => 'admin']);
        Route::resource('catalogInfos', \App\Http\Controllers\Admin\CatalogInfoController::class, ["as" => 'admin']);

        Route::get('/products-infos/data', [\App\Http\Controllers\Admin\ProductsInfoController::class, 'getDataTableData'])->name('admin.productsInfos.data');

        // AJAX 預覽清洗結果的路由
        Route::post('/seo/preview', [\App\Http\Controllers\Admin\SeoSettingController::class, 'preview'])->name('admin.seo.preview');

        // 添加獲取關聯數據的路由
        Route::get('/get-categories-data', [\App\Http\Controllers\Admin\ProductsInfoController::class, 'getCategoriesData'])->name('admin.get-categories-data');

        Route::any('adminUsers', [\App\Http\Controllers\Admin\AdminAccountController::class, 'index'])->name('admin.adminUsers.index');
        Route::any('adminUsers/create', [\App\Http\Controllers\Admin\AdminAccountController::class, 'create'])->name('admin.adminUsers.create');
        Route::any('adminUsers/store', [\App\Http\Controllers\Admin\AdminAccountController::class, 'store'])->name('admin.adminUsers.store');
        Route::any('adminUsers/show/{id}', [\App\Http\Controllers\Admin\AdminAccountController::class, 'show'])->name('admin.adminUsers.show');
        Route::any('adminUsers/edit/{id}', [\App\Http\Controllers\Admin\AdminAccountController::class, 'edit'])->name('admin.adminUsers.edit');
        Route::any('adminUsers/update/{id}', [\App\Http\Controllers\Admin\AdminAccountController::class, 'update'])->name('admin.adminUsers.update');
        Route::any('adminUsers/destroy/{id}', [\App\Http\Controllers\Admin\AdminAccountController::class, 'destroy'])->name('admin.adminUsers.destroy');
    });
});
