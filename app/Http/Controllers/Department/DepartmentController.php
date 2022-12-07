<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Session;

class DepartmentController extends Controller
{

    public function index()
    {
        $has_award = request()->input('has_award');

        $data['departments'] = Department::where(function ($query) use ($has_award){
            if ($has_award && $has_award == 'yes'){
                $query->whereHas('employee', function ($empQuery){
                    $empQuery->whereHas('award');
                });
            }
            if ($has_award && $has_award == 'no'){
                $query->whereDoesntHave('employee', function ($empQuery){
                    $empQuery->whereDoesntHave('award');
                });
            }
        })->paginate(10);

        if (request()->ajax())
        {
            return view('pages.department.view_department',$data);
        }else
        {
            return view('pages.department.view_department',$data);
        }
    }

    public function create()
    {
        return view('pages.department.add_department');
    }


    public function store(Request $request)
    {
        $model = new Department();

        $this->validate($request,$model->validationRules());

        $model = new Department();
        $model->fill($request->all())->save();

        if ($request->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Inserted'
            ]);
        }

        Session::flash('success', 'Department Inserted');
        return redirect('department');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $department = Department::find($id);

        if(request()->ajax()){
            if($department){
                return response()->json($department);
            }
            return response()->json([]);
        }

       if ($department){
        return view('pages.department.edit_dept', $department);
       }
       return redirect('department');

    }



    public function update(Request $request, $id)
    {
        $department = Department::where('id', $request->input('department_id'))->first();
        if ($department){
            // $department->fill($request->all());
            $department->department_name = $request->get('name');
            $department->save();


            if(request()->ajax()){
                if($department){
                    return response()->json($department);
                }
                return response()->json([
                    'status'=>2000,
                 'message'=>'Successfully Updated'
                ]);

            }

            Session::flash('success', 'User Inserted');
            return redirect('department');
        }

         return redirect('department');
    }


    public function destroy($id)
    {
        $data['department'] = Department::where('id', $id)->delete();

        if(request()->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Deleted'
            ]);
        }
    }
}
