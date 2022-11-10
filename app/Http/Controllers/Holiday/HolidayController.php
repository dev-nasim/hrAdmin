<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HolidayController extends Controller
{

    public function index()
    {
        return view('pages.leave.holiday_view');
    }

    public function create()
    {
        return view('pages.leave.add_holiday');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
