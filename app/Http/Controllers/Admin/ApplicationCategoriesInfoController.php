<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateApplicationCategoriesInfoRequest;
use App\Http\Requests\Admin\UpdateApplicationCategoriesInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\ApplicationCategoriesInfoRepository;
use Illuminate\Http\Request;
use Flash;

class ApplicationCategoriesInfoController extends AppBaseController
{
    /** @var ApplicationCategoriesInfoRepository $applicationCategoriesInfoRepository*/
    private $applicationCategoriesInfoRepository;

    public function __construct(ApplicationCategoriesInfoRepository $applicationCategoriesInfoRepo)
    {
        $this->applicationCategoriesInfoRepository = $applicationCategoriesInfoRepo;
    }

    /**
     * Display a listing of the ApplicationCategoriesInfo.
     */
    public function index(Request $request)
    {
        $applicationCategoriesInfos = $this->applicationCategoriesInfoRepository->paginate(10);

        return view('admin.application_categories_infos.index')
            ->with('applicationCategoriesInfos', $applicationCategoriesInfos);
    }

    /**
     * Show the form for creating a new ApplicationCategoriesInfo.
     */
    public function create()
    {
        return view('admin.application_categories_infos.create');
    }

    /**
     * Store a newly created ApplicationCategoriesInfo in storage.
     */
    public function store(CreateApplicationCategoriesInfoRequest $request)
    {
        $input = $request->all();

        $applicationCategoriesInfo = $this->applicationCategoriesInfoRepository->create($input);

        Flash::success('應用類別資訊新增成功。');

        return redirect(route('admin.applicationCategoriesInfos.index'));
    }

    /**
     * Display the specified ApplicationCategoriesInfo.
     */
    public function show($id)
    {
        $applicationCategoriesInfo = $this->applicationCategoriesInfoRepository->find($id);

        if (empty($applicationCategoriesInfo)) {
            Flash::error('找不到應用類別資訊');

            return redirect(route('admin.applicationCategoriesInfos.index'));
        }

        return view('admin.application_categories_infos.show')->with('applicationCategoriesInfo', $applicationCategoriesInfo);
    }

    /**
     * Show the form for editing the specified ApplicationCategoriesInfo.
     */
    public function edit($id)
    {
        $applicationCategoriesInfo = $this->applicationCategoriesInfoRepository->find($id);

        if (empty($applicationCategoriesInfo)) {
            Flash::error('找不到應用類別資訊');

            return redirect(route('admin.applicationCategoriesInfos.index'));
        }

        return view('admin.application_categories_infos.edit')->with('applicationCategoriesInfo', $applicationCategoriesInfo);
    }

    /**
     * Update the specified ApplicationCategoriesInfo in storage.
     */
    public function update($id, UpdateApplicationCategoriesInfoRequest $request)
    {
        $applicationCategoriesInfo = $this->applicationCategoriesInfoRepository->find($id);

        if (empty($applicationCategoriesInfo)) {
            Flash::error('找不到應用類別資訊');

            return redirect(route('admin.applicationCategoriesInfos.index'));
        }

        $applicationCategoriesInfo = $this->applicationCategoriesInfoRepository->update($request->all(), $id);

        Flash::success('應用類別資訊更新成功。');

        return redirect(route('admin.applicationCategoriesInfos.index'));
    }

    /**
     * Remove the specified ApplicationCategoriesInfo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $applicationCategoriesInfo = $this->applicationCategoriesInfoRepository->find($id);

        if (empty($applicationCategoriesInfo)) {
            Flash::error('找不到應用類別資訊');

            return redirect(route('admin.applicationCategoriesInfos.index'));
        }

        $this->applicationCategoriesInfoRepository->delete($id);

        Flash::success('應用類別資訊刪除成功。');

        return redirect(route('admin.applicationCategoriesInfos.index'));
    }
}
