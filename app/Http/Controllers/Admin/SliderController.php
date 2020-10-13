<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Slider;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        if(session('success_message'))
        {
            Alert::success('Success!', session('success_message'));
        }
        $name = $request->name;
        $data = Slider::orderBy('id','desc')->search($name)->paginate(5);
        return view('admin.pages.slider.listing',compact('data','name'));
    }
    public function show()
    {
        return view('admin.pages.slider.setup');
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required",
            "description" => "required"
        ]);

        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $data = new Slider();
        $data->create([
           "name" => $request->name,
           "description" => $request->description
        ]);
        return redirect('slider/')->withSuccessMessage('Successfully Inserted Data');
    }
    public function edit($id)
    {
        if(session('error_message'))
        {
            Alert::error("Error!", session('error_message'));
        }
        $data = Slider::find($id);
        if(!empty($data))
        {
            return view('admin.pages.slider.edit',compact('data'));
        }
        else{
            return back()->withErrorMessage("No Data Found");
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
           "name" => "required",
           "description" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $data = Slider::find($id);
        $data->update([
           "name"=> $request->name,
           "description" => $request->description
        ]);
        return redirect('slider/')->withSuccessMessage("Successfully Updated Data");
    }
    public function delete($id)
    {
        $data = Slider::find($id);
        $data->delete();
        return redirect('slider/')->withSuccessMessage("Successfully Deleted Data");
    }
}
