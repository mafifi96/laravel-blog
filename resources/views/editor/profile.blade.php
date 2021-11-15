@extends('master')

@section("title" , "Profile")

@section("content")

<div class="content" style="width:83%;float:right;">
    <div class="container">
        <div class="row">

            <!-- posts -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="h4">Your Posts</h4>

                      {{--   @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session()->has('orderconfirmed'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session()->get('orderconfirmed') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
 --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <td scope="col">#</td>
                                <td scope="col">Title</td>
                                <td scope="col">Views</td>
                                <td scope="col">Comments</td>
                            </thead>
                            @forelse ($posts as $post )
                            <tr>
                                <td>{{($loop->index + 1)}}</td>
                                <td><a href="/post/{{$post->id}}">{{$post->title}}</a></td>
                                <td>{{$post->views}}</td>
                                <td>{{$post->comments->count()}}</td>

                            </tr>
                            @empty

                            <tr>
                                <td colspan="4" class="text-center">No Posts</td>
                            </tr>
                            @endforelse

                        </table>
                    </div>
                   {{--  @if (session()->has('cart_quantity'))

                    <div class="card-footer justify-content-center">
                        <a href="/confirm/order" class="btn btn-primary" id="confirm-order">Confirm Order</a>
                    </div>

                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
</main>


@endsection
