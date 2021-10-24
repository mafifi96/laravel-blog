@extends('master')

@section("title" , "Category | ".$category->name)

@section("content")

    <div class="content" style="width:83%;float:right;">
        <div class="container">
            <div class="row">

                <!-- Products -->
                <div class="col-md-12">
                    <div class="row">


                        @forelse ($category->products as $product )
                        <div class="col-md-4 px-1">

                            <div class="card">
                                <a href="/product/{{$product->id}}">
                                    <img src="{{asset("uploads/".$product->images[0]->image)}}" style="height:300px;"
                                        class="img-thumbnail card-img-top" alt="placeholder">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="/product/{{$product->id}}"
                                            class="btn text-left">{{$product->title}}</a></h5>
                                    <p class="card-text">{{$product->price}}</p>
                                    <div class="card-footer">

                                        <form method="post" name="add">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-8 justify-content-">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="quantity"
                                                            placeholder="quantity..." value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 pull-right">
                                                    <button type="submit" data-price="{{$product->price}}"
                                                        data-id="{{$product->id}}" class="btn btn-primary addtocart"
                                                        name="submit">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @empty
                        <h6>No More Products</h6>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
