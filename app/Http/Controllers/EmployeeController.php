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

    public function index(Request $request)
    {
        $data['departments'] = Department::get();
        $data['positions'] = Possition::get();
        $data['employees'] = Employee::get();
        if($request->ajax()) {
            return view('pages.employee.AjaxEmpData', $data);
        }
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
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Inserted'
            ]);
        }

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
        $data['employee'] = Employee::where('id', $id)->first();

        if ($data['employee']){
            if(request()->ajax()){
                if(request()->input('type')){
                    return response()->json($data['employee']);
                }
                return view('pages.employee.EditAjaxEmp', $data);
            }
            return view('pages.employee.edit_emp', $data);
        }
        return redirect('employee');
    }

    public function update(Request $request, Employee $employee)
    {
        $employee = Employee::where('id', $request->input('employee_id'))->first();
        if ($employee){
            $employee->fill($request->all());
            $employee->save();

            if(request()->ajax()){
                return response()->json([
                    'status'=>2000,
                    'message'=>'Successfully Updated'
                ]);
            }
            Session::flash('success', 'Employee Updated');
            return redirect('employee');
        }

        return redirect('employee');
    }

    public function destroy($id)
    {
        $data['employee'] = Employee::where('id', $id)->delete();

        if(request()->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Deleted'
            ]);
        }
    }
}
