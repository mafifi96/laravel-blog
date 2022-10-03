@extends('editor.master')

@section("title" , "Post | " . $post->title)

@section("content")


@include("editor.dialog")
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        {{-- <h1 class="h3 mb-0 text-gray-800">Posts</h1> --}}
@can('create' , 'App\\Models\Post')

<a href="/editor/post/create" class="btn btn-sm btn-primary shadow-sm mx-2"><i class="fas fa-plus fa-sm "></i>
    Create Post</a>
    @endcan
    @can('update' , $post)

    <a href="/editor/post/{{$post->id}}/edit" class="btn btn-info btn-sm shadow-sm"><i class="fas fa-edit fa-sm"></i>
        Edit</a>
        @endcan


    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">
            <h3 class="h3">{{$post->title}}</h3>

            <div class="post-cover" style="height: 400px; width:100%;overflow:hidden">
                <img class="img-thumbnail" style="display: block; width:100%;height:100%"
                    src="{{asset('uploads/'.$post->cover)}}" alt="{{$post->title}}" title="{{$post->title}}">
            </div>
            <div class="body mt-3">
                {!! $post->body !!}
                <p class="mt-3"> Category : <strong>{{$post->category->name}}</strong></p>
                <div class="author mt-3">
                    <p> Author: <strong>{{$post->author->name}} </strong></p>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-center mb-4">
                <small>Tags:</small>
                @php

                $tags = json_decode($post->tags);

                @endphp
                @foreach ($tags as $tag )
                <a href="/tag/{{$tag}}" class="btn btn-sm btn-shadow-sm btn-success mx-1">{{$tag}}</a>
                @endforeach
            </div>
        </div>


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection
