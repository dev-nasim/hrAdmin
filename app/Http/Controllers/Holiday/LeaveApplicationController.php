<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveApplicationController extends Controller
{
    
    public function index()
    {
        return view('pages.leave.view_leave_application');
    }

    public function create()
    {
        return view('pages.leave.add_leave_application');
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
