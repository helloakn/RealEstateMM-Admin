@extends("admin.layouts.home")
@section("title","Edit User Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <div class="col-md-8 offset-2 my-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>User Account : Update</strong></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{ url('user/edits/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body no-gutters">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}">
                            @if($errors->has('name'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $data->email }}">
                            @if($errors->has('email'))
                                <span class="text-red">Please Enter Email Address</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="text" id="password" name="password" class="form-control" value="{{ $data->password }}">
                            @if($errors->has('password'))
                                <span class="text-red">Password must be 5 characters</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone No *</label>
                            <input type="phone" id="phone" name="phone" class="form-control" value="{{ $data->phone }}">
                            @if($errors->has('phone'))
                                <span class="text-red">Enter Phone Number(09-********)</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address *</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $data->address }}">
                            @if($errors->has('address'))
                                <span class="text-red">Enter Address</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="file">Profile Image *</label>
                            <input type="file" id="file" name="file" class="form-control" value="">
                        </div>
                        <div class="col-12">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
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

