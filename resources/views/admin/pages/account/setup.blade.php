@extends("admin.layouts.home")
@section("title","Admin Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Account : Setup</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="type">Type *</label>
                            <input type="integer" name="type" value="{{ old('type') }}" class="form-control" id="type" placeholder="Enter ...">
                            @if($errors->has('type'))
                                <span class="text-red">Please Enter Type</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name" class="form-control" id="name"  value="{{ old('name') }}" placeholder="Enter ...">
                            @if($errors->has('name'))
                                <span class="text-red">Please Enter Name</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter ...">
                            @if($errors->has('email'))
                                <span class="text-red">Please Enter Email Address</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" name="password" class="form-control" id="password" value="" placeholder="Enter ...">
                            @if($errors->has('password'))
                                <span class="text-red">Password must be 5 characters</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="file">Profile Image *</label>
                            <input type="file" name="file" class="form-control" id="file" placeholder="Enter ...">
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
