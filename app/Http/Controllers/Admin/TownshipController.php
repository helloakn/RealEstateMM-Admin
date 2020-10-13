<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Township;
use App\Models\State_Division;
use RealRashid\SweetAlert\Facades\Alert;

class TownshipController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input("name");
        if(session('success_message'))
        {
            Alert::success('Success!', session('success_message'));
        }
        $data = Township::all();
        $state = State_Division::all();

        $data = Township::orderBy('name','desc')->search($name)->paginate(15);
        return view("admin.pages.township.listing",compact('data','state','name'));
    }
    public function show()
    {
        $state = State_Division::all();
        //return $state;
        return view('admin.pages.township.setup',compact('state'));
    }
    public function create(Request $request)
    {
        $validate = validator($request->all(), [
           "english" => "required",
           "myanmar" => "required",
           "chinese" => "required"
        ]);
        if($validate->fails())
        {
            return back()->withInput()->withErrors($validate);
        }
        $data = new Township();

        $data->create([
           "name" => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]),
            "state_division_id" => $request->stdID
        ]);
        return redirect("township/")->withSuccessMessage("Successfully Inserted data");
    }
    public function edit($id)
    {
        if(session('error_message'))
        {
            Alert::error('Error!',session('error_message'));
        }
        $data = Township::find($id);
        $states = State_Division::all();
        if(!empty($data))
        {
            return view('admin.pages.township.edit', compact('data','states'));
        }
        else {
            return back()->withErrorMessage('No data Found');
        }
    }
    public function update(Request $request, $id)
    {
        $validate = validator($request->all(), [
            "english" => "required",
            "myanmar" => "required",
            "chinese" => "required",
            "lat" => "required",
            "lag" => "required",
            "stdID" => "required"
        ]);
        if($validate->fails())
        {
            return back()->withInput()->withErrors($validate);
        }

        $data = Township::find($id);
        $data->update([
            "name" => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]),
            "lat" => $request->lat,
            "lag" => $request->lag,
            "state_division_id" => $request->stdID
        ]);
        return redirect('township/')->withSuccessMessage("Successfully Updated data");
    }
    public function delete($id)
    {
        $data = Township::find($id);
        $data->delete();
        return back()->withSuccessMessage("Successfully Deleted data");
    }
}
