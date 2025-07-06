<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProductCategoriesInfoRequest;
use App\Http\Requests\Admin\UpdateProductCategoriesInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\ProductCategoriesInfoRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Str;

class ProductCategoriesInfoController extends AppBaseController
{
    /** @var ProductCategoriesInfoRepository $productCategoriesInfoRepository*/
    private $productCategoriesInfoRepository;

    public function __construct(ProductCategoriesInfoRepository $productCategoriesInfoRepo)
    {
        $this->productCategoriesInfoRepository = $productCategoriesInfoRepo;
    }

    /**
     * Display a listing of the ProductCategoriesInfo.
     */
    public function index(Request $request)
    {
        $productCategoriesInfos = $this->productCategoriesInfoRepository->paginate(10);

        return view('admin.product_categories_infos.index')
            ->with('productCategoriesInfos', $productCategoriesInfos);
    }

    /**
     * Show the form for creating a new ProductCategoriesInfo.
     */
    public function create()
    {
        // 取得系統支援的語系
        $locales = config('translatable.locales');
        // 取得應用類別資訊列表
        $applicationCategoriesInfos = \App\Models\Admin\ApplicationCategoriesInfo::pluck('name', 'id')->toArray();
        // 將應用類別資訊轉換為選擇列表格式
        $applicationCategoriesInfos = ['' => '請選擇'] + $applicationCategoriesInfos;

        return view('admin.product_categories_infos.create', compact('locales', 'applicationCategoriesInfos'));
    }

    /**
     * Store a newly created ProductCategoriesInfo in storage.
     */
    public function store(CreateProductCategoriesInfoRequest $request)
    {
        $input = $request->all();

        // 自動生成 slug (如果沒有提供)
        // if (empty($input['slug']) && isset($input[config('translatable.fallback_locale')]['name'])) {
        $input['slug'] = Str::slug($input[config('translatable.fallback_locale')]['name']);
        // }

        // 處理圖片上傳
        $input['image'] = $this->processImage($request->file('image'), 'product_categories_image');

        // 處理多語系資料
        $translationData = [];
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];
                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        $productCategoriesInfo = $this->productCategoriesInfoRepository->create($input);

        // 處理多語系翻譯
        foreach ($translationData as $locale => $data) {
            $productCategoriesInfo->translateOrNew($locale)->fill($data);
        }
        $productCategoriesInfo->save();

        // 顯示成功訊息-繁體中文
        Flash::success('產品類別資訊新增成功');

        return redirect(route('admin.productCategoriesInfos.index'));
    }

    /**
     * Display the specified ProductCategoriesInfo.
     */
    public function show($id)
    {
        $productCategoriesInfo = $this->productCategoriesInfoRepository->find($id);

        if (empty($productCategoriesInfo)) {
            Flash::error('找不到產品類別資訊');

            return redirect(route('admin.productCategoriesInfos.index'));
        }

        return view('admin.product_categories_infos.show')->with('productCategoriesInfo', $productCategoriesInfo);
    }

    /**
     * Show the form for editing the specified ProductCategoriesInfo.
     */
    public function edit($id)
    {
        $productCategoriesInfo = $this->productCategoriesInfoRepository->find($id);

        if (empty($productCategoriesInfo)) {
            Flash::error('找不到產品類別資訊');

            return redirect(route('admin.productCategoriesInfos.index'));
        }

        // 取得系統支援的語系
        $locales = config('translatable.locales');
        // 取得應用類別資訊列表
        $applicationCategoriesInfos = \App\Models\Admin\ApplicationCategoriesInfo::pluck('name', 'id')->toArray();
        // 將應用類別資訊轉換為選擇列表格式
        $applicationCategoriesInfos = ['' => '請選擇'] + $applicationCategoriesInfos;
        // 傳遞資料到編輯視圖
        return view('admin.product_categories_infos.edit')
            ->with('productCategoriesInfo', $productCategoriesInfo)
            ->with('locales', $locales)
            ->with('applicationCategoriesInfos', $applicationCategoriesInfos);
    }

    /**
     * Update the specified ProductCategoriesInfo in storage.
     */
    public function update($id, UpdateProductCategoriesInfoRequest $request)
    {
        $productCategoriesInfo = $this->productCategoriesInfoRepository->find($id);

        if (empty($productCategoriesInfo)) {
            Flash::error('找不到產品類別資訊');

            return redirect(route('admin.productCategoriesInfos.index'));
        }

        $input = $request->all();

        // 自動更新 slug (如果沒有提供)
        // if (empty($input['slug']) && isset($input[config('translatable.fallback_locale')]['name'])) {
            $input['slug'] = Str::slug($input[config('translatable.fallback_locale')]['name']);
        // }

        // 處理圖片上傳
        $input['image'] = $this->handleImageUpload($request->file('image'), $productCategoriesInfo->image, 'product_categories_image');

        // 處理多語系資料
        $translationData = [];
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];
                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        $productCategoriesInfo = $this->productCategoriesInfoRepository->update($input, $id);

        // 處理多語系翻譯
        foreach ($translationData as $locale => $data) {
            $productCategoriesInfo->translateOrNew($locale)->fill($data);
        }
        $productCategoriesInfo->save();

        Flash::success('產品類別資訊更新成功');

        return redirect(route('admin.productCategoriesInfos.index'));
    }

    /**
     * Remove the specified ProductCategoriesInfo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productCategoriesInfo = $this->productCategoriesInfoRepository->find($id);

        if (empty($productCategoriesInfo)) {
            Flash::error('找不到產品類別資訊');

            return redirect(route('admin.productCategoriesInfos.index'));
        }

        $this->productCategoriesInfoRepository->delete($id);

        // 刪除圖片
        if (!empty($productCategoriesInfo->image) && file_exists(public_path('uploads/' . $productCategoriesInfo->image))) {
            File::delete(public_path('uploads/' . $productCategoriesInfo->image));
        }

        Flash::success('產品類別資訊刪除成功');

        return redirect(route('admin.productCategoriesInfos.index'));
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
                ->resize($resizeWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
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
                ->resize($resizeWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('jpg', $quality); // 設定 JPG 格式和品質
            $image->save($path . $filename);

            return 'images/' . $uploadDir . '/' . $filename;
        }

        // 若無新圖片，返回舊圖片路徑
        return $existingImagePath;
    }
}
