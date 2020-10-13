@extends("admin.layouts.home")
@section("title","Edit Township Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <div class="col-md-8 offset-2 my-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Township : Update</strong></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{ url('township/edits/'.$data->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body no-gutters">
                        <div class="form-group">
                            <label for="name">Township Name in English *</label>
                            <input type="text" name="english" value="{{ json_decode($data->name)->en }}" class="form-control" id="name" placeholder="Enter ...">
                            @if($errors->has('english'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Township Name *</label>
                            <input type="text" name="myanmar" value="{{ json_decode($data->name)->my }}" class="form-control" id="name" placeholder="Enter ...">
                            @if($errors->has('myanmar'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Township Name *</label>
                            <input type="text" name="chinese" value="{{ json_decode($data->name)->ch }}" class="form-control" id="name" placeholder="Enter ...">
                            @if($errors->has('chinese'))
                                <span class="text-red">Please Enter Name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="lat">Latitude *</label>
                            <input type="integer" name="lat" value="{{ $data->lat }}" class="form-control" id="lat" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label for="lng">Longitude *</label>
                            <input type="integer" name="lag" value="{{ $data->lag }}" class="form-control" id="lng" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label for="stdID">State / Division *</label>
                            <select name="stdID" id="stdID" class="form-control">
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}" {{ $data->state_division_id == $state->id ? 'selected' : '' }}>{{ json_decode($state->name)->en }}--{{ json_decode($state->name)->my }}--{{ json_decode($state->name)->ch }}</option>
                                @endforeach
                            </select>
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
