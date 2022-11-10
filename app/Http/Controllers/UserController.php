<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('pages.users.userList');
    }

    public function create()
    {
        return view('pages.users.userForm');
    }

    public function store(Request $request)
    {
//        $model = new User();
//        $userArray = [
//            'name'=>'Admin',
//            'email'=>'admin@gmail.com',
//            'password'=>Hash::make('123456'),
//        ];
//
//        $model->fill($userArray);
//        $model->save();

        dd($request->all());
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
