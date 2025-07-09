<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateHeroSlideRequest;
use App\Http\Requests\Admin\UpdateHeroSlideRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\HeroSlide;
use App\Repositories\Admin\HeroSlideRepository;
use Illuminate\Http\Request;
use Flash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HeroSlideController extends AppBaseController
{
    /** @var HeroSlideRepository $heroSlideRepository*/
    private $heroSlideRepository;

    public function __construct(HeroSlideRepository $heroSlideRepo)
    {
        $this->heroSlideRepository = $heroSlideRepo;
    }

    /**
     * Display a listing of the HeroSlide.
     */
    public function index(Request $request)
    {
        $heroSlides = $this->heroSlideRepository->paginate(10);

        return view('admin.hero_slides.index')
            ->with('heroSlides', $heroSlides);
    }

    /**
     * Show the form for creating a new HeroSlide.
     */
    public function create()
    {
        // 取得系統支援的語系
        $locales = config('translatable.locales');

        // 獲取目前最大排序值並加1
        $nextSortOrder = HeroSlide::max('sort_order') + 1;

        // 如果沒有記錄，設置為1
        if ($nextSortOrder === null) {
            $nextSortOrder = 1;
        }

        return view('admin.hero_slides.create', compact('locales', 'nextSortOrder'));
    }

    /**
     * Store a newly created HeroSlide in storage.
     */
    public function store(CreateHeroSlideRequest $request)
    {
        $input = $request->all();

        // 自動生成 slug (如果沒有提供)
        // if (empty($input['slug']) && isset($input[config('translatable.fallback_locale')]['name'])) {
        // $input['slug'] = Str::slug($input['en']['title'] ?? time());
        // }

        // 處理多語系資料
        $translationData = [];
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];

                // 處理圖片上傳
                if (isset($input[$locale]['image_624'])) {
                    $translationData[$locale]['image_624'] = $this->processImage(
                        $request->file($locale . '.image_624'),
                        'hero_slides',
                    );
                }
                if (isset($input[$locale]['image_1024'])) {
                    $translationData[$locale]['image_1024'] = $this->processImage(
                        $request->file($locale . '.image_1024'),
                        'hero_slides',
                    );
                }
                if (isset($input[$locale]['image_1280'])) {
                    $translationData[$locale]['image_1280'] = $this->processImage(
                        $request->file($locale . '.image_1280'),
                        'hero_slides',
                    );
                }
                if (isset($input[$locale]['image_1920'])) {
                    $translationData[$locale]['image_1920'] = $this->processImage(
                        $request->file($locale . '.image_1920'),
                        'hero_slides',
                    );
                }

                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        $heroSlide = $this->heroSlideRepository->create($input);

        // 處理多語系翻譯
        foreach ($translationData as $locale => $data) {
            $heroSlide->translateOrNew($locale)->fill($data);
        }
        $heroSlide->save();

        Flash::success('輪播圖新增成功.');

        return redirect(route('admin.heroSlides.index'));
    }

    /**
     * Display the specified HeroSlide.
     */
    public function show($id)
    {
        $heroSlide = $this->heroSlideRepository->find($id);

        if (empty($heroSlide)) {
            Flash::error('找不到輪播圖');

            return redirect(route('admin.heroSlides.index'));
        }

        return view('admin.hero_slides.show')->with('heroSlide', $heroSlide);
    }

    /**
     * Show the form for editing the specified HeroSlide.
     */
    public function edit($id)
    {
        $heroSlide = $this->heroSlideRepository->find($id);

        if (empty($heroSlide)) {
            Flash::error('找不到輪播圖');

            return redirect(route('admin.heroSlides.index'));
        }

        // 取得系統支援的語系
        $locales = config('translatable.locales');

        return view('admin.hero_slides.edit')->with('heroSlide', $heroSlide)->with('locales', $locales);
    }

    /**
     * Update the specified HeroSlide in storage.
     */
    public function update($id, UpdateHeroSlideRequest $request)
    {
        $heroSlide = $this->heroSlideRepository->find($id);

        if (empty($heroSlide)) {
            Flash::error('找不到輪播圖');

            return redirect(route('admin.heroSlides.index'));
        }

        $input = $request->all();

        // 處理圖片上傳
        $input['image_624'] = $this->handleImageUpload(
            $request->file('image_624'),
            $heroSlide->image_624,
            'hero_slides',
        );
        $input['image_1024'] = $this->handleImageUpload(
            $request->file('image_1024'),
            $heroSlide->image_1024,
            'hero_slides',
        );
        $input['image_1280'] = $this->handleImageUpload(
            $request->file('image_1280'),
            $heroSlide->image_1280,
            'hero_slides',
        );
        $input['image_1920'] = $this->handleImageUpload(
            $request->file('image_1920'),
            $heroSlide->image_1920,
            'hero_slides',
        );

        // 處理多語系資料
        $translationData = [];
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($input[$locale])) {
                $translationData[$locale] = $input[$locale];

                // 處理圖片上傳
                if (isset($input[$locale]['image_624'])) {
                    $translationData[$locale]['image_624'] = $this->handleImageUpload(
                        $request->file($locale . '.image_624'), // 使用多語系的檔名
                        $heroSlide->getTranslation('image_624', $locale),
                        'hero_slides',
                    );  // 使用多語系的資料夾
                }
                if (isset($input[$locale]['image_1024'])) {
                    $translationData[$locale]['image_1024'] = $this->handleImageUpload(
                        $request->file($locale . '.image_1024'),
                        $heroSlide->getTranslation('image_1024', $locale),
                        'hero_slides',
                    );
                }
                if (isset($input[$locale]['image_1280'])) {
                    $translationData[$locale]['image_1280'] = $this->handleImageUpload(
                        $request->file($locale . '.image_1280'),
                        $heroSlide->getTranslation('image_1280', $locale),
                        'hero_slides',
                    );
                }
                if (isset($input[$locale]['image_1920'])) {
                    $translationData[$locale]['image_1920'] = $this->handleImageUpload(
                        $request->file($locale . '.image_1920'),
                        $heroSlide->getTranslation('image_1920', $locale),
                        'hero_slides',
                    );
                }


                unset($input[$locale]); // 移除以免影響主表資料
            }
        }

        $heroSlide = $this->heroSlideRepository->update($input, $id);

        // 處理多語系翻譯
        foreach ($translationData as $locale => $data) {
            $heroSlide->translateOrNew($locale)->fill($data);
        }
        $heroSlide->save();

        Flash::success('輪播圖更新成功.');

        return redirect(route('admin.heroSlides.index'));
    }

    /**
     * Remove the specified HeroSlide from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $heroSlide = $this->heroSlideRepository->find($id);

        if (empty($heroSlide)) {
            Flash::error('找不到輪播圖');

            return redirect(route('admin.heroSlides.index'));
        }

        // 刪除圖片檔案
        if (File::exists(public_path('uploads/' . $heroSlide->image_624))) {
            File::delete(public_path('uploads/' . $heroSlide->image_624));
        }
        if (File::exists(public_path('uploads/' . $heroSlide->image_1024))) {
            File::delete(public_path('uploads/' . $heroSlide->image_1024));
        }
        if (File::exists(public_path('uploads/' . $heroSlide->image_1280))) {
            File::delete(public_path('uploads/' . $heroSlide->image_1280));
        }
        if (File::exists(public_path('uploads/' . $heroSlide->image_1920))) {
            File::delete(public_path('uploads/' . $heroSlide->image_1920));
        }

        $this->heroSlideRepository->delete($id);

        Flash::success('輪播圖刪除成功.');

        return redirect(route('admin.heroSlides.index'));
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
}
