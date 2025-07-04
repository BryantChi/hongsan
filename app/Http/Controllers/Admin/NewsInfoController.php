<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateNewsInfoRequest;
use App\Http\Requests\Admin\UpdateNewsInfoRequest;
use App\Repositories\Admin\NewsInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Response;

class NewsInfoController extends AppBaseController
{
    /** @var NewsInfoRepository $newsInfoRepository*/
    private $newsInfoRepository;

    public function __construct(NewsInfoRepository $newsInfoRepo)
    {
        $this->newsInfoRepository = $newsInfoRepo;
    }

    /**
     * Display a listing of the NewsInfo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $newsInfos = $this->newsInfoRepository->paginate(10);

        return view('admin.news_infos.index')
            ->with('newsInfos', $newsInfos);
    }

    /**
     * Show the form for creating a new NewsInfo.
     *
     * @return Response
     */
    public function create()
    {
        // 取得系統支援的語系
        $locales = config('translatable.locales');

        return view('admin.news_infos.create', compact('locales'));
    }

    /**
     * Store a newly created NewsInfo in storage.
     *
     * @param CreateNewsInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsInfoRequest $request)
    {
        $input = $request->all();

        // 處理圖片
        if ($request->hasFile('cover_front_image')) {
            // 使用共用的圖片處理函式
            $input['cover_front_image'] = $this->processImage($request->file('cover_front_image'), 'cover_front_image');
        } else {
            // 如果沒有上傳圖片，則設置為空字符串
            $input['cover_front_image'] = '';
        }

        // 處理多語系內容
        $translationData = [];
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];
                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        // 建立主記錄
        $newsInfo = $this->newsInfoRepository->create($input);

        // 儲存翻譯資料
        foreach ($translationData as $locale => $translation) {
            $newsInfo->translateOrNew($locale)->fill($translation);
        }
        $newsInfo->save();

        Flash::success('News Info saved successfully.');

        return redirect(route('admin.newsInfos.index'));
    }

    /**
     * Display the specified NewsInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsInfo = $this->newsInfoRepository->find($id);

        if (empty($newsInfo)) {
            Flash::error('News Info not found');

            return redirect(route('admin.newsInfos.index'));
        }

        return view('admin.news_infos.show')->with('newsInfo', $newsInfo);
    }

    /**
     * Show the form for editing the specified NewsInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsInfo = $this->newsInfoRepository->find($id);

        if (empty($newsInfo)) {
            Flash::error('News Info not found');

            return redirect(route('admin.newsInfos.index'));
        }

        // 取得系統支援的語系
        $locales = config('translatable.locales');

        return view('admin.news_infos.edit', compact('newsInfo', 'locales'));
    }

    /**
     * Update the specified NewsInfo in storage.
     *
     * @param int $id
     * @param UpdateNewsInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsInfoRequest $request)
    {
        $newsInfo = $this->newsInfoRepository->find($id);

        if (empty($newsInfo)) {
            Flash::error('News Info not found');

            return redirect(route('admin.newsInfos.index'));
        }

        $input = $request->all();

        if ($request->hasFile('cover_front_image')) {
            $input['cover_front_image'] = $this->handleImageUpload($request->file('cover_front_image'), $newsInfo['cover_front_image'], 'cover_front_image');
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

        // 更新主記錄
        $newsInfo = $this->newsInfoRepository->update($input, $id);

        // 更新翻譯資料
        foreach ($translationData as $locale => $translation) {
            $newsInfo->translateOrNew($locale)->fill($translation);
        }
        $newsInfo->save();

        Flash::success('News Info updated successfully.');

        return redirect(route('admin.newsInfos.index'));
    }

    /**
     * Remove the specified NewsInfo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsInfo = $this->newsInfoRepository->find($id);

        if (empty($newsInfo)) {
            Flash::error('News Info not found');

            return redirect(route('admin.newsInfos.index'));
        }

        // 刪除圖片
        if (!empty($newsInfo->cover_front_image) && File::exists(public_path('uploads/' . $newsInfo->cover_front_image))) {
            File::delete(public_path('uploads/' . $newsInfo->cover_front_image));
        }

        $this->newsInfoRepository->delete($id);

        Flash::success('News Info deleted successfully.');

        return redirect(route('admin.newsInfos.index'));
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
