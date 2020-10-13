@extends("admin.layouts.home")
@section("title","Category")

<!-- Main content -->
@section('content')
    <div class="row no-gutters add">
        <a href="{{url('category/setup')}}" class="btn btn-outline-primary my-4 language">Create</a>
        <!-- SEARCH FORM -->
        <form action="{{ url('category/') }}" method="get" role="search" class="form-inline ml-3 my-2">
            @csrf
            <div class="input-group input-group-lg">
                <input type="search" name="name" class="form-control" >
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
            <h3 class="card-title text-success"><strong>Category : Listing</strong></h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th colspan="3"  style="background-color:#e1ebf5; text-align:center;">
                        Name
                    </th>
                    <th colspan="3" style="background-color:#eaebec; text-align:center;">
                        Parent Name
                    </th>
                    <th style="background-color:#fff; text-align:center;">
                        Action
                    </th>
                </tr>
                <tr>
                    <th>
                        ID
                    </th>
                    <th style="text-align:center;background-color:#e1ebf5">
                       English
                    </th>
                    <th style="text-align:center;background-color:#e1ebf5">
                        Myanmar
                    </th>
                    <th style="text-align:center;background-color:#e1ebf5">
                        Chinese
                    </th>
                    <th style="text-align:center;background-color:#eaebec">
                        English
                    </th>
                    <th style="text-align:center;background-color:#eaebec">
                        Myanmar
                    </th>
                    <th style="text-align:center;background-color:#eaebec">
                        Chinese
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $category)
                    <tr>
                        <td>
                            {{$category->id}}
                        </td>
                        <td>
                            
                            {{ json_decode($category->name)->en }}
                           
                        </td>
                        <td>
                          
                                {{ json_decode($category->name)->my}}
                           
                        </td>
                        <td>
                        
                               {{ json_decode($category->name)->ch}}
                        
                        </td>
                        <td>
                            
                            {{ json_decode($category->parentName)->en }}
                           
                        </td>
                        <td>
                          
                                {{ json_decode($category->parentName)->my}}
                           
                        </td>
                        <td>
                        
                               {{ json_decode($category->parentName)->ch}}
                        
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-end">
                                <a class="btn btn-info btn-sm mr-2" href="{{ url('category/edit/'.$category->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="myFunction()" href="{{ url('category/delete/'.$category->id) }}">
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
    <!-- jQuery -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function myFunction() {
            if(!confirm("Are you confirm to delete!"))
                event.preventDefault();
        }
    </script>
@endsection
