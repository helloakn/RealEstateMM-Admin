@extends("admin.layouts.home")
@section("title","Edit Room_Type")

<!-- Main content -->
@section("content")
<div class="row">
    <div class="col-md-8 offset-2 my-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><strong>Room_Type : Update</strong></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <form action="{{ url('room_type/edits/'.$data->id) }}" method="post">
                {{ csrf_field() }}
                <div class="card-body no-gutters">
                    <div class="form-group">
                        <label for="name">Room Name in English *</label>
                        <input type="text" id="name" name="english" class="form-control"
                            value="{{ json_decode($data->name)->en }}">
                        @if($errors->has('english'))
                        <span class="text-red">Please Enter Room Name</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Room Name in Myanmar *</label>
                        <input type="text" id="name" name="myanmar" class="form-control"
                            value="{{ json_decode($data->name)->my }}">
                        @if($errors->has('myanmar'))
                        <span class="text-red">Please Enter Room Name</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Room Name in Chinese *</label>
                        <input type="text" id="name" name="chinese" class="form-control"
                            value="{{ json_decode($data->name)->ch }}">
                        @if($errors->has('chinese'))
                        <span class="text-red">Please Enter Room Name</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Parent Or Child</label>
                        <Select name="isParent" class="form-control" id="isParent">
                            <Option value="0"  {{$category !=[]?"selected":""}}>Parent</Option>
                            <Option value="1"  {{$rooms !=[]?"selected":""}} >Child</Option>
                        </Select>
                    </div>
                    @if($category !=[])
                    <div class="form-group" id='divParent'>
                        @foreach($category as $row)
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" value="{{$row->id}}" name="category_id[]" class="features"
                                    {{ in_array($row->id,$selectedCategory_ids)?'checked':''}}>
                                {{json_decode($row->name)->en}} ::
                                {{json_decode($row->name)->my}} ::
                                {{json_decode($row->name)->ch}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group" id='divChildList'>
                        @if($roomtypelist !=[])
                        <select class='form-control' name='room_id'>
                            @foreach($roomtypelist as $row)
                            <option value="{{$row->id}}">
                            {{json_decode($row->name)->en}} :: 
                                            {{json_decode($row->name)->my}} ::
                                            {{json_decode($row->name)->ch}}
                                            </option>
                                
                            @endforeach
                        </select>
                        @endif
                    </div>
                   
                    @if($rooms !=[])
                    <div class="form-group" id='divChild'>
                    <div class="form-group">
                        <Select name="room_id" class="form-control">
                            @foreach($rooms as $row)
                            <Option value="{{$row->id}}" {{$row->id==$data->parent_room_id?"selected":""}} >  
                                {{json_decode($row->name)->en}} ::
                                {{json_decode($row->name)->my}} ::
                                {{json_decode($row->name)->ch}}
                            </Option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    @endif
                    @if($categorylist !=[])
                    <div class="form-group" id='divParentList'>
                        @foreach($categorylist as $row)
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" value="{{$row->id}}" name="category_id[]" class="features"
                                    {{ in_array($row->id,$selectedCategory_ids)?'checked':''}}>
                                {{json_decode($row->name)->en}} ::
                                {{json_decode($row->name)->my}} ::
                                {{json_decode($row->name)->ch}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <div class="col-12">
                        <a href="{{url()->previous()}}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" name="submit" value="Save Changes" class="btn btn-success">
                    </div>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
@section('jsScript')
<script>

$(document).ready(function() {
    $('#divParentList').hide();
    $('#divChildList').hide();
        
    $("#isParent").change(function(e){
       
                //0 parent ( show category ) // false
        //1 child  (show room) // true
        var pdid = parseInt($(this).val());
        //alert(pdid);
        if(pdid){
            $('#divParent').hide();
            $('#divChildList').show();
            $('#divParentList').hide();
           
        }
        else{
            $('#divChild').hide();
            $('#divParentList').show();
            $('#divChildList').hide();
        }

    });
   
});
</script>
@endsection