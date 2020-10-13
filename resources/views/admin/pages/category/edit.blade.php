@extends("admin.layouts.home")
@section("title","Edit Category")

<!-- Main content -->
@section("content")
    <div class="row">
        <div class="col-md-8 offset-2 my-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Category : Update</strong></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{ url('category/edits/'.$data->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body no-gutters">
                    <div class="form-group">
                            <label for="name">Parent</label>
                            <Select name="parent_category_id" class="form-control">
                                <Option value="0" >Default</Option>
                                @foreach($parentCategory as $row)
                                    <Option value="{{$row->id}}" {{$row->id==$data->parent_category_id?"selected":""}} >  
                                        {{json_decode($row->name)->en}} :: 
                                        {{json_decode($row->name)->my}} ::
                                        {{json_decode($row->name)->ch}} 
                                    </Option>
                                @endforeach
                            </Select>
                        </div>
                        <div class="form-group">
                            <label for="name">Category Name in English *</label>
                            <input type="text" id="name" name="english" class="form-control" value="{{ json_decode($data->name)->en }}">
                            @if($errors->has('english'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Category Name in Myanmar *</label>
                            <input type="text" id="name" name="myanmar" class="form-control" value="{{ json_decode($data->name)->my }}">
                            @if($errors->has('myanmar'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Category Name in Chinese *</label>
                            <input type="text" id="name" name="chinese" class="form-control" value="{{ json_decode($data->name)->ch }}">
                            @if($errors->has('chinese'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
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
