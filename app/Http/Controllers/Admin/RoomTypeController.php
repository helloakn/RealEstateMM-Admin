<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Room_Type;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category_Room_Type;
class RoomTypeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        if(session('success_message'))
        {
            Alert::success('Success!',session('success_message'));
        }
        $data = Room_Type::select('id','name')->search($name)->paginate(5);
        return view('admin.pages.room_type.listing',compact('data','name'));
    }
    public function show()
    {
        $category = Category::select('Category.id as id','Category.name as name')
        ->where('parent_category_id','=','0')
        ->get();
        $roomtype = Room_Type::select('id','name')
        ->where('parent_room_id',0)
        ->get();
        $data = array(
            'category' => $category,
            'roomType' => $roomtype
        );
        //return view('admin.pages.feature.setup',compact('data'));
       //dd($data);Category_Room_Type
        return view('admin.pages.room_type.setup')->with($data);
    }
    public function create(Request $request)
    {
        //isParent == 0 ? parent(Category) : child(Room)Category_Room_Type

        $fields = $request->all();
        //return $fields;
        $validator = Validator::make($request->all(),[
           'english' =>'required',
            'myanmar' => 'required',
            'chinese' => 'required'
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $roomType = new Room_Type();
        $roomType->name = json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]);
        $isParent = $request->get('isParent');
        //1 child room
        //0 parent category
        $roomType->parent_room_id = $isParent=="1"?$request->get('parent_id'):0;
        $roomType->save();
        if($roomType->parent_room_id==0){
            $categoryIds = $request->get('category_id');
            if($categoryIds){
                foreach($categoryIds as $cid){
                    $crt = new Category_Room_Type();
                    $crt->room_type_id = $roomType->id;
                    $crt->category_id = $cid;
                    $crt->save();
                }
            }
        }
        return redirect('room_type/')->withSuccessMessage('Successfully Inserted Data');
    }
    public function edit($id)
    {
        if(session('error_message'))
        {
            Alert::error('Error!', session('error_message'));
        }
        $roomtype = Room_Type::find($id);
        //  dd($roomtype);
        if(!empty($roomtype))
        {
            $categoryexist=Category_Room_Type::where('room_type_id','=',$roomtype->id)
            ->first();
           
            if(!empty($categoryexist)){
            $category = Category::select('Category.id as id','Category.name as name')
            //$category = Category::select('Category.id as id')
            ->where('parent_category_id','=','0')
            ->get();
            $scategory = Category_Room_Type::select(\DB::raw('group_concat(category_id) as cid'))
            ->where('room_type_id',$roomtype->id)
            ->first();
            $roomtypelist = Room_Type::select('id','name')
            ->where('parent_room_id',0)
            ->get();
            $categorylist = Category::select('Category.id as id','Category.name as name')
            ->where('parent_category_id','=','0')
            ->get();
            $data = array(
                'data' => $roomtype,
                'category' => $category,
                'selectedCategory_ids' => explode(",",$scategory->cid),
                'rooms' =>  [],
                'categorylist' =>$categorylist,
                'roomtypelist'=>$roomtypelist,
                'selectedRoom_id'=> [],
                'parent'=>'1'
                
            );

            }
            else{
                $roomtypelist = Room_Type::select('id','name')
                ->where('parent_room_id',0)
                ->get();
                $categorylist = Category::select('Category.id as id','Category.name as name')
                ->where('parent_category_id','=','0')
                ->get();
                $roomtypelist = Room_Type::select('id','name')
                ->where('parent_room_id',0)
                ->get();
                $data = array(
                    'data' => $roomtype,
                    'category' => [],
                    'categorylist' =>  $categorylist,
                    'roomtypelist' => $roomtypelist,
                    'selectedCategory_ids' =>[],
                    'rooms' =>   $roomtypelist,
                    'child' =>'1',
                    
                );
            
             
            }
            
            //return explode(",",$scategory->cid);
           
           //dd($roomtype);
            return view('admin.pages.room_type.edit')->with($data);
            
        }
        else{
         return back()->withErrorMessage('No Data Found');
        }
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $validator = Validator::make($request->all(),[
            'english' =>'required',
            'myanmar' => 'required',
            'chinese' => 'required'
        ]);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $room = Room_Type::find($id);
        $isParent = $request->get('isParent');
        $room->parent_room_id = $isParent=="1"?$request->get('room_id'):0;
        //dd($room->parent_room_id);
     
        if($room){
            $room->name = json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]);
            $room->save();
        }
        if($room->parent_room_id==0){
            $roomid=Category_Room_Type::select('Category_Room_Type.id')
            ->where('room_type_id','=',$room->id)
            ->first();
            if(!$roomid){
                $room->name = json_encode(['en'=>$request->english, 'my'=>$request->myanmar, 'ch'=>$request->chinese]);
                $room->save();
                $category_ids = $request->get('category_id');
                if($category_ids){
                    foreach($category_ids as $cid)
                    {       
                        $c = new Category_Room_Type();
                        $c->category_id = $cid;
                        $c->room_type_id = $room->id;
                        $c->save();
                       
                    }
                }
            }
            else{
                $category_ids = $request->get('category_id');
            //dd($category_ids);
                \DB::table('Category_Room_Type')->whereNotIn('category_id', $category_ids)->delete();
            
            if($category_ids){
                foreach($category_ids as $cid)
                {
                    if(!Category_Room_Type::where('category_id','=',$cid)->first()){
                        $c = new Category_Room_Type();
                        $c->category_id = $cid;
                        $c->room_type_id = $room->id;
                        $c->save();
                    }
                }
            }

            }
            
        }
        return redirect('room_type/')->withSuccessMessage("Successfully Updated Data");
    }
    public function delete($id)
    {
        $data = Room_Type::find($id);
        $data->delete();
        
        \DB::table('Category_Room_Type')->whereIn('room_type_id', [$id])->delete();

        return back()->withSuccessMessage('Successfully Deleted Data');
        // $data = Room_Type::find($id);
        // $data->delete();
        // return back()->withSuccessMessage('Succcessfully Deleted Data');
    }
}
