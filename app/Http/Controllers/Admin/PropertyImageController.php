<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property_Image;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyImageController extends Controller
{
    public function index()
    {
        if(session('success_message'))
        {
            Alert::success('Success!',session('success_message'));
        }
        $data = Property_Image::all();
        return view('admin.pages.property_image.listing',compact('data'));
    }
    public function show()
    {
        return view('admin.pages.property_image.setup');
    }
    public function create(Request $request)
    {
        $validator = validator($request->all(), [
            "type" => "required"
        ]);
        if($validator->fails())
        {
            return back();
        }
        $file = $request->file('image');
        if(!empty($file))
        {
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/propertyPic/', $filename);
        }
        else{
            $filename = '';
        }
        $data = new Property_Image();
        $data->create([
            "type" => $request->type,
            "image" => $filename
        ]);
        return redirect('property_image/')->withSuccessMessage("Successfully Inserted data");
    }
    public function edit($id)
    {
        $data = Property_Image::find($id);
        if(session('error_message'))
        {
            Alert::error('Error!',session('error_message'));
        }
        if(!empty($data))
        {
            return view('admin.pages.property_image.edit',compact('data'));
        }
        else{
            return back()->withErrorMessage('No data Found');
        }
    }
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),[
           "type" => "required"
        ]);
        if($validator->fails())
        {
            return back();
        }

        $file = $request->file('image');
        if(!empty($file))
        {
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/propertyPic/', $filename);
        }
        else{
            $filename = '';
        }

        $data = Property_Image::find($id);
        $data->update([
           "type" => $request->type,
            "image" => $filename
        ]);
        return redirect('property_image')->withSuccessMessage('Successfully Updated data');
    }
    public function delete($id)
    {
        $data = Property_Image::find($id);
        $data->delete();
        return redirect('property_image')->withSuccessMessage("Successfully Deleted data");
    }
}
