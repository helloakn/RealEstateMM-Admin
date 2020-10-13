<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        if(session('success_message'))
        {
            Alert::success('Success!',session('success_message'));
        }
        if(session('error_message'))
        {
            Alert::error("Error!",session('error_message'));
        }
        $data = Admin::orderBy('id','asc')->search($name)->get();
        return view('admin.pages.account.listing',compact('data','name'));
    }
    public function show()
    {
        if(session('error_message'))
        {
            Alert::error('Error!',session('error_message'));
        }
        return view("admin.pages.account.setup");
    }
    public function create(Request $request)
    {
        $validator = validator($request->all(),[
           "type" => "required|numeric",
           "name" => "required|regex:/^[a-zA-Z]+\d*$/|max:255",
           "password" => "required|min:3",
           "email" => "required|email",
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $file = $request->file('file');
        if(!empty($file))
        {
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path().'/admin_image/', $filename);
        }
        else {
            $filename = '';
        }
        $datas = Admin::all();
        foreach ($datas as $data)
        {
            if($request->email == $data['email'])
            {
                return back()->withInput()->withErrorMessage("Email is alreday taken!");
            }
        }
        $dta = new Admin();
        $dta->name = $request->name;
        $dta->type = $request->type;
        $dta->password = Hash::make($request->password);
        $dta->email = $request->email;
        $dta->profile_image = $filename;
        $dta->save();
        return redirect("admin/")->withSuccessMessage('Successfully Inserted data');

    }
    public function edit($id)
    {
        $data = Admin::find($id);
        if(!empty($data))
        {
            return view('admin.pages.account.edit',compact('data'));
        }
        else{
            return back()->withErrorMessage('No data Found');
        }
    }
    public function update(Request $request)
    {
        $validator = validator($request->all(),[
            "type" => "required|numeric",
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:3"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $file = $request->file('file');
        if(!empty($file))
        {
            $filename = time() . "_" . $file->getClientOriginalName();
            //$file->storeAs("public/", time()."_". $filename);
            $file->move(public_path()."/admin_image/", $filename);
        }
        else{
            $filename = '';
        }

        $data = Admin::find($request->id);
        $pass = Hash::make($request->password);
        $data->name = $request->name;
        $data->type = $request->type;
        $data->password = $pass;
        $data->email = $request->email;
        $data->profile_image = $filename;
        $data->save();

        return redirect('admin/')->withSuccessMessage('Successfully Updated data');
    }
    public function delete(Request $request, $id)
    {
        $data = Admin::find($request->id);
        $adminID = $data['id'];
        //dd($adminID);
        $auth = Admin::find(Auth::user()->id);
        $authID = $auth['id'];
        //dd($authID);
        if($adminID != $authID)
        {
            $data->delete();
            return back()->withSuccessMessage("Successfully Deleted data");
        }
        else{
            return back()->withErrorMessage("Can not delete yourself !");
        }
    }
}
