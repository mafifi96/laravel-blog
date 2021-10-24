<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Product_images;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $products = Product::all();

       return view("admin.layouts.products" , ['products' => $products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = DB::select('select id,name from categories ');

        return view("admin.layouts.product_create" , ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $data = $request->validate([
            'title' => "required|min:10|max:50",
            'description' => "required|min:5|max:1000",
            'price' => "required|numeric",
            'quantity'=> "required|integer",
            'category_id' => 'required|integer'
        ]);

        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        $file_name = time(). "_". $request->image->extension();
        $request->image->move(public_path('uploads'), $file_name);

        $product = Product::create($data)->id;
        $image = Product_images::create([
            'image'=>$file_name,
            'product_id'=> $product
            ]);

        $request->session()->flash('saved' , '<strong>Product</strong> saved..!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {

        return new ProductResource($product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRequest $request , Product $product)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $product = Product::find($request->id);
        $product->delete();
        return "deleted";
    }
}
