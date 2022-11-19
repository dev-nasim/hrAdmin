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
        $data['departments'] = Department::paginate(10);
        return view('pages.department.view_department',$data);
    }

    public function create()
    {
        return view('pages.department.add_department');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'department_name' => 'required',
        ]);

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
