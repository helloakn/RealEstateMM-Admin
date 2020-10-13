<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        if(session('success_message'))
        {
            Alert::success('!Success', session('success_message'));
        }
        $data = User::orderBy('name','desc')->search($name)->paginate(3);
        return view('admin.pages.user.listing',compact('data','name'));
    }
    public function show()
    {
        if(session('error_message'))
        {
            Alert::error('Error!', session('error_message'));
        }
        return view('admin.pages.user.setup');
    }
    public function create(Request $request)
    {
        $validate = validator($request->all(),[
           "name" => "required|regex:/^[a-zA-Z]+\d*$/|max:255",
           "email" => "required|email",
           "password" => "required|min:3",
           "phone" => "required|regex:/^[0-9]+\-\d+$/",
           "address" => "required",
        ]);
        if($validate->fails())
        {
            return back()->withInput()->withErrors($validate);
        }
        $file = $request->file('file');
        if(!empty($file))
        {
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path()."/user_image/",$filename);
        }
        else{
            $filename = '';
        }
        $datas = User::all();
        foreach ($datas as $data)
        {
            if($request->email == $data['email'])
            {
                return back()->withInput()->withErrorMessage("Email is already taken!");
            }
        }
        $user = new User();
        $user->create([
           "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone" => $request->phone,
            "address" => $request->address,
            "profile_image" => $filename
        ]);
        return redirect('user/')->withSuccessMessage("Successfully Inserted data");
    }
    public function edit($id)
    {
        $data = User::find($id);
        if(session('error_message'))
        {
            Alert::success('Error',session('error_message'));
        }
        if(!empty($data))
        {
            return view('admin.pages.user.edit',compact('data'));
        }
        else{
            return back()->withErrorMessage("No data Found");
        }
    }
    public function update(Request $request, $id)
    {
        $validate = validator($request->all(),[
            "name" => "required|regex:/^[a-zA-Z]+\d*$/|max:255",
            "email" => "required|email",
            "password" => "required|min:5",
            "phone" => "required|regex:/^[0-9]+\-\d+$/",
            "address" => "required",
        ]);
        if($validate->fails())
        {
            return back()->withInput()->withErrors($validate);
        }

        $user = User::find($id);

        $file = $request->file('file');
        if(!empty($file))
        {
            $filename = $file->getClientOriginalName();
            $file->move(public_path().'/user_image/', $filename);
        }
        else {
            $filename = '';
        }
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone" => $request->phone,
            "address" => $request->address,
            "profile_image" => $filename
        ]);
        return redirect('user/')->withSuccessMessage('Successfully Updated data');
    }
    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('user/')->withSuccessMessage('Successfully Deleted data');
    }
}
