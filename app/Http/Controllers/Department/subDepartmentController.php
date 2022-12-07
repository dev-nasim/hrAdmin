<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Session;

class subDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subdepartments'] = SubDepartment::paginate(10);
        return view('pages.department.view_sub_department',$data);
    }

    public function create()
    {
        $data['departments'] = Department::get();
        return view('pages.department.add_sub_department',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'department' => 'required',
            'sub_department' => 'required',
        ]);


        $model = new SubDepartment();
        $model->fill($request->all())->save();

        Session::flash('success', 'Department Inserted');
        return redirect('subdepartment');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['departments'] = Department::get();
        $subdepartment = SubDepartment::find($id);
        return view('pages.department.edit_sub_dept',$data)->with('subdepartment', $subdepartment);
    }

    public function update(Request $request, SubDepartment $subdepartment)
    {
        $request->validate([
            'department' => 'required',
            'sub_department' => 'required',
        ]);

        $subdepartment->update($request->all());

        return redirect()->route('subdepartment.index')->with('success', 'Sub Department Updated successfully');
    }

    public function destroy(SubDepartment $subdepartment)
    {
        {
            $subdepartment->delete();
            return redirect()->route('subdepartment.index')->with('success','Sub Department has been deleted successfully');
        }
    }
}
