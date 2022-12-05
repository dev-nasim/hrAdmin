<?php

namespace App\Http\Controllers\Award;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AwardController extends Controller
{

    public function index(Request $request)
    {
        $data['employees'] = Employee::get();
        $data['awards']= Award::get();
        if($request->ajax()) {
            return view('pages.award.Ajaxdata', $data);
        }
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
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Inserted'
            ]);
        }

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
        $data['award'] = Award::where('id', $id)->first();

        if ($data['award']){
            if(request()->ajax()){
                if(request()->input('type')){
                    return response()->json($data['award']);
                }
                return view('pages.award.FormAjax', $data);
            }
            return view('pages.award.edit_award', $data);
        }
        return redirect('award');
    }

    public function update(Request $request, Award $award)
    {
        $award = Award::where('id', $request->input('award_id'))->first();
        if ($award){
            $award->fill($request->all());
            $award->save();

            if(request()->ajax()){
                return response()->json([
                    'status'=>2000,
                    'message'=>'Successfully Updated'
                ]);
            }
            Session::flash('success', 'Award Updated');
            return redirect('award');
        }

        return redirect('award');
    }

    public function destroy($id)
    {
        $data['award'] = Award::where('id', $id)->delete();

        if(request()->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Deleted'
            ]);
        }
    }
}
