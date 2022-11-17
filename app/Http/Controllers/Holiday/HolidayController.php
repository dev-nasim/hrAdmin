<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Holiday;

class HolidayController extends Controller
{

    public function index()
    {
        $data['holidays'] = Holiday::paginate(10);
        return view('pages.leave.holiday_view', $data);
    }

    public function create()
    {

        return view('pages.leave.add_holiday');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'h_name' => 'required',
            'from' => 'required',
            'to' => 'required',
            'no_days' => 'required',

        ]);


        $model = new Holiday();
        $model->fill($request->all())->save();

        Session::flash('success', 'Holiday Inserted');
        return redirect('holiday');
    }

    public function show($id)
    {
        //
    }

    public function edit(Holiday $holiday)
    {
        return view('pages.leave.edit_holiday',compact('holiday'));
    }

    public function update(Request $request, Holiday $holiday)
    {
        $this->validate($request,[
            'h_name' => 'required',
            'from' => 'required',
            'to' => 'required',
            'no_days' => 'required',

        ]);


        $holiday->update($request->all());
        $holiday->save();

        return redirect()->route('holiday.index')->with('success','Holidays has Been updated successfully');

    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect()->route('holiday.index')->with('success','Holidays has been deleted successfully');
    }
}
