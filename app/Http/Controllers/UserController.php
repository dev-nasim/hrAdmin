<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{

    public function index()
    {
        $data['users']= User::get();
        return view('pages.users.userList',$data);
    }

    public function create()
    {
        return view('pages.users.userForm');
    }

    public function store(UserRequest $request)
    {
        $model = new User();
        $userArray = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];

        $model->fill($userArray);
        $model->save();

        Session::flash('success', 'User Inserted');
        return redirect('users');
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
