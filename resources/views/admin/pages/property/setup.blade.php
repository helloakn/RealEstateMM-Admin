@extends("admin.layouts.home")
@section("title","Add Property Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Property : SetUp</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="address">address *</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" placeholder="Enter ...">
                            @if($errors->has('address'))
                                <span class="text-red">Please Enter Property Address</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="finished_status">finished_status *</label>
                            <input type="text" class="form-control" name="finished_status" value="{{ old('finished_status') }}" id="finished_status" placeholder="Enter ...">
                            @if($errors->has('finished_status'))
                                <span class="text-red">Please Enter </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="size">size *</label>
                            <input type="text" class="form-control" id="size" name="size" value="{{ old('size') }}" placeholder="Enter ...">
                            @if($errors->has('size'))
                                <span class="text-red">Please Enter Property Size</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="price">price *</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Enter ...">
                            @if($errors->has('price'))
                                <span class="text-red">Please Enter Property Price</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">bed_room *</label>
                            <input type="text" class="form-control" id="bed_room" name="bed_room" value="{{ old('bed_room')}}" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="single_bath_room">single_bath_room *</label>
                            <input type="text" class="form-control" id="single_bath_room" name="single_bath_room" value="{{old('single_bath_room')}}" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="master_bath_room">master_bath_room *</label>
                            <input type="text" class="form-control" id="master_bath_room" name="master_bath_room" value="{{old('master_bath_room')}}" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="advertiser">advertiser</label>
                            <input type="text" class="form-control" id="advertiser" name="advertiser" value="{{old('advertiser')}}" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <input type="text" class="form-control" id="status" name="status" value="{{old('status')}}" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="location">location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="lat">latitude</label>
                            <input type="integer" class="form-control" id="lat" name="lat" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="lng">longitude</label>
                            <input type="integer" class="form-control" id="lng" name="lng" placeholder="Enter ...">
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
