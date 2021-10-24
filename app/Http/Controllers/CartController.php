<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $items = Cart::where("user_id", Auth::id())->get();
        } else {
            $items = Cart::where("session_id", session()->getId())->get();
        }
        //dd($items->products);
        return view("guest.cart", ['cart_items' => $items]);
    }

    public function add(Request $request)
    {
        $user_id = Auth::check() ? Auth::id() : null;
        $productId = $request->product_id;
        $productName = $request->product_name;
        $session = session()->getId();
        $quantity = $request->quantity;
        $price = $request->price;
        $price = ($quantity * $price);

        if (Auth::check()) {
            $count = Cart::where('user_id', $user_id)
                ->where('product_id', $productId)->count('quantity');

        } else {
            $count = Cart::where('session_id', $session)
                ->where('product_id', $productId)->count('quantity');

        }

        if ($count >= 1) {
            $data['quantity'] = $quantity;
            $data['price'] = $quantity * $price;

            if (Auth::check()) {

                $update = Cart::where('user_id', $user_id)
                    ->where('product_id', $productId)->update($data);

                $cart_quantity = Cart::where("user_id", $user_id)->sum('quantity');

                session(['cart_quantity' => $cart_quantity]);

                return response()->json([
                    'quantity' => $cart_quantity,
                ]);

            } else {

                $update = Cart::where('session_id', $session)
                    ->where('product_id', $productId)->update($data);

                $cart_quantity = Cart::where("session_id", $session)->sum('quantity');

                session(['cart_quantity' => $cart_quantity]);

                return response()->json([
                    'quantity' => $cart_quantity,
                ]);

            }
        } else {

            $data = [
                'product_name' => $productName,
                'quantity' => $quantity,
                'price' => $price,
                'product_id' => $productId,
                'session_id' => $session,
                'user_id' => $user_id,
            ];

            $cart = new Cart($data);
            $cart->save();

            if (Auth::check()) {

                $cart_quantity = Cart::where("user_id", $user_id)->sum('quantity');

                session(['cart_quantity' => $cart_quantity]);

                return response()->json([
                    'quantity' => $cart_quantity,
                ]);

            } else {

                $cart_quantity = Cart::where("session_id", $session)->sum('quantity');

                session(['cart_quantity' => $cart_quantity]);

                return response()->json([
                    'quantity' => $cart_quantity,
                ]);
            }
        }

    }

    public function destroy(Request $request)
    {
        $id = $request->product_id;
if(Auth::check())
{

    $item = Cart::where("user_id", Auth::id())->delete();

    $this->cart_quantity();

    return back();

}else{

    $item = Cart::where("session_id", session()->getId())->delete();

    $this->cart_quantity();

    return back();

}
    }

    public function cart_quantity()
    {

       if(Auth::check())
       {
        $cart_quantity = DB::table('carts')->where("user_id", Auth::id())->sum('quantity');
        session(['cart_quantity' => $cart_quantity]);

       }
       else{
        $cart_quantity = DB::table('carts')->where("session_id", session()->getId())->sum('quantity');
        session(['cart_quantity' => $cart_quantity]);

       }
    }

}
