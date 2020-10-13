@extends("admin.layouts.home")
@section("title","Property Page")

@section('content')
    <div class="row no-gutters add">
        <a href="{{url('property/setup')}}" class="btn btn-outline-primary my-4 language">Create</a>
        <!-- SEARCH FORM -->
        <form action="{{ url('property/') }}" method="get" role="search" class="form-inline ml-3 my-2">
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-success"><strong>Property : Listing</strong></h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        Address
                    </th>
                    <th style="">
                        Size
                    </th>
                    <th style="...">
                        Price
                    </th>
                    <th style="...">
                        Bed_room
                    </th>
                    <th style="...">
                        Single_bath_room
                    </th>
                    <th style="...">
                        Master_bath_room
                    </th>
                    <th style="...">
                        Location
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $property)
                    <tr>
                        <td>
                            {{$property->address}}
                        </td>
                        <td>
                            <a>
                                {{$property->size}}
                            </a>
                        </td>
                        <td>
                            {{$property->price}}
                        </td>
                        <td>
                            {{$property->bed_room}}
                        </td>
                        <td>
                            {{$property->single_bath_room}}
                        </td>
                        <td>
                            {{$property->master_bath_room}}
                        </td>
                        <td>
                            {{$property->location}}
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-end">
                                <a class="btn btn-info btn-sm mr-2" href="{{ url('property/edit/'.$property->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="myFunction()" href="{{ url('property/delete/'.$property->id) }}">
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
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function myFunction() {
            if(!confirm("Are you confirm to delete!"))
                event.preventDefault();
        }
    </script>
@endsection
