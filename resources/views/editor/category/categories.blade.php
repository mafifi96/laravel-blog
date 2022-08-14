@extends('editor.master')

@section("title" , "Categories")

@section("content")


@include("editor.dialog")
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>

        @can('create' , 'App\\Models\Category')

        <a href="/editor/category/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm "></i> Create Category</a>

            @endcan
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted">All Categories</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Careated At</th>
                                <th scope="col">Last Update</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ ($loop->index + 1 )}}</th>

                                <td><a href="/editor/category/{{$category->id}}" class="btn text-decoration-none" @cannot('edit' ,$category)
                                    {{"disabled"}}
                                @endcannot>{{$category->name}}</a></td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('update' , $category)

                                        <a href="/editor/category/{{$category->id}}/edit" class="btn btn-sm btn-info mx-1"><i class="fas fa-edit"></i></a>

                                        @endcan

                                        @can('delete',$category)

                                        <button  data-id="{{$category->id}}" class=" btn btn-sm btn-danger category_delete"><i
                                            class="fas fa-trash"></i></button>
                                            @endcan
                                </div>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
