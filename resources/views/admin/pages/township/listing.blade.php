@extends("admin.layouts.home")
@section("title","Township Page")

<!-- Main content -->
@section('content')
    <div class="row no-gutters add">
        <a href="{{url('township/setup')}}" class="btn btn-outline-primary my-4 language">Create</a>
        <!-- SEARCH FORM -->
        <form action="{{ url('township/') }}" method="get" role="search" class="form-inline ml-3 my-2">
            @csrf
            <div class="input-group input-group-lg">
                <input type="search" name="name" class="form-control" value="{{ isset($name) ? $name : '' }}" placeholder="Search by Township Name">
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
            <h3 class="card-title text-success"><strong>Township : Listing</strong></h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 10%">
                        Name in English
                    </th>
                    <th style="width: 8%">
                        Name in Myanmar
                    </th>
                    <th style="width: 10%">
                        Name in Chinese
                    </th>
                    <th style="width: 10%">
                        Latitude
                    </th>
                    <th style="width: 10%">
                        Longitude
                    </th>
                    <th style="width: 15%">
                        State / Division in English
                    </th>
                    <th style="width: 20%">
                        State / Division in Myanmar
                    </th>
                    <th style="width: 20%">
                        State / Division in Chinese
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $tws)
                    <tr>
                        <td>
                            {{ json_decode($tws->name)->en }}
                        </td>
                        <td>
                            {{ json_decode($tws->name)->my }}
                        </td>
                        <td>
                            {{ json_decode($tws->name)->ch }}
                        </td>
                        <td>
                            <a>
                                {{$tws->lat}}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$tws->lag}}
                            </a>
                        </td>
                        <td>
                            @foreach($state as $sta)
                                @if($tws->state_division_id == $sta->id)
                                    <a>{{ json_decode($sta->name)->en }}</a>
                                    <td><a>{{ json_decode($sta->name)->my }}</a></td>
                                    <td><a>{{ json_decode($sta->name)->ch }}</a></td>
                                @endif
                            @endforeach
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-end">
                                <a class="btn btn-info btn-sm mr-2" href="{{ url('township/edit/'.$tws->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="myFunction()" href="{{ url('township/delete/'.$tws->id) }}">
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
@endsection

