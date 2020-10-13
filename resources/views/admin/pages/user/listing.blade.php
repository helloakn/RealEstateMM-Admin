@extends("admin.layouts.home")
@section("title","User Page")

<!-- Main content -->
@section('content')
    <div class="row no-gutters add">
        <a href="{{url('user/setup')}}" class="btn btn-outline-primary my-4 language">Create</a>
        <!-- SEARCH FORM -->
        <form action="{{ url('user/') }}" method="get" role="search" class="form-inline ml-3 my-2">
            @csrf
            <div class="input-group input-group-lg">
                <input type="search" name="name" class="form-control" value="{{ isset($name) ? $name : '' }}" placeholder="Search by Name or Email">
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
            <h3 class="card-title text-success"><strong>User : Listing</strong></h3>
        </div>
        <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            Name
                        </th>
                        <th style="width: 20%">
                            Email
                        </th>
                        <th style="width: 20%">
                            Phone No
                        </th>
                        <th style="width: 20%">
                            Address
                        </th>
                        <th style="width: 20%">
                            Profile Image
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                <a>
                                    {{$user->email}}
                                </a>
                            </td>
                            <td>
                                <a>
                                    {{$user->phone}}
                                </a>
                            </td>
                           <td>
                                <a>
                                    {{$user->address}}
                                </a>
                            </td>
                           <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="" class="table-avatar" src="{{ asset('/user_image/'.$user->profile_image) }}">
                                    </li>
                                </ul>
                            </td>
                            <td class="project-actions text-right">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-info btn-sm mr-2" href="{{ url('user/edit/'.$user->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" onclick="myFunction()" href="{{ url('user/delete/'.$user->id) }}">
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
    {{ $data->links() }}

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function myFunction() {
            if(!confirm("Are you confirm to delete!"))
                event.preventDefault();
        }
    </script>
@endsection

