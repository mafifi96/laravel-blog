<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sessions;

class GuestController extends Controller
{
    public function index()
    {
        $session = Sessions::find(session()->getId());
        if (!$session) {
            $session = new Sessions;
            $session->session_id = session()->getId();
            $session->save();
        }
        return view("guest.home", ['products' => Product::latest()->get(), 'categories' => Category::all()]);
    }

    public function product(Product $product)
    {
        return view("guest.product", ['product' => $product , 'categories' => Category::all()]);
    }

    public function category(category $category, $name = null)
    {
        return view("guest.category", ['category' => $category , 'categories'=> Category::all()]);
    }

}
