<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Possition;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{

    public function index()
    {
//        $data['employees'] = Employee::with('department')->paginate(10);
        $data['employees'] = Employee::with(['position','department'])->paginate(10);
//        dd($data['employees']);
        return view('pages.employee.emp_list',$data);

    }

    public function create()
    {
        $data['departments'] = Department::get();
        $data['positions'] = Possition::get();
        return view('pages.employee.add_employee',$data);
    }


    public function store(EmployeeRequest $request)
    {



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
        $data['departments'] = Department::get();
        $data['positions'] = Possition::get();
        $employee = Employee::find($id);
        return view('pages.employee.edit_emp',$data)->with('employees', $employee);
    }

    public function update(Request $request,Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'department_id' => 'required',
//            'possition' => 'required',
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
