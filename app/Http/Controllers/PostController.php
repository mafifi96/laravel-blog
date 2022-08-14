<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

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

    public function store(PostRequest $request)
    {

        $data = $request->validated();

        $file_name = $request->file('cover')->hashName();

        $request->cover->move(public_path('uploads'), $file_name);

        $data['cover'] = $file_name;

        $tags = explode(' ', trim($request->tags, ' '));

        $data['tags'] = json_encode($tags);

        $post = auth()->user()->posts()->create($data);

        $request->session()->flash('postcreate', "Post <strong>" . $request->title . " </strong>Created..!");

        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view("admin.layouts.post.edit", ['post' => $post]);
    }

    public function update(PostRequest $request, $post)
    {

        $Post = Post::findOrFail($post);

        $data = $request->validated();

        $tags = preg_split('/\s+/', trim($request->tags, ' '));

        $data['tags'] = json_encode($tags);

        if ($request->hasFile('cover')) {

            $file_name = $request->file('cover')->hashName();

            $request->cover->move(public_path('uploads'), $file_name);

            $data['cover'] = $file_name;
        }

        $Post->update($data);

        return redirect("/admin/posts");
    }

    public function destroy($post)
    {
        $item = Post::findOrFail($post);

        $item->delete();
    }
}
