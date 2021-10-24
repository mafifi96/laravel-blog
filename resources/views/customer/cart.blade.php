@extends('master')

@section("title" , "Store | Shopping Cart")

@section("content")

<div class="content" style="width:83%;float:right;">
    <div class="container">
        <div class="row">

            <!-- Products -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 px-1">
                        <ul class="list-group">
                        @forelse ($cart_items as $product )

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              {{$product->product_name}}
                              <span class="badge bg-primary rounded-pill">Quantity : {{($product->quantity)}}</span>
                              <span class="badge bg-primary rounded-pill">Price : {{($product->price * $product->quantity)}}</span>
                            <button class="btn btn-sm deletefromcart" data-id="{{$product->product_id}}">x</button>
                            </li>

                        @empty

                        <h6>Cart Is Empty</h6>
                        @endforelse

                    </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>



@endsection
