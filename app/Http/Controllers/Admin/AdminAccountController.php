<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateAdminAccountRequest;
use App\Http\Requests\Admin\UpdateAdminAccountRequest;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends AppBaseController
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.admin_users.index')
            ->with('adminUsers', $users);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.admin_users.edit')
            ->with('adminUsers', $user);
    }

    public function create()
    {
        return view('admin.admin_users.create');
    }

    public function store(CreateAdminAccountRequest $request)
    {
        $input = $request->all();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        Flash::success('User created successfully.');
        return redirect(route('admin.adminUsers.index'));
    }

    public function show($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.adminUsers.index'));
        }
        return view('admin.admin_users.show')
            ->with('adminUsers', $user);
    }

    public function update(UpdateAdminAccountRequest $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();

        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.adminUsers.index'));
        }

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        $user->update($input);

        Flash::success('User updated successfully.');
        return redirect(route('admin.adminUsers.index'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.adminUsers.index'));
        }
        $user->delete();
        Flash::success('User deleted successfully.');
        return redirect(route('admin.adminUsers.index'));
    }

}
