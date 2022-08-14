<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;



class PageController extends Controller
{
    public function index()
    {
        
        $posts = Post::latest()->paginate(10);
        
        return view("guest.home" , ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        return view("guest.post" , ['post'=>$post]);
    }

    public function tag($tag)
    {
        $posts = Post::where("tags" , "like" , "%$tag%")->paginate(10);

        return view("guest.tag" , ['posts'=>$posts , 'tag'=>$tag]);
    }

    public function search(Request $request)
    {
        if($request->q){

            $query = $request->q;
            
            $posts = Post::where("title" , "like" , "%$query%")->paginate(10);

            return view("guest.search" , ['posts'=>$posts , 'query'=>$query]);

        }else{
            
            return redirect('/');
        }


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
