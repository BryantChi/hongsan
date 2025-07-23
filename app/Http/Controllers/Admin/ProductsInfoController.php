<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProductsInfoRequest;
use App\Http\Requests\Admin\UpdateProductsInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\ProductsInfoRepository;
use Illuminate\Http\Request;
use App\Models\Admin\ProductImage;
use App\Models\Admin\ProductsInfo;
use Flash;
use Illuminate\Support\Facades\Storage;
// 加入這行來引入 Form 類別
use Collective\Html\FormFacade as Form;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductsInfoController extends AppBaseController
{
    /** @var ProductsInfoRepository $productsInfoRepository*/
    private $productsInfoRepository;

    // 設定每個產品的最大圖片數量
    private const MAX_IMAGES_PER_PRODUCT = 10;

    public function __construct(ProductsInfoRepository $productsInfoRepo)
    {
        $this->productsInfoRepository = $productsInfoRepo;
    }

    public function getDataTableData(Request $request)
    {
        try {
        // $productsInfos = $this->productsInfoRepository->all()
        //     ->load([
        //         'translations',
        //         'applicationCategory',  // 需添加此關聯到 ProductsInfo 模型
        //         'brand',                // 需添加此關聯到 ProductsInfo 模型
        //         'productCategory'       // 需添加此關聯到 ProductsInfo 模型
        //     ]);
        // $draw = $request->get('draw');
        // $start = $request->get('start', 0);
        // // 最關鍵的修改：確保 length 永遠有值
        // $length = $request->get('length', 10);

        // // 如果 length 為 -1，表示要取得所有資料
        // if ($length == -1) {
        //     $length = 1000; // 設置一個較大的數值，避免無限制查詢
        // }
        $search = $request->get('search')['value'] ?? '';

        $query = ProductsInfo::with(['translations', 'applicationCategory', 'brand', 'productCategories']);

        // 加入搜尋條件
        if (!empty($search)) {
            $query->whereHas('translations', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");

            });
        }

        // $recordsTotal = $query->count();
        // $recordsFiltered = $recordsTotal;

        // 只取得需要的分頁資料
        // $products = $query->skip($start)->take($length)->get();
        $products = $query->get();

        $data = [];
        foreach ($products as $product) {
            // 產品封面圖片,Html
            $coverImage = $product->prod_img_cover;
            $coverImageHtml = '';
            if ($coverImage) {
                $coverImageHtml = '<img src="' . asset('uploads/' . $coverImage) . '" class="img-fluid" alt="產品封面圖片">';
            } else {
                $coverImageHtml = '<p class="text-muted">無封面圖片</p>';
            }


            // 產品名稱處理
            $nameHtml = '';
            $translationsCount = count($product->translations);
            foreach ($product->translations as $index => $translation) {
                $isLast = ($index === $translationsCount - 1);
                $langName = strtoupper($translation->locale) === 'ZH_TW' ? '中文' : 'English';
                $nameHtml .= '<div class="d-flex flex-lg-row flex-column justify-content-start align-items-start mb-1 pb-2 ' .
                            ($isLast ? 'border-bottom-0' : 'border-bottom') . '">' .
                            '<span class="col-md-6 mr-2 font-weight-bold">' . $langName . ':</span>' .
                            '<span class="col text-start text-wrap">' . $translation->name . '</span></div>';
            }

            // 應用類別名稱
            $applicationCategoriesInfo = $product->applicationCategory ? $product->applicationCategory->name : '無';
            if ($product->application_categories_info_id == 1) {
                $applicationCategoriesInfo .= ' - ' .
                    ($product->purchase_lease == 'purchase' ? '購買' :
                    ($product->purchase_lease == 'lease' ? '租賃' : '無'));
            }

            // 品牌名稱
            $brands = $product->brand ? $product->brand->name : '無';

            // 產品類別名稱
            $productCategoriesInfo = '無';
            if ($product->productCategories && $product->productCategories->count() > 0) {
                $categoryNames = $product->productCategories->pluck('name')->toArray();
                // 使用 implode 來處理多個類別名稱，並用 <br> 分隔，span class="badge badge-info" 標籤包住
                $categoryNames = array_map(function($name) {
                    return '<span class="badge badge-info">' . $name . '</span>';
                }, $categoryNames);
                $productCategoriesInfo = implode('<br>', $categoryNames);
            }

            // 配管與膠塊處理
            $pipingHtml = '';
            $glueBlockHtml = '';
            $translationsCount = count($product->translations);
            foreach ($product->translations as $index => $translation) {
                $isLast = ($index === $translationsCount - 1);
                $langName = strtoupper($translation->locale) === 'ZH_TW' ? '中文' : 'English';

                $pipingHtml .= '<div class="d-flex flex-lg-row flex-column justify-content-start align-items-start mb-1 pb-2 ' .
                            ($isLast ? 'border-bottom-0' : 'border-bottom') . '">' .
                            '<span class="col-md-6 mr-2 font-weight-bold">' . $langName . ':</span>' .
                            '<span class="col text-start text-wrap">' . $translation->piping . '</span></div>';

                $glueBlockHtml .= '<div class="d-flex flex-lg-row flex-column justify-content-start align-items-start mb-1 pb-2 ' .
                            ($isLast ? 'border-bottom-0' : 'border-bottom') . '">' .
                            '<span class="col-md-6 mr-2 font-weight-bold">' . $langName . ':</span>' .
                            '<span class="col text-start text-wrap">' . $translation->glue_block . '</span></div>';
            }

            // 操作按鈕
            $actions = Form::open(['route' => ['admin.productsInfos.destroy', $product->id], 'method' => 'delete']) .
                    '<div class="btn-group">' .
                    '<a href="' . localized_route('admin.productsInfos.edit', [$product->id]) . '"' .
                    'class="btn btn-default btn-md"><i class="far fa-edit"></i></a>' .
                    Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-md', 'onclick' => "return check(this)"]) .
                    '</div>' .
                    Form::close();
            // $actions = '<form action="' . route('admin.productsInfos.destroy', $product->id) . '" method="POST">' .
            // csrf_field() .
            // method_field('DELETE') .
            // '<div class="btn-group">' .
            // '<a href="' . route('admin.productsInfos.edit', [$product->id]) . '" ' .
            // 'class="btn btn-default btn-md"><i class="far fa-edit"></i></a>' .
            // '<button type="submit" class="btn btn-danger btn-md" onclick="return confirm(\'確定要刪除此產品嗎?\')"><i class="far fa-trash-alt"></i></button>' .
            // '</div>' .
            // '</form>';

            $data[] = [
                'id' => $product->id,
                'prod_img_cover' => $coverImageHtml,
                'name' => $nameHtml,
                'application_category' => $applicationCategoriesInfo,
                'brand' => $brands,
                'product_category' => $productCategoriesInfo,
                'version' => $product->version,
                'quick_bucket_changer' => $product->quick_bucket_changer ?
                    '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>',
                'operating_converter' => $product->operating_converter ?
                    '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>',
                'piping' => $pipingHtml,
                'glue_block' => $glueBlockHtml,
                'actions' => $actions
            ];
        }

        return response()->json(['data' => $data]);
        // return response()->json([
        //     'draw' => intval($draw),
        //     'recordsTotal' => intval($recordsTotal),
        //     'recordsFiltered' => intval($recordsFiltered),
        //     'data' => $data
        // ]);

        } catch (\Exception $e) {
        \Log::error('DataTable error: ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine());
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }

    /**
     * Display a listing of the ProductsInfo.
     */
    public function index(Request $request)
    {
        // $productsInfos = $this->productsInfoRepository->all();
        $productsInfos = collect([]);

        return view('admin.products_infos.index')
            ->with('productsInfos', $productsInfos);
    }

    /**
     * Show the form for creating a new ProductsInfo.
     */
    public function create()
    {
        // 取得系統支援的語系
        $locales = config('translatable.locales');
        // 取得應用類別資訊列表
        $applicationCategoriesInfos = \App\Models\Admin\ApplicationCategoriesInfo::pluck('name', 'id')->toArray();
        // 將應用類別資訊轉換為選擇列表格式
        $applicationCategoriesInfos = ['' => '請選擇'] + $applicationCategoriesInfos;

        return view('admin.products_infos.create', compact('locales', 'applicationCategoriesInfos'));
    }

    /**
     * Store a newly created ProductsInfo in storage.
     */
    public function store(CreateProductsInfoRequest $request)
    {
        $input = $request->all();

        // 自動生成 slug (如果沒有提供)
        // if (empty($input['slug']) && isset($input[config('translatable.fallback_locale')]['name'])) {
        //     $input['slug'] = \Illuminate\Support\Str::slug($input[config('translatable.fallback_locale')]['name']);
        // }

        // 處理圖片上傳
        $input['prod_img_cover'] = $this->processImage($request->file('prod_img_cover'), 'product_cover_image');

        // 處理檔案上傳
        $input['pdf'] = $this->handleFileUpload($request->file('pdf'), '', 'catalog_files');
        // 如果沒有上傳檔案，則設置為空字串
        if (!$input['pdf']) {
            $input['pdf'] = '';
        }

        // 處理多語系資料
        $translationData = [];
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];
                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        $prod_categories_id = $input['product_categories_id'] ?? [];
        unset($input['product_categories_id']); // 移除以免影響主表資料

        $productsInfo = $this->productsInfoRepository->create($input);

        // 處理產品類別關聯
        if (!empty($prod_categories_id)) {
            $productsInfo->productCategories()->sync($prod_categories_id);
        }

        // 處理多語系翻譯
        foreach ($translationData as $locale => $data) {
            $productsInfo->translateOrNew($locale)->fill($data);
        }
        $productsInfo->save();

        // 處理產品圖片上傳
        if ($request->hasFile('product_images')) {
            // 檢查圖片數量
            $uploadCount = count($request->file('product_images'));

            // 如果超過最大數量，顯示錯誤
            if ($uploadCount > self::MAX_IMAGES_PER_PRODUCT) {
                Flash::error('每個產品最多只能有 '.self::MAX_IMAGES_PER_PRODUCT.' 張圖片');
                return redirect()->back()->withInput();
            }

            $this->saveProductImages($productsInfo, $request);
        }

        Flash::success('產品建立成功');

        return redirect(route('admin.productsInfos.index'));
    }

    /**
     * Display the specified ProductsInfo.
     */
    public function show($id)
    {
        $productsInfo = $this->productsInfoRepository->find($id);

        if (empty($productsInfo)) {
            Flash::error('找不到產品資訊');

            return redirect(route('admin.productsInfos.index'));
        }

        return view('admin.products_infos.show')->with('productsInfo', $productsInfo);
    }

    /**
     * Show the form for editing the specified ProductsInfo.
     */
    public function edit($id)
    {
        $productsInfo = $this->productsInfoRepository->find($id);

        // 確保載入產品類別關聯
        $productsInfo->load('productCategories');


        if (empty($productsInfo)) {
            Flash::error('找不到產品資訊');

            return redirect(route('admin.productsInfos.index'));
        }

        // 取得系統支援的語系
        $locales = config('translatable.locales');
        // 取得應用類別資訊列表
        $applicationCategoriesInfos = \App\Models\Admin\ApplicationCategoriesInfo::pluck('name', 'id')->toArray();
        // 將應用類別資訊轉換為選擇列表格式
        $applicationCategoriesInfos = ['' => '請選擇'] + $applicationCategoriesInfos;

        // 傳遞資料到編輯視圖
        return view('admin.products_infos.edit', compact('productsInfo', 'locales', 'applicationCategoriesInfos'));

    }

    /**
     * Update the specified ProductsInfo in storage.
     */
    public function update($id, UpdateProductsInfoRequest $request)
    {
        $productsInfo = $this->productsInfoRepository->find($id);

        if (empty($productsInfo)) {
            Flash::error('Products Info not found');

            return redirect(route('admin.productsInfos.index'));
        }

        $input = $request->all();

        // 自動生成 slug (如果沒有提供)
        // if (empty($input['slug']) && isset($input[config('translatable.fallback_locale')]['name'])) {
        //     $input['slug'] = \Illuminate\Support\Str::slug($input[config('translatable.fallback_locale')]['name']);
        // }

        // 處理圖片上傳
       $input['prod_img_cover'] = $this->handleImageUpload($request->file('prod_img_cover'), $productsInfo->prod_img_cover, 'product_cover_image');

        // 處理檔案上傳
        if ($request->hasFile('pdf')) {
            $input['pdf'] = $this->handleFileUpload($request->file('pdf'), $productsInfo->pdf, 'catalog_files');
        } else {
            // 如果沒有上傳檔案，則保留原有的 PDF 路徑
            $input['pdf'] = $productsInfo->pdf;
        }

        // 處理多語系資料
        $translationData = [];
        $locales = config('translatable.locales');
        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];
                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        $prod_categories_id = $input['product_categories_id'] ?? [];
        unset($input['product_categories_id']); // 移除以免影響主表資料

        $productsInfo = $this->productsInfoRepository->update($input, $id);

        // 處理產品類別關聯
        if (!empty($prod_categories_id)) {
            $productsInfo->productCategories()->sync($prod_categories_id);
        } else {
            // 如果沒有提供產品類別，則清除所有關聯
            $productsInfo->productCategories()->detach();
        }

        // 處理多語系翻譯
        foreach ($translationData as $locale => $data) {
            $productsInfo->translateOrNew($locale)->fill($data);
        }
        $productsInfo->save();

        // 計算更新後的圖片數量
        $existingImageCount = $productsInfo->images->count();
        $deleteCount = $request->has('delete_images') ? count($request->delete_images) : 0;
        $uploadCount = $request->hasFile('product_images') ? count($request->file('product_images')) : 0;

        // 計算最終圖片數量
        $finalImageCount = $existingImageCount - $deleteCount + $uploadCount;

        // 檢查是否超過限制
        if ($finalImageCount > self::MAX_IMAGES_PER_PRODUCT) {
            Flash::error('每個產品最多只能有 '.self::MAX_IMAGES_PER_PRODUCT.' 張圖片');
            return redirect()->back()->withInput();
        }

        // 處理圖片刪除
        if ($request->has('delete_images')) {
            $this->deleteProductImages($request->delete_images);
        }

        // 處理圖片排序
        if ($request->has('sort_orders')) {
            $this->updateImageSortOrders($request->sort_orders);
        }

        // 處理新上傳的圖片
        if ($request->hasFile('product_images')) {
            $this->saveProductImages($productsInfo, $request);
        }

        Flash::success('產品更新成功');

        return redirect(route('admin.productsInfos.index'));
    }

    /**
     * Remove the specified ProductsInfo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productsInfo = $this->productsInfoRepository->find($id);

        if (empty($productsInfo)) {
            Flash::error('Products Info not found');

            return redirect(route('admin.productsInfos.index'));
        }

        // 刪除產品關聯的所有圖片
        foreach ($productsInfo->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $this->productsInfoRepository->delete($id);

        Flash::success('產品刪除成功');

        return redirect(route('admin.productsInfos.index'));
    }

    /**
     * 儲存產品圖片
     */
    private function saveProductImages($product, $request)
    {
        $files = $request->file('product_images');
        $newSortOrders = $request->new_sort_orders ?? [];
        $maxSortOrder = ProductImage::where('product_id', $product->id)->max('sort_order') ?? 0;

        foreach ($files as $key => $file) {
            // 存儲圖片到儲存空間
            $path = $file->store('product_images', 'public');

            // 儲存圖片記錄到資料庫
            $sortOrder = isset($newSortOrders[$key]) ? $newSortOrders[$key] : $maxSortOrder + 1;
            $maxSortOrder = max($maxSortOrder, $sortOrder);

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $path,
                'sort_order' => $sortOrder
            ]);
        }
    }

    /**
     * 刪除產品圖片
     */
    private function deleteProductImages($imageIds)
    {
        foreach ($imageIds as $imageId) {
            $image = ProductImage::find($imageId);

            if ($image) {
                // 刪除實際圖片檔案
                Storage::disk('public')->delete($image->image_path);

                // 刪除資料庫記錄
                $image->delete();
            }
        }
    }

    /**
     * 更新圖片排序（根據拖曳排序的結果）
     */
    private function updateImageSortOrders($sortOrders)
    {
        foreach ($sortOrders as $imageId => $sortOrder) {
            ProductImage::where('id', $imageId)
                ->update(['sort_order' => $sortOrder]);
        }
    }

    // 共用檔案處理函式
    function handleFileUpload($newFile, $existingFilePath, $uploadDir)
    {
        if ($newFile) {
            $path = public_path('uploads/files/' . $uploadDir . '/');
            $filename = time() . '_' . $newFile->getClientOriginalName();

            // 確保目錄存在
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            // 若已有檔案，刪除舊檔案
            if (!empty($existingFilePath) && File::exists(public_path('uploads/' . $existingFilePath))) {
                File::delete(public_path('uploads/' . $existingFilePath));
            }

            // 儲存新檔案
            $newFile->move($path, $filename);

            return 'files/' . $uploadDir . '/' . $filename;
        }

        // 若無新檔案，返回舊檔案路徑
        return $existingFilePath;
    }

    // 共用的圖片處理函式
    function processImage($image, $uploadDir, $resizeWidth = 800, $quality = 75)
    {
        if ($image) {
            $path = public_path('uploads/images/' . $uploadDir) . '/';
            $filename = time() . '_' . $image->getClientOriginalName();

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            // 壓縮圖片
            $image = Image::make($image)
                ->orientate()
                // ->resize($resizeWidth, null, function ($constraint) {
                //     $constraint->aspectRatio();
                //     $constraint->upsize();
                // })
                ->encode('jpg', $quality); // 設定 JPG 格式和品質
            $image->save($path . $filename);

            return 'images/' . $uploadDir . '/' . $filename;
        }

        return '';
    }

    // 共用圖片處理函式
    function handleImageUpload($newImage, $existingImagePath, $uploadDir, $resizeWidth = 800, $quality = 75)
    {
        if ($newImage) {
            $path = public_path('uploads/images/' . $uploadDir . '/');
            $filename = time() . '_' . $newImage->getClientOriginalName();

            // 確保目錄存在
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            // 若已有圖片，刪除舊圖片
            if (!empty($existingImagePath) && File::exists(public_path('uploads/' . $existingImagePath))) {
                File::delete(public_path('uploads/' . $existingImagePath));
            }

            // 壓縮並保存新圖片
            $image = Image::make($newImage)
                ->orientate()
                // ->resize($resizeWidth, null, function ($constraint) {
                //     $constraint->aspectRatio();
                //     $constraint->upsize();
                // })
                ->encode('jpg', $quality); // 設定 JPG 格式和品質
            $image->save($path . $filename);

            return 'images/' . $uploadDir . '/' . $filename;
        }

        // 若無新圖片，返回舊圖片路徑
        return $existingImagePath;
    }

    /**
     * 根據應用類別獲取對應的產品品牌和產品類別
     */
    public function getCategoriesData(Request $request)
    {
        $applicationCategoryId = $request->input('application_category_id');
        // 取得語系
        $locale = app()->getLocale();

        // 獲取對應的品牌列表，包含翻譯
        $brands = \App\Models\Admin\BrandsInfo::with(['translations' => function($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->where('application_categories_info_id', $applicationCategoryId)
            ->get()
            ->map(function($brand) {
                return [
                    'id' => $brand->id,
                    'name' => $brand->translate()->name ?? $brand->id // 如果翻譯不存在則使用ID
                ];
            })
            ->pluck('name', 'id')
            ->toArray();

        // 獲取對應的產品類別列表，包含翻譯
        $productCategories = \App\Models\Admin\ProductCategories::with(['translations' => function($query) use ($locale) {
                $query->where('locale', $locale);
            }])
            ->where('application_categories_info_id', $applicationCategoryId)
            ->get()
            ->map(function($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->translate()->name ?? $category->id // 如果翻譯不存在則使用ID
                ];
            })
            ->pluck('name', 'id')
            ->toArray();

        return response()->json([
            'brands' => $brands,
            'productCategories' => $productCategories
        ]);
    }
}
