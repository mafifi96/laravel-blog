<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view("admin.layouts.post.posts", ['posts' => $posts]);
        ##  for API.. return PostResource::collection($posts);
    }

    public function show(Post $post)
    {

        return view("admin.layouts.post.post", ['post' => $post]);

        ## for API.. return new PostResource(Post::findOrFail($post));
    }

    public function create()
    {
        return view("admin.layouts.post.create");
    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'title'   => 'required|max:50|min:15|string',
            'slug'    => 'required|max:50',
            'excerpt' => 'required|max:150',
            'cover'   => 'required|mimes:png,jpg,jpeg',
            'body'    => 'required|max:2000|min:200',
            'category_id' => 'required|integer',
            'status' => 'string',
            'tags' => 'string'
        ]);

        $file_name = time() . "_" . $request->cover->extension();
        $request->cover->move(public_path('uploads'), $file_name);
        $data['user_id'] = Auth::id();
        $data['cover'] = $file_name;
        $tags = explode(' ' , trim($request->tags , ' '));
        $data['tags'] = json_encode($tags);

        $post = Post::create($data);

        $request->session()->flash('postcreate', "Post <strong>" . $request->title . " </strong>Created..!");

        return redirect()->back();

        /* for API.. $post = new Post;
        $post->title = $request->post['title'];
        $post->slug = $request->post['slug'];
        $post->body = $request->post['body'];
        $post->category_id = $request->post['category_id'];
        $post->user_id = $request->post['user_id'];
        $post->save();
        $post->tags()->attach(collect($request->post['tags']));

        return $post;
 */
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view("admin.layouts.post.edit", ['post' => $post]);

    }

    public function update(Request $request, $post)
    {

        $Post = Post::findOrFail($post);
        $data = $request->all();

        $tags = preg_split('/\s+/' , trim($request->tags , ' '));
        $data['tags'] = json_encode($tags);

        $Post->update($data);

        return redirect("/admin/posts");
    }


    public function destroy($post)
    {
        $item = Post::findOrFail($post);

        $item->delete();

        return  "deleted..!";
    }
}
