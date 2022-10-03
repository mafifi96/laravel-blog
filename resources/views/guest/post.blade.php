@extends('master')

@section("title" , "Post | " . $post->title)

@section("content")

<div class="col-md-9 col-lg-9 col-sm-12 ">

    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="d-flex justify-content-between">
                    <h3 class="h3">{{ $post->title }}</h3>
                    @can('delete' , $post)

                    <form action="/post/{{$post->id}}/delete" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger d-block shadow-sm"><i
                                class="fas fa-trash fa-sm"></i></button>
                    </form>
                    @endcan
                </div>
                <div class="post-cover" style="height: 50vh; width:100%;overflow:hidden">
                    <img class="img-fluid" src="{{ asset('uploads/'.$post->cover) }}" alt="{{ $post->title }}" title="{{ $post->title }}">
                </div>
                <div class="body mt-3 text-justify">
                    {!! $post->body !!}
                    <hr class="mt-2 mb-2">
                    <p class="mt-3"> Published At : <strong>@php
                            $date = new \Illuminate\Support\Carbon;
                            echo $date->diffForHumans($post->created_at);

                            @endphp</strong></p>
                    <p class="mt-3"> Category : <strong>{{ $post->category->name }}</strong></p>
                    <div class="author mt-3">
                        <p> Author: <strong>{{ $post->author->name }} </strong></p>
                    </div>
                </div>
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                    <small>Tags:</small>
                    @php

                    $tags = json_decode($post->tags);

                    @endphp
                    @foreach($tags as $tag )
                    <a href="/tag/{{ $tag }}" class="btn btn-sm btn-shadow-sm btn-success mx-1">{{ $tag }}</a>
                    @endforeach
                </div>
                <div class="mt-2 mb-2 shadow-sm p-3 comments">
                    @if($post->comments->count())
                    <h4>All Comments <strong>{{$post->comments->count()}}</strong></h4>
                    @endif
                    <ul class="list list-unstyled">

                        @forelse ($post->comments as $comment)
                        <li><strong>{{$comment->user->name }} </strong> : <i>{{$comment->comment}}</i></li>
                        @empty
                        <li class="list-item"><small>No Comments</small></li>
                        @endforelse
                    </ul>
                </div>
                @if($post->comment_status == "opened")

                @auth
                <div class="card">
                    <div class="card-header">
                        <h4 class="h4 text-capitalize">add comment</h4>
                        @if(session()->has('commentadded'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session()->get('commentadded') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="/post/{{ $post->id }}/comment/store" method="post">
                            @csrf

                            <div class="form-group">
                                <textarea style="height: 7rem" class="form-control form-control-user" name="comment"
                                    maxlength="150" placeholder="Comment..." required></textarea>
                            </div>
                            <div class="form-group">
                                <button onclick="this.disabled='disabled';this.closest('form').submit();" type="submit"
                                    class="btn btn-primary btn-control-user form-control">
                                    Send
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
                @endauth
                @guest
                <p class="alert alert-sm alert-info"><a href="/login">Login</a> Or <a href="/register">Register</a> To
                    Comment In This Post</p>
                @endguest

                @elseif($post->comment_status == "closed")
                <hr class="mt-2 mb-2">
                <p class="mt-4 text-center"><strong class="alert alert-danger">Commenting in this post is
                        closed!</strong></p>
                @endif
            </div>
        </div>

    </div>
</div>
</div>
</main>

@endsection
