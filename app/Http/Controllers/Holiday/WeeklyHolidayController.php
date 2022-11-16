<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use App\Models\WeeklyHoliday;
use Illuminate\Http\Request;
use Session;

class WeeklyHolidayController extends Controller
{

    public function index()
    {
        $data['weeklyholidays'] = WeeklyHoliday::get();
        return view('pages.leave.weekly_holiday',$data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
//        $this->validate($request,[
//            'weekly_holiday' => 'required',
//        ]);
//
//        $model = new WeeklyHoliday();
//        $model->fill($request->all())->save();
//
//        Session::flash('success', 'weekly holiday Inserted');
//        return redirect('weekly_holiday');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = WeeklyHoliday::find($id);
        return view('pages.leave.edit_wh')->with('weeklyholidays', $data);
    }

    public function update(Request $request,WeeklyHoliday $weekly_holiday)
    {
        $weekly_holiday->update($request->all());

        return redirect()->route('weekly_holiday.index')->with('success', 'weekly holiday Updated successfully');

    }

    public function destroy($id)
    {
        //
    }
}
