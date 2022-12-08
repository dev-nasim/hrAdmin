<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserRoleController extends Controller
{

    public function index(Request $request)
    {
        $data['user_roles'] = UserRole::with(['role','user'])->paginate(10);
        if($request->ajax()) {
            return view('pages.userRole.ajaxUserRoleList', $data);
        }
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
        $data['users'] = User::get();
        $data['roles'] = Role::get();
        $user_role = UserRole::find($id);
        return view('pages.userRole.edit_user',$data)->with('user_roles', $user_role);
    }

    public function update(Request $request,UserRole $user_role)
    {
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        $user_role->update($request->all());

        return redirect()->route('user_role.index')->with('success', 'user Updated successfully');
    }

    public function destroy($id)
    {
        $data['user_role'] = UserRole::where('id', $id)->delete();
//        UserRole::destroy($id);
        if(request()->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Deleted'
            ]);
        }
    }
}
