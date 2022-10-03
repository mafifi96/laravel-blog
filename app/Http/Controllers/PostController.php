<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;

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

        $data['cover'] = PostService::uploadCover($request);

        $data['tags'] = PostService::trimTags($request);

        $post = auth()->user()->posts()->create($data);

        $request->session()->flash('postcreate', "Post <strong>" . $request->title . " </strong>Created..!");

        return redirect()->route("admin.post",['post'=>$post->slug]);
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

        $data['tags'] = PostService::trimTags($request);

        if ($request->hasFile('cover')) {

            $oldCover = $Post->cover;

            $data['cover'] = PostService::uploadCover($request);

            Storage::disk('public')->delete("uploads/".$oldCover);
        }

        $Post->update($data);

        return redirect()->route("admin.post",['post'=>$Post->slug]);

    }

    public function destroy($post)
    {
        $item = Post::findOrFail($post);

        $item->delete();
    }
}
