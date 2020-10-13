@extends("admin.layouts.home")
@section("title","Add User Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>User : SetUp</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">User Name *</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter ...">
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
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter ...">
                            @if($errors->has('password'))
                                <span class="text-red">Password must be 5 characters</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone No *</label>
                            <input type="phone" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" placeholder="Enter ...">
                            @if($errors->has('phone'))
                                <span class="text-red">Enter Phone Number(09-********)</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address *</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" placeholder="Enter ...">
                            @if($errors->has('address'))
                                <span class="text-red">Enter Address</span>
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
