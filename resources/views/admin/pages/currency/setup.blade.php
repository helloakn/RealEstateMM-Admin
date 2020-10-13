@extends("admin.layouts.home")
@section("title","Add CurrencyType")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Currency : SetUp</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Currency Name in English *</label>
                            <input type="text" name="english" value="{{ old('english') }}" class="form-control" id="name" placeholder="Enter ...">
                            @if($errors->has('english'))
                               <span class="text-red">Please Enter Currency Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Currency Name in Myanmar *</label>
                            <input type="text" name="myanmar" value="{{ old('myanmar') }}" class="form-control" id="name" placeholder="Enter ...">
                            @if($errors->has('myanmar'))
                                <span class="text-red">Please Enter Currency Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Currency Name in Chinese *</label>
                            <input type="text" name="chinese" value="{{ old('chinese') }}" class="form-control" id="name" placeholder="Enter ...">
                            @if($errors->has('chinese'))
                                <span class="text-red">Please Enter Currency Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="unit">Currency Unit in English *</label>
                            <input type="text" name="uniten" value="{{ old('uniten') }}" class="form-control" id="unit" placeholder="Enter ...">
                            @if($errors->has('uniten'))
                                <span class="text-red">Please Enter Unit</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="unit">Currency Unit in Myanmar *</label>
                            <input type="text" name="unitmy" value="{{ old('unitmy') }}" class="form-control" id="unit" placeholder="Enter ...">
                            @if($errors->has('unitmy'))
                                <span class="text-red">Please Enter Unit</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="unit">Currency Unit in Chinese *</label>
                            <input type="text" name="unitch" value="{{ old('unitch') }}" class="form-control" id="unit" placeholder="Enter ...">
                            @if($errors->has('unitch'))
                                <span class="text-red">Please Enter Unit</span>
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


