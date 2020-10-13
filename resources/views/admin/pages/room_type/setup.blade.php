@extends("admin.layouts.home")
@section("title","Add Room Type")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Room_Type : SetUp</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Room_Type Name in English *</label>
                            <input type="text" name="english" class="form-control" id="name" value="{{ old('english') }}" placeholder="Enter ...">
                            @if($errors->has('english'))
                                <sapn class="text-red">Please Enter Room Name</sapn>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Room_Type Name in Myanmar *</label>
                            <input type="text" name="myanmar" class="form-control" id="name" value="{{ old('myanmar') }}" placeholder="Enter ...">
                            @if($errors->has('myanmar'))
                                <sapn class="text-red">Please Enter Room Name</sapn>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Room_Type Name in Chinese *</label>
                            <input type="text" name="chinese" class="form-control" id="name" value="{{ old('chinese') }}" placeholder="Enter ...">
                            @if($errors->has('chinese'))
                                <sapn class="text-red">Please Enter Room Name</sapn>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Parent Or Child</label>
                            <Select name="isParent" class="form-control" id="isParent">
                                <Option value="0" >Parent</Option>
                                <Option value="1" >Child</Option>
                            </Select>
                        </div>
                        <div class="form-group" id='divParent'>
                        @foreach($category as $row)
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox"  value="{{$row->id}}" name="category_id[]" class="category">
                                        {{json_decode($row->name)->en}} :: 
                                        {{json_decode($row->name)->my}} ::
                                        {{json_decode($row->name)->ch}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                        <div class="form-group" id='divChild'>
                        <select class='form-control' name='parent_id'>
                            @foreach($roomType as $row)
                            <option value="{{$row->id}}">
                            {{json_decode($row->name)->en}} :: 
                                            {{json_decode($row->name)->my}} ::
                                            {{json_decode($row->name)->ch}}
                                            </option>
                                
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{url()->previous()}}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <!-- /.content -->
@endsection
@section('jsScript')
<script>

$(document).ready(function() {
    $('#divParent').show();
            $('#divChild').hide();
    $("#isParent").change(function(e){
                //0 parent ( show category ) // false
        //1 child  (show room) // true
        var pdid = parseInt($(this).val());
        //alert(pdid);
        if(pdid){
            $('#divChild').show();
            $('#divParent').hide();
        }
        else{
            $('#divParent').show();
            $('#divChild').hide();
        }

    });
});
</script>
@endsection
