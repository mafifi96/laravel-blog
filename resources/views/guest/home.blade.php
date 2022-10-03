@extends('master')

@section("title" , "Blog")

@section("content")

<div class="col-md-12 col-lg-12 col-sm-12 mb-5">
<div class="container">
<div class="row justify-content-center">

    <div  id="carouselExampleCaptions" class="carousel carousel-dark slide carousel-fade responsive" data-bs-ride="carousel">

        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>


        </div>
        <div class="carousel-inner " >

            @foreach ($slider as $slide)

            <div class="carousel-item {{($loop->index == 0) ? 'active' : ''}} " style="height: 300px" >


                        <img src="{{asset("uploads/".$slide->cover)}}" class="d-block w-100" alt="placeholder">

                <div class="carousel-caption d-md-block">
                    <a class="text-decoration-none text-secondary" href="/post/{{$slide->slug}}">

                <h5>{{$slide->title}}</h5>
                <p>{{substr($slide->excerpt ,0 ,40)."..."}}</p>
                    </a>
              </div>
            </div>

            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

</div>
</div>
</div>

<div class="col-md-12 col-lg-12 col-sm-12 ">

        <div class="container">
            <div class="row">

                <!-- Products -->
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="row justify-content-between">
                        @forelse ($posts as $post)
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <div class="card shadow-sm h-100">
                                <div class="card-header bg-transparent border-0 p-2">
                                    <a href="/post/{{$post->slug}}">
                                        <img src="{{asset("uploads/".$post->cover)}}" style="height:35vh;"
                                            class="img-fluid card-img-top" alt="placeholder">
                                    </a>
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="text-capitalize fw-bold mb-1"><a href="/post/{{$post->slug}}"
                                            class="btn text-left text-dark fw-bold" style="letter-spacing:1.5px">{{$post->title}}</a></h5>
                                            <p class="h6 p-2 " style="letter-spacing:1px">{{substr($post->excerpt , 50) ."..."}}</p>

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
