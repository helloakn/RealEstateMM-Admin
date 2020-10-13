@extends("admin.layouts.home")
@section("title","Admin Page")

<!-- Main content -->
@section('content')
<div class="row no-gutters add">
    <a href="{{url('admin/setup')}}" class="btn btn-outline-primary my-4 language">Create</a>
    <!-- SEARCH FORM -->
    <form action="{{ url('admin/') }}" method="get" role="search" class="form-inline ml-3 my-2">
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
        <h3 class="card-title text-success"><strong>Account : Listing</strong></h3>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
            <tr class="">
                <th style="width: 1%">
                    Type
                </th>
                <th style="width: 20%">
                    Name
                </th>
                <th style="width: 20%">
                    Email
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
            <tr class="">
                <td>
                    {{$item->type}}
                </td>
                <td>
                    {{$item->name}}
                </td>
                <td>
                    {{$item->email}}
                </td>
                <td>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <img alt="" class="table-avatar" src="{{ asset('/admin_image/'.$item->profile_image) }}">
                        </li>
                    </ul>
                </td>
                <td class="project-actions text-right">
                    <div class="row justify-content-end">
                        <a class="btn btn-info btn-sm mr-1" href="{{ url('admin/edit/'. $item->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="myFunction()" href="{{ url('admin/delete/'.$item->id) }}">
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
<!-- jQuery -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function myFunction() {
        if(!confirm("Are you confirm to delete!"))
            event.preventDefault();
    }
</script>

@endsection

