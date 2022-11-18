<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class RoleController extends Controller
{

    public function index()
    {
        $data['roles']= Role::get();
        return view('pages.role.role_list',$data);
    }

    public function create()
    {
        return view('pages.role.role_add');
    }

    public function store(RoleRequest $request)
    {
        $model = new Role();
        $model->fill($request->all())->save();

        Session::flash('success', 'Role Inserted');
        return redirect('role');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
