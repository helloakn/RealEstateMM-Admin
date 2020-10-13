<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Category_Feature_Type;
use RealRashid\SweetAlert\Facades\Alert;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        if(session('success_message'))
        {
            Alert::success('Success!',session('success_message'));
        }
        $name = $request->name;
        $data = Feature::orderBy('id','desc')->search($name)->paginate(5);
        return view('admin.pages.feature.listing', compact('data','name'));
       
       
        
    }
    public function show()
    {
        $data = Category::select('Category.id as id','Category.name as name')
        ->where('parent_category_id','=','0')
        ->get();
        return view('admin.pages.feature.setup',compact('data'));
    }
    public function create(Request $request)
    {
       // return $request->all();
        $validator = Validator::make($request->all(),[
           "english" => "required",
            "myanmar" => "required",
            "chinese" => "required",
            "category_id" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $feature = new Feature();
        $feature->name = json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]);
       $feature->save();
// $feature->id; 
        $categoryIds = $request->get('category_id');
        //return $categoryIds;
        foreach($categoryIds as $cid){
            $cft = new Category_Feature_Type();
            $cft->category_id = $cid;
            $cft->feature_type_id =$feature->id;
            $cft->save();
        }

        return redirect('feature/')->withSuccessMessage("Succesfully Inserted Data");
    }
    public function edit($id)
    {
        if(session('error_message'))
        {
            Alert::error('Error!',session('error_message'));
        }
        $feature = Feature::find($id);
        if(!empty($feature))
        {
            $category = Category::select('Category.id as id','Category.name as name')
            //$category = Category::select('Category.id as id')
            ->where('parent_category_id','=','0')
            ->get();
            $scategory = Category_Feature_Type::select(\DB::raw('group_concat(category_id) as cid'))
            ->where('feature_type_id',$feature->id)
            ->first();
            //return explode(",",$scategory->cid);
            $data = array(
                'data' => $feature,
                'category' => $category,
                'selectedCategory_ids' => explode(",",$scategory->cid)
                
            );
           // return $data;
            return view('admin.pages.feature.edit')->with($data);
        }
        else {
            return back()->withErrorMessage('No Data Found');
        }
    }
    public function update(Request $request, $id)
    {
        //akn
        $validator = Validator::make($request->all(),[
            "english" => "required",
            "myanmar" => "required",
            "chinese" => "required",
            "category_id" => "required"
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $feature = Feature::find($id);
        if($feature){
            $feature->name = json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]);
            $feature->save();
        }
        $category_ids = $request->get('category_id');
      //  return $category_ids;
        //$cft = Category_Feature_Type::whereNotIn('category_id', $category_ids)->get();
        //$cft->delete();
        \DB::table('Category_Feature_Type')->whereNotIn('category_id', $category_ids)->delete();
        
        if($category_ids){
            foreach($category_ids as $cid)
            {
                if(!Category_Feature_Type::where('category_id','=',$cid)->first()){
                    $c = new Category_Feature_Type();
                    $c->category_id = $cid;
                    $c->feature_type_id = $feature->id;
                    $c->save();
                }
            }
        }

       
        //return $cft;
        return redirect('feature/')->withSuccessMessage('Successfully Updated Data');
    }
    public function delete($id)
    {
        $data = Feature::find($id);
        $data->delete();
        
        \DB::table('Category_Feature_Type')->whereIn('feature_type_id', [$id])->delete();

        return back()->withSuccessMessage('Successfully Deleted Data');
    }
}
