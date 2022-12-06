<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Session;

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

        return view('pages.department.view_department',$data);
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
        return view('pages.department.edit_dept')->with('departments', $department);
    }


    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required',
        ]);

        $department->update($request->all());

        return redirect()->route('department.index')->with('success', 'Department Updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('success','Department has been deleted successfully');
    }
}
