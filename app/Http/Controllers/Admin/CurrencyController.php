<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input("name");

        if(session('success_message'))
        {
            Alert::success("Success!",session("success_message"));
        }

        $data = Currency::orderBy('id','desc')->search($name)->paginate(3);
        return view('admin.pages.currency.listing',compact('data','name'));
    }
    public function show()
    {
        return view('admin.pages.currency.setup');
    }
    public function create(Request $request)
    {
        $validator = validator(request()->all(),[
           'english' => 'required',
           'myanmar' => 'required',
           "chinese" => 'required',
           'uniten' => 'required',
           'unitmy' => 'required',
            'unitch' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $currency = new Currency();
        $currency->name = json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]);
        $currency->unit = json_encode(['en'=>$request->uniten, 'my'=>$request->unitmy, 'ch'=>$request->unitch]);
        $currency->save();
        return redirect('currency/')->withSuccessMessage("Successfully Inserted data");
    }
    public function edit($id)
    {
        $data = Currency::find($id);
        if(session('error_message'))
        {
            Alert::error('Error!', session('error_message'));
        }
        if(!empty($data))
        {
            return view('admin.pages.currency.edit',compact('data'));
        }
        else{
            return back()->withErrorMessage('No data Found');
        }

    }
    public function update(Request $request, $id)
    {
        $validator = validator(request()->all(),[
            'english' => 'required',
            'myanmar' => 'required',
            'chinese' => 'required',
            'uniten' => 'required',
            'unitmy' => 'required',
            'unitch' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $dataCurrency = Currency::find($id);
        $dataCurrency->update([
           'name' => json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]),
           'unit' => json_encode(['en'=>$request->uniten, 'my'=>$request->unitmy, 'ch'=>$request->unitch])
        ]);
        return redirect('currency/')->withSuccessMessage("Successfully Updated data");
    }
    public function delete($id)
    {
        $data = Currency::find($id);
        $data->delete();
        return redirect('currency/')->withSuccessMessage("Successfully Deleted data");
    }
}
