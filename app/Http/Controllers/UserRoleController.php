<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Session;

class UserRoleController extends Controller
{

    public function index()
    {
        $data['user_roles'] = UserRole::with(['role','user'])->paginate(10);
        return view('pages.userRole.user_role_list',$data);
    }


    public function create()
    {
        $data['users'] = User::get();
        $data['roles'] = Role::get();
        return view('pages.userRole.user_role_add',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        $model = new UserRole();
        $model->fill($request->all())->save();

        Session::flash('success', 'User Role Inserted');
        return redirect('user_role');
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