<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyController extends Controller
{
    public function index()
    {
        if(session('success_message'))
        {
            Alert::success('Success!',session('success_message'));
        }
        $data = Property::all();
        return view('admin.pages.property.listing',compact('data'));
    }
    public function show()
    {
        return view('admin.pages.property.setup');
    }
    public function create(Request $request)
    {
        $validator = validator(request()->all(),[
            'address' => 'required',
            'size' => 'required',
            'finished_status' => 'required',
            'price' => 'required',
            'bed_room' => 'required',
            'single_bath_room' => 'required',
            'master_bath_room' => 'required',
            'advertiser' => 'required',
            'description' => 'required',
            'status' => 'required',
            'location' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $property = new Property();
        $property->address = request()->address;
        $property->finished_status = request()->finished_status;
        $property->size = request()->size;
        $property->price = request()->price;
        $property->bed_room = request()->bed_room;
        $property->single_bath_room = request()->single_bath_room;
        $property->master_bath_room = request()->master_bath_room;
        $property->advertiser = request()->advertiser;
        $property->description = request()->description;
        $property->status = request()->status;
        $property->location = request()->location;
        $property->lat = request()->lat;
        $property->lng = request()->lng;
        $property->save();
        return redirect('property/')->withSuccessMessage('Successfully Inserted data');
    }
    public function edit($id)
    {
        if(session('error_message'))
        {
            Alert::error('Error!',session('error_message'));
        }
        $data = Property::find($id);
        if(!empty($data))
        {
            return view('admin.pages.property.edit',compact('data'));
        }
        else{
            return back()->withErrorMessage('No data Found');
        }
    }
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),[
            'address' => 'required',
            'size' => 'required',
            'finished_status' => 'required',
            'price' => 'required',
            'bed_room' => 'required',
            'single_bath_room' => 'required',
            'master_bath_room' => 'required',
            'advertiser' => 'required',
            'description' => 'required',
            'status' => 'required',
            'location' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $property = Property::find($id);
        $property->update([
            "address" => request()->address,
            "finished_status" => request()->finished_status,
            "size" => request()->size,
            "price" => request()->price,
            "bed_room" => request()->bed_room,
            "single_bath_room" => request()->single_bath_room,
            "master_bath_room" => request()->master_bath_room,
            "advertiser" => request()->advertiser,
            "description" => request()->description,
            "status" => request()->status,
            "location" => request()->location,
            "lat" => request()->lat,
            "lng" => request()->lng
        ]);
        return redirect('property/')->withSuccessMessage('Successfully Updated data');
    }
    public function delete($id)
    {
        $data = Property::find($id);
        $data->delete();
        return back()->withSuccessMessage('Successfully Deleted data');
    }
}
