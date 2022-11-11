<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use Session;

class EmployeeController extends Controller
{

    public function index()
    {
        $data['employees'] = Employee::paginate(10);
        return view('pages.employee.emp_list',$data);

    }

    public function create()
    {
        $data['departments'] = Department::get();
        return view('pages.employee.add_employee',$data);
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|numeric',
            'department_id' => 'required',
            'designation' => 'required',
        ]);


        $model = new Employee();
        $model->fill($request->all())->save();

        Session::flash('success', 'Employee Inserted');
        return redirect('employee');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('pages.employee.edit_emp')->with('employees', $employee);
    }

    public function update(Request $request,Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'department_id' => 'required',
            'designation' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee Updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Employee has been deleted successfully');
    }
}
