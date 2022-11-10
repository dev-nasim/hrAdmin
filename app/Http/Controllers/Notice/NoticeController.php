<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    
    public function index()
    {
        return view('pages.notice.view_notice');
    }

    public function create()
    {
        return view('pages.notice.add_notice');
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
