<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{

    public function index(Request $request)
    {

        $data['roles']= Role::get();
        if($request->ajax()) {
            return view('pages.role.roleListAjaxData', $data);
        }
        if (\request()->ajax()){
            return view('pages.role.roleListAjaxData',$data);
        }else{
            return view('pages.role.role_list',$data);
        }
    }

    public function create()
    {
        return view('pages.role.role_add');
    }

    public function store(RoleRequest $request)
    {
        $request->role = trim($request->role);
        $model = new Role();
        $model->fill($request->all())->save();
        if ($request->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Inserted'
            ]);
        }
        Session::flash('success', 'Role Inserted');
        return redirect('role');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['role'] = Role::where('id', $id)->first();

        if ($data['role']){
            if(request()->ajax()){
                return view('pages.role.roleFormAjax', $data);
            }
        }
        return redirect('role');
    }

    public function update(Request $request, $id)
    {
        $role = Role::where('id', $request->input('role_id'))->first();
        if ($role){
            $role->fill($request->all());
            $role->save();

            if(request()->ajax()){
                return response()->json([
                    'status'=>2000,
                    'message'=>'Successfully Updated'
                ]);
            }
            Session::flash('success', 'Role Updated');
            return redirect('role');
        }

        return redirect('role');
    }

    public function destroy($id)
    {
        $data['role'] = Role::where('id', $id)->delete();

        if(request()->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Deleted'
            ]);
        }
    }
}
