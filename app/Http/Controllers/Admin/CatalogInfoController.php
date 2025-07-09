<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCatalogInfoRequest;
use App\Http\Requests\Admin\UpdateCatalogInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\CatalogInfoRepository;
use Illuminate\Http\Request;
use Flash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CatalogInfoController extends AppBaseController
{
    /** @var CatalogInfoRepository $catalogInfoRepository*/
    private $catalogInfoRepository;

    public function __construct(CatalogInfoRepository $catalogInfoRepo)
    {
        $this->catalogInfoRepository = $catalogInfoRepo;
    }

    /**
     * Display a listing of the CatalogInfo.
     */
    public function index(Request $request)
    {
        $catalogInfos = $this->catalogInfoRepository->paginate(10);

        return view('admin.catalog_infos.index')
            ->with('catalogInfos', $catalogInfos);
    }

    /**
     * Show the form for creating a new CatalogInfo.
     */
    public function create()
    {
        return view('admin.catalog_infos.create');
    }

    /**
     * Store a newly created CatalogInfo in storage.
     */
    public function store(CreateCatalogInfoRequest $request)
    {
        $input = $request->all();

        $catalogInfo = $this->catalogInfoRepository->create($input);

        Flash::success('Catalog Info saved successfully.');

        return redirect(route('admin.catalogInfos.index'));
    }

    /**
     * Display the specified CatalogInfo.
     */
    public function show($id)
    {
        $catalogInfo = $this->catalogInfoRepository->find($id);

        if (empty($catalogInfo)) {
            Flash::error('Catalog Info not found');

            return redirect(route('admin.catalogInfos.index'));
        }

        return view('admin.catalog_infos.show')->with('catalogInfo', $catalogInfo);
    }

    /**
     * Show the form for editing the specified CatalogInfo.
     */
    public function edit($id)
    {
        $catalogInfo = $this->catalogInfoRepository->find($id);

        if (empty($catalogInfo)) {
            Flash::error('Catalog Info not found');

            return redirect(route('admin.catalogInfos.index'));
        }

        return view('admin.catalog_infos.edit')->with('catalogInfo', $catalogInfo);
    }

    /**
     * Update the specified CatalogInfo in storage.
     */
    public function update($id, UpdateCatalogInfoRequest $request)
    {
        $catalogInfo = $this->catalogInfoRepository->find($id);

        if (empty($catalogInfo)) {
            Flash::error('Catalog Info not found');

            return redirect(route('admin.catalogInfos.index'));
        }

        $catalogInfo = $this->catalogInfoRepository->update($request->all(), $id);

        Flash::success('Catalog Info updated successfully.');

        return redirect(route('admin.catalogInfos.index'));
    }

    /**
     * Remove the specified CatalogInfo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $catalogInfo = $this->catalogInfoRepository->find($id);

        if (empty($catalogInfo)) {
            Flash::error('Catalog Info not found');

            return redirect(route('admin.catalogInfos.index'));
        }

        $this->catalogInfoRepository->delete($id);

        Flash::success('Catalog Info deleted successfully.');

        return redirect(route('admin.catalogInfos.index'));
    }
}
