<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notic;
use Session;
class NoticeController extends Controller
{

    public function index()
    {
        $data['notics'] = notic::get();
        return view('pages.notice.view_notice',$data);
    }

    public function create()
    {
        return view('pages.notice.add_notice');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'notice_type' => 'required',
            'description' => 'required',
            'notice_date' => 'required',
            'notice_by' => 'required',
        ]);


        $model = new notic();
        $model->fill($request->all())->save();

        Session::flash('success', 'notice Inserted');
        return redirect('notice');
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
