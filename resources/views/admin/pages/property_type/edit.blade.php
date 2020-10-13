@extends("admin.layouts.home")
@section("title","Edit Property Type Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <div class="col-md-8 offset-2 my-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Property Type : Update</strong></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{ url('property_type/edits/'.$data->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body no-gutters">
                        <div class="form-group">
                            <label for="name">Property Type Name *</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}">
                            @if($errors->has('name'))
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
