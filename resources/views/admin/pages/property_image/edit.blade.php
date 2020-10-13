@extends("admin.layouts.home")
@section("title","Edit Property Image Page")

<!-- Main content -->
@section("content")
    <div class="row">
        <div class="col-md-8 offset-2 my-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Property Image : Update</strong></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{ url('property_image/edits/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body no-gutters">
                        <div class="form-group">
                            <label for="type">Name *</label>
                            <input type="integer" id="type" name="type" class="form-control" value="{{ $data->type }}">
                            @if($errors->has('type'))
                                <span class="text-red">Please Enter Type</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Property Image *</label>
                            <input type="file" id="image" name="image" class="form-control" value="">
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

