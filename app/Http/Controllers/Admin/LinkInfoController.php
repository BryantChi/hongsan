<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLinkInfoRequest;
use App\Http\Requests\Admin\UpdateLinkInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\LinkInfo;
use App\Repositories\Admin\LinkInfoRepository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Flash;

class LinkInfoController extends AppBaseController
{
    /** @var LinkInfoRepository $linkInfoRepository*/
    private $linkInfoRepository;

    public function __construct(LinkInfoRepository $linkInfoRepo)
    {
        $this->linkInfoRepository = $linkInfoRepo;
    }

    /**
     * Display a listing of the LinkInfo.
     */
    public function index(Request $request)
    {
        $linkInfos = $this->linkInfoRepository->paginate(10);

        return view('admin.link_infos.index')
            ->with('linkInfos', $linkInfos);
    }

    /**
     * Show the form for creating a new LinkInfo.
     */
    public function create()
    {
        // 獲取目前最大排序值並加1
        $nextSortOrder = LinkInfo::max('sort_order') + 1;

        // 如果沒有記錄，設置為1
        if ($nextSortOrder === null) {
            $nextSortOrder = 1;
        }

        return view('admin.link_infos.create', compact('nextSortOrder'));
    }

    /**
     * Store a newly created LinkInfo in storage.
     */
    public function store(CreateLinkInfoRequest $request)
    {
        $input = $request->all();

        // 處理圖片上傳
        if ($request->hasFile('image')) {
            $input['image'] = $this->processImage(
                $request->file('image'),
                'link_infos'
            );
        } else {
            $input['image'] = ''; // 如果沒有上傳圖片，則設置為空字符串
        }

        $linkInfo = $this->linkInfoRepository->create($input);

        Flash::success('Link Info saved successfully.');

        return redirect(route('admin.linkInfos.index'));
    }

    /**
     * Display the specified LinkInfo.
     */
    public function show($id)
    {
        $linkInfo = $this->linkInfoRepository->find($id);

        if (empty($linkInfo)) {
            Flash::error('Link Info not found');

            return redirect(route('admin.linkInfos.index'));
        }

        return view('admin.link_infos.show')->with('linkInfo', $linkInfo);
    }

    /**
     * Show the form for editing the specified LinkInfo.
     */
    public function edit($id)
    {
        $linkInfo = $this->linkInfoRepository->find($id);

        if (empty($linkInfo)) {
            Flash::error('Link Info not found');

            return redirect(route('admin.linkInfos.index'));
        }

        return view('admin.link_infos.edit')->with('linkInfo', $linkInfo);
    }

    /**
     * Update the specified LinkInfo in storage.
     */
    public function update($id, UpdateLinkInfoRequest $request)
    {
        $linkInfo = $this->linkInfoRepository->find($id);

        if (empty($linkInfo)) {
            Flash::error('Link Info not found');

            return redirect(route('admin.linkInfos.index'));
        }

        $input = $request->all();

        // 處理圖片上傳
        if ($request->hasFile('image')) {
            // 如果有新圖片，則處理並更新圖片路徑
            $input['image'] = $this->handleImageUpload(
                $request->file('image'),
                $linkInfo->image, // 使用現有圖片路徑
                'link_infos'
            );
        } else {
            // 如果沒有新圖片，則保留現有圖片路徑
            $input['image'] = $linkInfo->image;
        }

        $linkInfo = $this->linkInfoRepository->update($input, $id);

        Flash::success('Link Info updated successfully.');

        return redirect(route('admin.linkInfos.index'));
    }

    /**
     * Remove the specified LinkInfo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $linkInfo = $this->linkInfoRepository->find($id);

        if (empty($linkInfo)) {
            Flash::error('Link Info not found');

            return redirect(route('admin.linkInfos.index'));
        }

        $this->linkInfoRepository->delete($id);

        // 如果有圖片，刪除圖片檔案
        if (!empty($linkInfo->image) && File::exists(public_path('uploads/' . $linkInfo->image))) {
            File::delete(public_path('uploads/' . $linkInfo->image));
        }

        Flash::success('Link Info deleted successfully.');

        return redirect(route('admin.linkInfos.index'));
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
