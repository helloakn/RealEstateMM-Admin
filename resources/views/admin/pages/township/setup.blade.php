@extends("admin.layouts.home")
@section("title","Add Township Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 offset-2 my-5">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Township : SetUp</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Township Name in English *</label>
                            <input type="text" name="english" class="form-control" id="name" value="{{ old('english') }}" placeholder="Enter ...">
                            @if($errors->has('english'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Township Name in Myanmar *</label>
                            <input type="text" name="myanmar" class="form-control" id="name" value="{{ old('myanmar') }}" placeholder="Enter ...">
                            @if($errors->has('myanmar'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Township Name in Chinese *</label>
                            <input type="text" name="chinese" class="form-control" id="name" value="{{ old('chinese') }}" placeholder="Enter ...">
                            @if($errors->has('chinese'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="stdID">State / Division *</label>
                            <select name="stdID" id="stdID" class="form-control" required>
                                <option value="">--- select state and division ---</option>
                                @foreach($state as $sta)
                                    <option value="{{ $sta->id }}">{{ json_decode($sta->name)->en }}--{{ json_decode($sta->name)->my }}--{{ json_decode($sta->name)->ch }}</option>
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
