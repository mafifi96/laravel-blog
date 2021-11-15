<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;



class PageController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view("guest.home" , ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        return view("guest.post" , ['post'=>$post]);
    }

    public function tag($tag)
    {
        $posts = Post::where("tags" , "like" , "%$tag%")->get();

        return view("guest.tag" , ['posts'=>$posts , 'tag'=>$tag]);
    }

    public function category(Category $category , $name = null)
    {
        return view("guest.category" , ['category'=> $category]);
    }

    public function about()
    {
        return view("guest.about");
    }

    public function contact()
    {
        return view("guest.contact");
    }

}
