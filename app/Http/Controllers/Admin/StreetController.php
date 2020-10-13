<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Street;
use RealRashid\SweetAlert\Facades\Alert;

class StreetController extends Controller
{
    public function index(Request $request)
    {
        if(session('success_message'))
        {
            Alert::success("Success!", session('success_message'));
        }
        $name = $request->name;
        $data = Street::orderBy('id','desc')->search($name)->paginate(5);
        return view('admin.pages.street.listing',compact('data','name'));
    }
    public function show()
    {
        return view('admin.pages.street.setup');
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "english" => "required",
            "myanmar" => "required",
            "chinese" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $data = new Street();
        $data->create([
            'name' => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese])
        ]);

        return redirect('street/')->withSuccessMessage('Successfully Inserted Data');
    }
    public function edit($id)
    {
        if(session('error_message'))
        {
            Alert::error('Error!', session('error_message'));
        }
        $data = Street::find($id);
        if(!empty($data))
        {
            return view('admin.pages.street.edit',compact('data'));
        }
        else {
            return back()->withErrorMessage('No Data Found');
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
           "english" => "required",
            "myanmar" => "required",
            "chinese" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $data = Street::find($id);
        $data->update([
           "name" => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese])
        ]);

        return redirect('street/')->withSuccessMessage("Successfully Updated Data");
    }
    public function delete($id)
    {
        $data = Street::find($id);
        $data->delete();
        return back()->withSuccessMessage('Successfully Deleted Data!');
    }
}
