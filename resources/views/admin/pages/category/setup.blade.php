@extends("admin.layouts.home")
@section("title","Add Category")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Category : SetUp</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Parent</label>
                            <Select name="parent_category_id" class="form-control">
                                <Option value="0" >Default</Option>
                                @foreach($data as $row)
                                    <Option value="{{$row->id}}" >  
                                        {{json_decode($row->name)->en}} :: 
                                        {{json_decode($row->name)->my}} ::
                                        {{json_decode($row->name)->ch}} 
                                    </Option>
                                @endforeach
                            </Select>
                        </div>
                        <div class="form-group">
                            <label for="name">Category Name in English *</label>
                            <input type="text" name="english" class="form-control" id="name" value="{{ old('english') }}" placeholder="Enter ...">
                            @if($errors->has('english'))
                                <span class="text-red">Please Enter Name</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Category Name in Myanmar *</label>
                            <input type="text" name="myanmar" class="form-control" id="name" value="{{ old('myanmar') }}" placeholder="Enter ...">
                            @if($errors->has('myanmar'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Category Name in Chinese *</label>
                            <input type="text" name="chinese" class="form-control" id="name" value="{{ old('chinese') }}" placeholder="Enter ...">
                            @if($errors->has('chinese'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
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
