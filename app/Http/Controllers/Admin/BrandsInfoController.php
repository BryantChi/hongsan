<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateBrandsInfoRequest;
use App\Http\Requests\Admin\UpdateBrandsInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\BrandsInfoRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Str;

class BrandsInfoController extends AppBaseController
{
    /** @var BrandsInfoRepository $brandsInfoRepository*/
    private $brandsInfoRepository;

    public function __construct(BrandsInfoRepository $brandsInfoRepo)
    {
        $this->brandsInfoRepository = $brandsInfoRepo;
    }

    /**
     * Display a listing of the BrandsInfo.
     */
    public function index()
    {
        // 取得所有品牌資訊
        $brandsInfos = $this->brandsInfoRepository->paginate(10);

        return view('admin.brands_infos.index')
            ->with('brandsInfos', $brandsInfos);
    }

    /**
     * Show the form for creating a new BrandsInfo.
     */
    public function create()
    {
        // 取得系統支援的語系
        $locales = config('translatable.locales');
        // 取得應用類別資訊列表
        $applicationCategoriesInfos = \App\Models\Admin\ApplicationCategoriesInfo::pluck('name', 'id')->toArray();
        // 將應用類別資訊轉換為選擇列表格式
        $applicationCategoriesInfos = ['' => '請選擇'] + $applicationCategoriesInfos;

        return view('admin.brands_infos.create', compact('locales', 'applicationCategoriesInfos'));
    }

    /**
     * Store a newly created BrandsInfo in storage.
     */
    public function store(CreateBrandsInfoRequest $request)
    {
        $input = $request->all();

        // 自動生成 slug (如果沒有提供)
        // if (empty($input['slug']) && isset($input[config('translatable.fallback_locale')]['name'])) {
        $input['slug'] = Str::slug($input[config('translatable.fallback_locale')]['name']);
        // }

        // 處理圖片上傳
        $input['image'] = $this->processImage($request->file('image'), 'brands_image');

        // 處理多語系資料
        $translationData = [];
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];
                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        // 建立主記錄
        $brandsInfo = $this->brandsInfoRepository->create($input);

        // 儲存翻譯資料
        foreach ($translationData as $locale => $translation) {
            $brandsInfo->translateOrNew($locale)->fill($translation);
        }
        $brandsInfo->save();

        Flash::success('品牌資訊已成功儲存。');

        return redirect(route('admin.brandsInfos.index'));
    }

    /**
     * Display the specified BrandsInfo.
     */
    public function show($id)
    {
        $brandsInfo = $this->brandsInfoRepository->find($id);

        if (empty($brandsInfo)) {
            Flash::error('找不到品牌資訊');

            return redirect(route('admin.brandsInfos.index'));
        }

        return view('admin.brands_infos.show')->with('brandsInfo', $brandsInfo);
    }

    /**
     * Show the form for editing the specified BrandsInfo.
     */
    public function edit($id)
    {
        $brandsInfo = $this->brandsInfoRepository->find($id);

        if (empty($brandsInfo)) {
            Flash::error('Brands Info not found');

            return redirect(route('admin.brandsInfos.index'));
        }

        // 取得系統支援的語系
        $locales = config('translatable.locales');

        // 取得應用類別資訊列表
        $applicationCategoriesInfos = \App\Models\Admin\ApplicationCategoriesInfo::pluck('name', 'id')->toArray();
        // 將應用類別資訊轉換為選擇列表格式
        $applicationCategoriesInfos = ['' => '請選擇'] + $applicationCategoriesInfos;

        return view('admin.brands_infos.edit')->with('brandsInfo', $brandsInfo)->with('locales', $locales)->with('applicationCategoriesInfos', $applicationCategoriesInfos);
    }

    /**
     * Update the specified BrandsInfo in storage.
     */
    public function update($id, UpdateBrandsInfoRequest $request)
    {
        $brandsInfo = $this->brandsInfoRepository->find($id);

        if (empty($brandsInfo)) {
            Flash::error('找不到品牌資訊');

            return redirect(route('admin.brandsInfos.index'));
        }

        $input = $request->all();

        // 自動更新 slug (如果沒有提供)
        // if (empty($input['slug']) && isset($input[config('translatable.fallback_locale')]['name'])) {
            $input['slug'] = Str::slug($input[config('translatable.fallback_locale')]['name']);
        // }

        // 處理圖片上傳
        $input['image'] = $this->handleImageUpload($request->file('image'), $brandsInfo->image, 'brands_image');

        // 處理多語系資料
        $translationData = [];
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];
                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        // 更新主記錄
        $brandsInfo = $this->brandsInfoRepository->update($input, $id);

        // 更新翻譯資料
        foreach ($translationData as $locale => $translation) {
            $brandsInfo->translateOrNew($locale)->fill($translation);
        }
        $brandsInfo->save();

        Flash::success('品牌資訊已成功更新。');

        return redirect(route('admin.brandsInfos.index'));
    }

    /**
     * Remove the specified BrandsInfo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $brandsInfo = $this->brandsInfoRepository->find($id);

        if (empty($brandsInfo)) {
            Flash::error('找不到品牌資訊');

            return redirect(route('admin.brandsInfos.index'));
        }

        $this->brandsInfoRepository->delete($id);

        // 刪除圖片
        if (!empty($brandsInfo->image) && file_exists(public_path('uploads/' . $brandsInfo->image))) {
            File::delete(public_path('uploads/' . $brandsInfo->image));
        }

        Flash::success('品牌資訊已成功刪除。');

        return redirect(route('admin.brandsInfos.index'));
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
