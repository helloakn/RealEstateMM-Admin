@extends("admin.layouts.home")
@section("title","Add Slider")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Slider : SetUp</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Slider Name *</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter ...">
                            @if($errors->has('name'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Description *</label>
                            <input type="text" name="description" class="form-control" id="name" value="{{old('description')}}" placeholder="Enter ...">
                            @if($errors->has('description'))
                                <span class="text-red">Please Enter Description</span>
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
