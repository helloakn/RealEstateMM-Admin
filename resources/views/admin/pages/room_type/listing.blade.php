@extends("admin.layouts.home")
@section("title","Room_Type")

<!-- Main content -->
@section('content')
    <div class="row no-gutters add">
        <a href="{{url('room_type/setup')}}" class="btn btn-outline-primary my-4 language">Create</a>
        <!-- SEARCH FORM -->
        <form action="{{ url('room_type/') }}" method="get" role="search" class="form-inline ml-3 my-2">
            @csrf
            <div class="input-group input-group-lg">
                <input type="search" name="name" class="form-control" value="{{ isset($name) ? $name : '' }}" placeholder="Search by Category Name">
                <div class="input-group-append">
                    <button class="btn btn-default" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-success"><strong>Room_Type : Listing</strong></h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        ID
                    </th>
                    <th style="width: 20%">
                        Name in English
                    </th>
                    <th style="width: 20%">
                        Name in Myanmar
                    </th>
                    <th style="width: 20%">
                        Name in Chinese
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $room)
                    <tr>
                        <td>
                            {{$room->id}}
                        </td>
                        <td>
                            {{ json_decode($room->name)->en }}
                        </td>
                        <td>
                            {{ json_decode($room->name)->my }}
                        </td>
                        <td>
                            {{ json_decode($room->name)->ch }}
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-end">
                                <a class="btn btn-info btn-sm mr-2" href="{{ url('room_type/edit/'.$room->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="myFunction()" href="{{ url('room_type/delete/'.$room->id) }}">
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
    {{ $data->appends(['name' => $name])->links() }}
    <!-- jQuery -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function myFunction() {
            if(!confirm("Are you confirm to delete!"))
                event.preventDefault();
        }
    </script>
@endsection
