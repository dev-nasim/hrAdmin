<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\Finder\in;

class UserController extends Controller
{

    public function index()
    {
        $keyword = request()->input('keyword');

        $data['users']= User::where(function ($query) use ($keyword){
            if ($keyword){
                $query->where('name','LIKE',"%$keyword%");
            }
        })->orderBy('id','DESC')->get();

        if (\request()->ajax()){
            return view('pages.users.userListAjaxData',$data);
        }else{
            return view('pages.users.userList',$data);
        }
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
            'birthday'=>$request->birthday,
            'password'=>Hash::make($request->password),
        ];
        $model->fill($userArray);
        $model->save();
        if ($request->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Inserted',
                'data'=>$model,
            ]);
        }

        Session::flash('success', 'User Inserted');
        return redirect('users');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $data['user'] = User::where('id', $id)->first();

       if ($data['user']){
        if(request()->ajax()){
            return view('pages.users.userFormAjax', $data);
        }
       }
       return redirect('users');
    }


    public function update(Request $request, $id)
    {
       $user = User::where('id', $request->input('user_id'))->first();
       if ($user){
           $user->fill($request->all());
           $user->save();

           if(request()->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Updated'
            ]);
           }

           Session::flash('success', 'User Updated');
           return redirect('users');
       }

        return redirect('users');
    }

    public function destroy($id)
    {

        $data['user'] = User::where('id', $id)->delete();

        if(request()->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Deleted'
            ]);
        }
    }
}
