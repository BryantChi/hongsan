<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTranslationsInfoRequest;
use App\Http\Requests\Admin\UpdateTranslationsInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\TranslationsInfoRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Cache;

class TranslationsInfoController extends AppBaseController
{
    /** @var TranslationsInfoRepository $translationsInfoRepository*/
    private $translationsInfoRepository;

    public function __construct(TranslationsInfoRepository $translationsInfoRepo)
    {
        $this->translationsInfoRepository = $translationsInfoRepo;
    }

    /**
     * Display a listing of the TranslationsInfo.
     */
    public function index(Request $request)
    {
        $translationsInfos = $this->translationsInfoRepository->all();
        $title = app('translator')->get('about');
        return view('admin.translations_infos.index')
            ->with('translationsInfos', $translationsInfos);
    }

    /**
     * Show the form for creating a new TranslationsInfo.
     */
    public function create()
    {
        // 取得系統支援的語系
        $locales = config('translatable.locales');
        return view('admin.translations_infos.create', compact('locales'));
    }

    /**
     * Store a newly created TranslationsInfo in storage.
     */
    public function store(CreateTranslationsInfoRequest $request)
    {
        $input = $request->all();

        // 清除所有語系的快取
        foreach (config('translatable.locales', []) as $locale) {
            Cache::forget('translations.' . $locale);
        }


        $translationsInfo = $this->translationsInfoRepository->create($input);

        Flash::success('翻譯資訊新增成功。');

        return redirect(route('admin.translationsInfos.index'));
    }

    /**
     * Display the specified TranslationsInfo.
     */
    public function show($id)
    {
        $translationsInfo = $this->translationsInfoRepository->find($id);

        if (empty($translationsInfo)) {
            Flash::error('找不到翻譯資訊');

            return redirect(route('admin.translationsInfos.index'));
        }

        return view('admin.translations_infos.show')->with('translationsInfo', $translationsInfo);
    }

    /**
     * Show the form for editing the specified TranslationsInfo.
     */
    public function edit($id)
    {
        $translationsInfo = $this->translationsInfoRepository->find($id);

        if (empty($translationsInfo)) {
            Flash::error('找不到翻譯資訊');

            return redirect(route('admin.translationsInfos.index'));
        }

        return view('admin.translations_infos.edit')->with('translationsInfo', $translationsInfo);
    }

    /**
     * Update the specified TranslationsInfo in storage.
     */
    public function update($id, UpdateTranslationsInfoRequest $request)
    {
        $translationsInfo = $this->translationsInfoRepository->find($id);

        if (empty($translationsInfo)) {
            Flash::error('找不到翻譯資訊');

            return redirect(route('admin.translationsInfos.index'));
        }

        // 清除所有語系的快取
        foreach (config('translatable.locales', []) as $locale) {
            Cache::forget('translations.' . $locale);
        }

        $input = $request->all();
        // 不包含key欄位
        unset($input['key']);

        $translationsInfo = $this->translationsInfoRepository->update($input, $id);

        Flash::success('翻譯資訊更新成功。');

        return redirect(route('admin.translationsInfos.index'));
    }

    /**
     * Remove the specified TranslationsInfo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $translationsInfo = $this->translationsInfoRepository->find($id);

        if (empty($translationsInfo)) {
            Flash::error('找不到翻譯資訊');

            return redirect(route('admin.translationsInfos.index'));
        }

        $this->translationsInfoRepository->delete($id);

        // 清除所有語系的快取
        foreach (config('translatable.locales', []) as $locale) {
            Cache::forget('translations.' . $locale);
        }

        Flash::success('翻譯資訊刪除成功。');

        return redirect(route('admin.translationsInfos.index'));
    }
}
