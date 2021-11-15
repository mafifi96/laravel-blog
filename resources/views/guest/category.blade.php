@extends('master')

@section("title" , "Blog | ". $category->name )

@section("content")

    <div class="content" style="width:83%;float:right;">
    <div class="container">
        <div class="row">


            <!-- Products -->
            <div class="col-md-12">
                <div class="row">

                    @forelse ($category->posts as $post)
                    <div class="col-md-4 px-1 shadow">

                        <div class="card">
                        <a href="/post/{{$post->slug}}">
                        <img src="{{asset("uploads/".$post->cover)}}" style="height:300px;" class="img-thumbnail card-img-top"
                                alt="placeholder">
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
                                                <a class="text-capitalize" href="/post/{{$post->slug}}" >see more</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    @empty
                    <h6>No posts for {{$category->name}}</h6>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
</main>



@endsection
