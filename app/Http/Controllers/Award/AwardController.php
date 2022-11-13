<?php

namespace App\Http\Controllers\Award;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AwardController extends Controller
{

    public function index()
    {
        $data['awards'] = Award::paginate(10);
        return view('pages.award.award_list',$data);
    }
    public function create()
    {
        $data['employees'] = Employee::get();
        return view('pages.award.add_award',$data);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'awd_name' => 'required',
            'awd_des' => 'required',
            'employee_id' => 'required',
            'awd_item' => 'required',
            'awd_date' => 'required',
            'awd_by' => 'required',
        ]);
        $model = new Award();
        $model->fill($request->all())->save();

        Session::flash('success', 'Award Inserted');
        return redirect('award');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['employees'] = Employee::get();
        $award = Award::find($id);
        return view('pages.award.edit_award',$data)->with('awards', $award);
    }

    public function update(Request $request, Award $award)
    {
        $this->validate($request,[
            'awd_name' => 'required',
            'awd_des' => 'required',
            'employee_id' => 'required',
            'awd_item' => 'required',
            'awd_date' => 'required',
            'awd_by' => 'required',
        ]);

        $award->update($request->all());
        return redirect()->route('award.index')->with('success', 'Award Updated successfully');

        Session::flash('success', 'Award updated');
        return redirect('award');
    }

    public function destroy(Award $award)
    {
        $award->delete();
        return redirect()->route('award.index')->with('success','Award Delete Successfully');
    }
}
