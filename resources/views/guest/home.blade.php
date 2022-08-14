@extends('master')

@section("title" , "Blog")

@section("content")

<div class="col-md-9 col-lg-9 col-sm-12 ">
    
        <div class="container">
            <div class="row">

                <!-- Products -->
                <div class="col-md-12">
                    <div class="row">

                        @forelse ($posts as $post)
                        <div class="col-md-12 col-sm-12 col-lg-6 mb-3 p-1  ">

                            <div class="card shadow-sm">
                                <a href="/post/{{$post->slug}}">
                                    <img src="{{asset("uploads/".$post->cover)}}" style="height:40vh;"
                                        class="img-fluid card-img-top" alt="placeholder">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="/post/{{$post->slug}}"
                                            class="btn text-left">{{$post->title}}</a></h5>
                                    <div class="card-footer">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>{{$post->excerpt}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-capitalize" href="/post/{{$post->slug}}">see more</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        @empty
                        <h6>No More posts</h6>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="links">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</main>



@endsection
