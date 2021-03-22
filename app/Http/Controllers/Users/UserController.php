<?php

namespace App\Http\Controllers\Users;

use App\DataTables\UsersDataTables;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(UsersDataTables $dataTables)
    {
        $employees = EmployeeGeneralData::all();
        $users = User::all();
        return $dataTables->render('users.index',compact('employees','users'));
    }

    public function create()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $request_data = $request->except(['password', 'password_confirmation', 'permissions']);
        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);

        $user->attachRole('admin');
        if (request()->has('permissions')) {
            $user->syncPermissions($request->permissions);
        }
        session()->flash('success', __('general.success'));

        return redirect(route('users.index'));
    }


    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $request_data = $request->except(['password']);

        if (request()->has('password') && request('password') !== '') {
            $request_data['password'] = bcrypt($request->password);
        } else {
            $request_data['password'] = $user->password;
        }

        $user->update($request_data);

        if (request()->has('permissions')) {
            $user->syncPermissions($request->permissions);
        }
        session()->flash('success', __('general.successEdite'));

        return redirect(route('users.index'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('success', __('general.successDelete'));
        return back();
    }
}
