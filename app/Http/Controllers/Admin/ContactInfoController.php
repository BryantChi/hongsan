<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateContactInfoRequest;
use App\Http\Requests\Admin\UpdateContactInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\ContactInfoRepository;
use Illuminate\Http\Request;
use Flash;

class ContactInfoController extends AppBaseController
{
    /** @var ContactInfoRepository $contactInfoRepository*/
    private $contactInfoRepository;

    public function __construct(ContactInfoRepository $contactInfoRepo)
    {
        $this->contactInfoRepository = $contactInfoRepo;
    }

    /**
     * Display a listing of the ContactInfo.
     */
    public function index(Request $request)
    {
        $contactInfos = $this->contactInfoRepository->paginate(10);

        return view('admin.contact_infos.index')
            ->with('contactInfos', $contactInfos);
    }

    /**
     * Show the form for creating a new ContactInfo.
     */
    public function create()
    {
        return view('admin.contact_infos.create');
    }

    /**
     * Store a newly created ContactInfo in storage.
     */
    public function store(CreateContactInfoRequest $request)
    {
        $input = $request->all();

        $contactInfo = $this->contactInfoRepository->create($input);

        Flash::success('Contact Info saved successfully.');

        return redirect(route('admin.contactInfos.index'));
    }

    /**
     * Display the specified ContactInfo.
     */
    public function show($id)
    {
        $contactInfo = $this->contactInfoRepository->find($id);

        if (empty($contactInfo)) {
            Flash::error('Contact Info not found');

            return redirect(route('admin.contactInfos.index'));
        }

        return view('admin.contact_infos.show')->with('contactInfo', $contactInfo);
    }

    /**
     * Show the form for editing the specified ContactInfo.
     */
    public function edit($id)
    {
        $contactInfo = $this->contactInfoRepository->find($id);

        if (empty($contactInfo)) {
            Flash::error('Contact Info not found');

            return redirect(route('admin.contactInfos.index'));
        }

        return view('admin.contact_infos.edit')->with('contactInfo', $contactInfo);
    }

    /**
     * Update the specified ContactInfo in storage.
     */
    public function update($id, UpdateContactInfoRequest $request)
    {
        $contactInfo = $this->contactInfoRepository->find($id);

        if (empty($contactInfo)) {
            Flash::error('Contact Info not found');

            return redirect(route('admin.contactInfos.index'));
        }

        $contactInfo = $this->contactInfoRepository->update($request->all(), $id);

        Flash::success('Contact Info updated successfully.');

        return redirect(route('admin.contactInfos.index'));
    }

    /**
     * Remove the specified ContactInfo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contactInfo = $this->contactInfoRepository->find($id);

        if (empty($contactInfo)) {
            Flash::error('Contact Info not found');

            return redirect(route('admin.contactInfos.index'));
        }

        $this->contactInfoRepository->delete($id);

        Flash::success('Contact Info deleted successfully.');

        return redirect(route('admin.contactInfos.index'));
    }
}
