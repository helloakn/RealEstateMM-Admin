@extends("admin.layouts.home")
@section("title","CurrencyType")

<!-- Main content -->
@section('content')
    <div class="row no-gutters add">
        <a href="{{url('currency/setup')}}" class="btn btn-outline-primary my-4 language">Create</a>
        <!-- SEARCH FORM -->
        <form action="{{ url('currency/') }}" method="get" role="search" class="form-inline ml-3 my-2">
            @csrf
            <div class="input-group input-group-lg">
                <input type="search" name="name" class="form-control" value="{{ isset($name) ? $name : '' }}" placeholder="Search by Currency Name">
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
            <h3 class="card-title text-success"><strong>Currency : Listing</strong></h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 10%">
                        ID
                    </th>
                    <th style="width: 10%;">
                        Name in English
                    </th>
                    <th style="width: 10%">
                        Name in Myanmar
                    </th>
                    <th style="width: 10%">
                        Name in Chinese
                    </th>
                    <th style="width: 10%">
                        Unit in English
                    </th>
                    <th style="width: 10%">
                        Unit in Myanmar
                    </th>
                    <th style="width: 10%">
                        Unit in Chinese
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $currency)
                    <tr>
                        <td>
                            {{ $currency->id }}
                        </td>
                        <td>
                            {{ json_decode($currency->name)->en }}
                        </td>
                        <td>
                            {{ json_decode($currency->name)->my }}
                        </td>
                        <td>
                            {{ json_decode($currency->name)->ch }}
                        </td>
                        <td>
                            {{ json_decode($currency->unit)->en }}
                        </td>
                        <td>
                            {{ json_decode($currency->unit)->my }}
                        </td>
                        <td>
                            {{ json_decode($currency->unit)->ch }}
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-end">
                                <a class="btn btn-info btn-sm mr-1" href="{{ url('currency/edit/'.$currency->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="myFunction()" href="{{ url('currency/delete/'.$currency->id) }}">
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
