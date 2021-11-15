@extends('master')

@section("title" , "Store | Shopping Cart")

@section("content")

<div class="content" style="width:83%;float:right;">
    <div class="container">
        <div class="row">

            <!-- Products -->
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-8 px-1">
                        <ul class="list-group">
                        @forelse ($cart_items as $product )

                            <li class="list-group-item text-right">
                              <span class="float-left">{{$product->product_name}}</span>
                              <span class="badge bg-primary rounded-pill">Quantity : {{($product->quantity)}}</span>
                              <span class="badge bg-primary rounded-pill">Price : {{($product->price * $product->quantity)}}</span>
                            <button class="btn btn-sm  deletefromcart" data-id="{{$product->product_id}}">x</button>
                            </li>

                        @empty

                        <h6>Cart Is Empty</h6>
                        @endforelse

                    </ul>
                    @if (session()->has('cart_quantity'))
<div class="px-2 mt-3 d-flex justify-content-center">
    <a href="/checkout" class="btn btn-primary">Checkout</a>
</div>
@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>



@endsection
