@extends("admin.layouts.home")
@section("title","Add Property Image Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Property Image : SetUp</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="type">Property Type *</label>
                            <input type="integer" name="type" class="form-control" id="type" value="{{ old('type') }}" placeholder="Enter ...">
                            @if($errors->has('type'))
                                <span class="text-red">Please Enter Type</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Property Image *</label>
                            <input type="file" name="image" class="form-control" id="image">
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

