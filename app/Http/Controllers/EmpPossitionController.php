<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Possition;
use Illuminate\Support\Facades\Session;

class EmpPossitionController extends Controller
{

    public function index()
    {
        $data['possitions'] = Possition::paginate(10);
        return view('pages.employee.emp_possition_list',$data);
    }

    public function create()
    {
        return view('pages.employee.add_possition');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'possition' => 'required',
            'possition_details' => 'required',

        ]);


        $model = new Possition();
        $model->fill($request->all())->save();

        Session::flash('success', 'Possition Inserted');
        return redirect('possition');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $possition = Possition::find($id);
        return view('pages.employee.edit_possition')->with('possitions', $possition);
    }

    public function update(Request $request, Possition $possition)
    {
        $request->validate([
            'possition' => 'required',
            'possition_details' => 'required',
        ]);

        $possition->update($request->all());

        return redirect()->route('possition.index')->with('success', 'Possition Updated successfully');
    }

    public function destroy(Possition $possition)
    {
        $possition->delete();
        return redirect()->route('possition.index')->with('success','Possition has been deleted successfully');
    }
}
