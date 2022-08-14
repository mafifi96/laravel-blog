@extends('admin.master')

@section("title" , "Posts")

@section("content")

@include("admin.inc.dialog")
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>

        <a href="/admin/post/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm "></i> Create Post</a>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted">All Posts</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Category</th>
                                <th scope="col">Author</th>
                                <th scope="col">Careated At</th>
                                <th scope="col">Last Update</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post)
                            <tr>
                                <td scope="row">{{($loop->index + 1)}}</td>
                                <td><a href="/admin/post/{{$post->slug}}">{{$post->title}}</a></td>
                                <td>{{$post->status}}</td>
                                <td><a href="/admin/category/{{$post->category->id}}"
                                        class="btn text-decoration-none">{{$post->category->name}}</a></td>
                                <td>{{$post->author->name}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/post/{{$post->id}}/edit" class="btn btn-info"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$post->id}}" class="btn btn-danger post_delete"><i
                                                class="fas fa-trash"></i></a>
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
