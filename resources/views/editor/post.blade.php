@extends('master')

@section("title" , "Store | ". $product->title)

@section("content")

    <div class="content" style="width:83%;float:right;">
        <div class="container">
            <div class="row">

                <!-- Products -->
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4 px-1">
                            <div class="card">
                                <div class="card-header">

                                    <img src="{{asset("uploads/".$product->images[0]->image)}}" class="img-fluid"
                                        alt="placeholder">

                            </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                    <p class="card-text"><strong>Price : </strong>{{$product->price}}</p>
                                    <p class="card-text"><strong>Description : </strong>{{$product->description}}</p>
                                <a  href="/category/{{$product->category->id}}/{{$product->category->name}}" class="badge badge-primary">{{$product->category->name}}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
