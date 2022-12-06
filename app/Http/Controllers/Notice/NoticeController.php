<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notic;
use Illuminate\Support\Facades\Session;
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

    public function show(notic $notics)
    {
        //
    }

    public function edit($id)
    {
        $notic = notic::find($id);
        return view('pages.notice.edit_notice')->with('notics', $notic);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'notice_type' => 'required',
            'description' => 'required',
            'notice_date' => 'required',
            'notice_by' => 'required',
        ]);

        $notic = notic::find($id);
        $input = $request->all();
        $notic->update($input);

        Session::flash('success', 'Notice Updated');
        return redirect('notice');
    }

    public function destroy($id)
    {
        notic::destroy($id);

        Session::flash('success', 'Notice Deleted');
        return redirect('notice');
    }
}
