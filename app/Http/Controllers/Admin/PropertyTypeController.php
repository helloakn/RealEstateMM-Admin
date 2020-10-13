<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property_Type;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyTypeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        if(session('success_message'))
        {
            Alert::success('Success!',session('success_message'));
        }
        $data = Property_Type::all();
        $data = Property_Type::orderBy('id','desc')->search($name)->paginate(3);
        return view('admin.pages.property_type.listing',compact('data','name'));
    }
    public function show()
    {
        return view('admin.pages.property_type.setup');
    }
    public function create(Request $request)
    {
        $validator = validator($request->all(),[
           "name" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $type = new Property_Type();
        $type->create([
           "name" => $request->name
        ]);
        return redirect('property_type/')->withSuccessMessage('Successfully Inserted data');
    }
    public function edit($id)
    {
        $data = Property_Type::find($id);
        if(session('error_message'))
        {
            Alert::error('Error!',session('error_message'));
        }
        if(!empty($data))
        {
            return view('admin.pages.property_type.edit',compact('data'));
        }
        else
        {
            return back()->withErrorMessage('No data Found');
        }
    }
    public function update(Request $request)
    {
        $validator = validator($request->all(),[
           "name" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $type = Property_Type::find($request->id);
        $type->update([
           "name" => $request->name
        ]);
        return redirect('property_type')->withSuccessMessage('Successfully Updated data');
    }
    public function delete($id)
    {
        $data = Property_Type::find($id);
        $data->delete();
        return redirect('property_type')->withSuccessMessage('Successfully Deleted data');
    }
}
