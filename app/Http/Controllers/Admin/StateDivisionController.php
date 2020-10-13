<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State_Division;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StateDivisionController extends Controller
{
    public function index(Request $request)
    {
        $data = State_Division::all();
        $name = $request->input('name');
        if(session('success_message'))
        {
            Alert::success('Success!',session('success_message'));
        }
        $data = State_Division::orderBy('id','desc')->search($name)->paginate(5);
        return view('admin.pages.state_division.listing',compact('data','name'));
    }
    public function show()
    {
        return view('admin.pages.state_division.setup');
    }
    public function create(Request $request)
    {
        $validator = validator($request->all(),[
           "english" => "required",
            "myanmar" => "required",
            "chinese" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $state = new State_Division();
        $state->create([
            "name" => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese])
        ]);
        return redirect('state_division/')->withSuccessMessage('Successfully Inserted data');
    }
    public function edit($id)
    {
        $data = State_Division::find($id);
        if(session('error_message'))
        {
            Alert::error('error!',session('error_message'));
        }
        if(!empty($data))
        {
            return view('admin.pages.state_division.edit',compact('data'));
        }
        else{
            return back()->withErrorMessage('No data Found !');
        }
    }
    public function update(Request $request)
    {
        $validate = validator($request->all(),[
            "english" => "required",
            "myanmar" => "required",
            "chinese" => "required"
        ]);
        if($validate->fails())
        {
            return back()->withInput()->withErrors($validate);
        }
        $std = State_Division::find($request->id);
        $std->update([
            "name" => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese])
        ]);
        return redirect("state_division/")->withSuccessMessage("Successfully Updated data");
    }
    public function delete($id)
    {
        $data = State_Division::find($id);
        $data->delete();
        return back()->withSuccessMessage('Successfully Deleted data');
    }
}
