<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeaveApplicationController extends Controller
{

    public function index(Request $request)
    {
        $data['leaves']= Leave::get();
        if($request->ajax()) {
            return view('pages.leave.AjaxLeaveData', $data);
        }
        return view('pages.leave.view_leave_application', $data);
    }

    public function create()
    {
        return view('pages.leave.add_leave_application');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'worker_name' => 'required',
            'leave_type' => 'required',
            'apply_day' => 'required',
            'approve_day' => 'required',
            'reason' => 'required',
        ]);

        $model = new Leave();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Inserted'
            ]);
        }

        Session::flash('success', 'Application Inserted');
        return redirect('leave');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['leave'] = Leave::where('id', $id)->first();

        if ($data['leave']){
            if(request()->ajax()){
                if(request()->input('type')){
                    return response()->json($data['leave']);
                }
                return view('pages.leave.AjaxLeaveEdit', $data);
            }
        }
        return redirect('leave');
    }

    public function update(Request $request, Leave $leave)
    {
        $leave = Leave::where('id', $request->input('leave_id'))->first();
        if ($leave){
            $leave->fill($request->all());
            $leave->save();

            if(request()->ajax()){
                return response()->json([
                    'status'=>2000,
                    'message'=>'Successfully Updated'
                ]);
            }
            Session::flash('success', 'Leave Updated');
            return redirect('leave');
        }

        return redirect('leave');
    }

    public function destroy($id)
    {
        $data['leave'] = Leave::where('id', $id)->delete();

        if(request()->ajax()){
            return response()->json([
                'status'=>2000,
                'message'=>'Successfully Deleted'
            ]);
        }
    }
}
