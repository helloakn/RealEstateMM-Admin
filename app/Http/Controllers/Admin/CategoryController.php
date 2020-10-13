<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if(session('success_message'))
        {
            Alert::success('Success!', session('success_message'));
        }
       // $name = $request->input('name');
        $data = Category::select('Category.id as id','Category.name as name','Parent.id as parentId',\DB::raw("IF(Parent.name is null,'{\"en\":\"-\",\"my\":\"-\",\"ch\":\"-\"}',Parent.name) as parentName") )//'as parentName')
        ->LeftJoin('Category as Parent','Category.parent_category_id','=','Parent.id')
        ->orderBy('Category.id','desc')
        ->paginate(10);
        

        return view('admin.pages.category.listing',compact('data'));
    }
    public function show()
    {
        $mainCategory = Category::select('id','name')->where('parent_category_id','=',0)
        ->get();
        $data = array(
            'status' => 'ok',
            'data' => $mainCategory
        );
        return view('admin.pages.category.setup')->with($data);
    }
    public function create(Request $request)
    {
        $validator = validator(request()->all(),[
            "english" => "required",
            "myanmar" => "required",
            "chinese" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }

        $cat = new Category;
        $cat->parent_category_id = $request->get('parent_category_id');
        $cat->name = json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]);
        $cat->save();
        return redirect('category/')->withSuccessMessage("Successfully Inserted data");
    }

    public function edit($id)
    {
        $mainCategory = Category::select('id','name')->where('parent_category_id','=',0)
        ->get();
        

        $data = Category::find($id);
        if(session('error_message'))
        {
            Alert::error("Error!",session("error_message"));
        }
        if(!empty($data))
        {
            $data = array(
                'status' => 'ok',
                'parentCategory' => $mainCategory,
                'data' => $data
            );
          //    dd($data);
            return view('admin.pages.category.edit')->with($data);
        }
        else {
            return back()->withErrorMessage('No data Found');
        }
    }
    public function update(Request $request)
    {
        $validator = validator($request->all(),[
            "english" => "required",
            "myanmar" => "required",
            "chinese" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $cat = Category::find($request->id);
        $cat->name = json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]);;
        $cat->save();
        return redirect('category/')->withSuccessMessage('Successfully Updated data');
    }
    public function delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect('category/')->withSuccessMessage('Successfully Deleted data');
    }
}
