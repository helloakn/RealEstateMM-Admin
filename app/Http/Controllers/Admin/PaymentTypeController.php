<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment_Type;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentTypeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        if(session('success_message'))
        {
            Alert::success('Success!', session('success_message'));
        }
        //$data = Payment_Type::select('id','name')->search($name)->paginate(20);
       $data = Payment_Type::orderBy('id','desc')->search($name)->paginate(5);

        return view('admin.pages.payment.listing',compact('data','name'));
    }
    public function show()
    {
        return view('admin.pages.payment.setup');
    }
    public function create(Request $request)
    {
       $validate = validator($request->all(),[
          "english" => "required",
           "myanmar" => "required",
           "chinese" => "required",
           "desen" => "required",
           "desmy" => "required",
           "desch" => "required"
       ]);
       if($validate->fails())
       {
           return back()->withInput()->withErrors($validate);
       }
       $pay = new Payment_Type();
       $pay->create([
          "name" => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]),
           "description" => json_encode(['en'=>$request->desen, 'my'=>$request->desmy, 'ch'=>$request->desch])
       ]);
       return redirect('payment/')->withSuccessMessage('Successfully Inserted data');
    }
    public function edit($id)
    {
        $data = Payment_Type::find($id);
        if(session('error_message'))
        {
            Alert::error('Error!', session('error_message'));
        }
        if(!empty($data))
        {
            return view('admin.pages.payment.edit',compact('data'));
        }
        else{
            return back()->withErrorMessage('No data Found');
        }
    }
    public function update(Request $request)
    {
        $validate = validator($request->all(),[
            "english" => "required",
            "myanmar" => "required",
            "chinese" => "required",
            "desen" => "required",
            "desmy" => "required",
            "desch" => "required"
        ]);
        if($validate->fails())
        {
            return back()->withInput()->withErrors($validate);
        }

        $pay = Payment_Type::find($request->id);
        $pay->update([
            "name" => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]),
            "description" => json_encode(['en'=>$request->desen, 'my'=>$request->desmy, 'ch'=>$request->desch])
        ]);
        return redirect("payment/")->withSuccessMessage('Successfully Updated data');
    }
    public function delete($id)
    {
        $data = Payment_Type::find($id);
        $data->delete();
        return back()->withSuccessMessage("Successfully Deleted data");
    }
}
