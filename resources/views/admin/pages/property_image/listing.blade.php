@extends("admin.layouts.home")
@section("title","Property Image Page")

<!-- Main content -->
@section('content')
    <div class="row no-gutters add">
        <a href="{{url('property_image/setup')}}" class="btn btn-outline-primary my-4 language">Create</a>
        <!-- SEARCH FORM
        <form action="" method="get" role="search" class="form-inline ml-3 my-2">
            @csrf
            <div class="input-group input-group-lg">
                <input type="search" name="name" class="form-control" value="{{ isset($name) ? $name : '' }}" placeholder="Search by Category Name">
                <div class="input-group-append">
                    <button class="btn btn-default" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form> -->
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-success"><strong>Property Image : Listing</strong></h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: auto">
                        Type
                    </th>
                    <th style="width: auto">
                        Image
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $type)
                    <tr class="table w-25">
                        @if($type->type == 1)
                        <td>
                            Cover Image
                        </td>
                        @else
                            <td>
                                Profile Image
                            </td>
                        @endif
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="" class="table-avatar" src="{{ asset('/propertyPic/'.$type->image) }}">
                                </li>
                            </ul>
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-end">
                                <a class="btn btn-info btn-sm mr-2" href="{{ url('property_image/edit/'.$type->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="myFunction()" href="{{ url('property_image/delete/'.$type->id) }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- jQuery -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function myFunction() {
            if(!confirm("Are you confirm to delete!"))
                event.preventDefault();
        }
    </script>
@endsection

