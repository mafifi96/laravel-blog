<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;


class EditorProfileController extends Controller
{
    public function profile()
    {
        $total_posts = auth()->user()->posts->count();

        $abilities = auth()->user()->abilities->flatten()->pluck('name');

        return view('editor.profile', ['total_posts' => $total_posts, 'abilities' => $abilities]);
    }

    public function posts()
    {
        $this->authorize("viewPosts", Post::class);

        $posts = auth()->user()->posts;

        return view("editor.post.posts", ['posts' => $posts]);

    }

    public function create_post()
    {
        $this->authorize('create', Post::class);

        return view("editor.post.create");
    }

    public function show_post(Post $post)
    {
        $this->authorize('view', $post);

        return view("editor.post.post" , ['post' => $post]);
    }

    public function edit_post($post)
    {
        $post = Post::findOrFail($post);

        $this->authorize('view', $post);

        return view("editor.post.edit" , ['post' => $post]);
    }


    public function store_post(PostRequest $request)
    {
        $this->authorize('create' , Post::class);

        $data = $request->validated();

        $file_name = $request->file('cover')->hashName();

        $request->cover->move(public_path('uploads'), $file_name);

        $data['cover'] = $file_name;

        $tags = explode(' ' , trim($request->tags , ' '));

        $data['tags'] = json_encode($tags);

        $post = auth()->user()->posts()->create($data);

        $request->session()->flash('postcreate', "Post <strong>" . $request->title . " </strong>Created..!");

        return back();


    }

    public function update_post(Request $request , Post $post)
    {
        $this->authorize('update' , $post);

    }

    public function delete_post(Request $request , Post $post)
    {
        $this->authorize('delete' , $post);

        $post->delete();

        return back();
    }

    public function categories()
    {

        $this->authorize("viewCategories", Category::class);

        $categories = Category::all();

        return view("editor.category.categories", ['categories' => $categories]);

    }

    public function create_category()
    {
        $this->authorize('create', Category::class);

        return view("editor.category.create");
    }

    public function show_category(Category $category)
    {
        $this->authorize('edit', Category::class);

        return view("editor.category.category" , ['category' => $category]);
    }

    public function store_category(Request $request)
    {
        $this->authorize('create' , Category::class);

        dd($request->all());

    }

    public function update_category(Request $request , Category $category)
    {
        $this->authorize('update' , $category);

    }

    public function delete_category(Request $request , Category $category)
    {
        $this->authorize('delete' , $category);

        $category->delete();

        return back();
    }

    public function users()
    {
        $this->authorize('viewUsers', User::class);

        //$users = User::whereNotIn('id', [46,auth()->id()])->get();

        //$collection = User::with('roles')->get();

        $users = User::with('roles')->get()->reject(function($user){
            return $user->roles[0]->name == 'admin' || $user->roles[0]->name == 'editor';
        });

        dd($users);
    }

    public function create_user()
    {
        $this->authorize('create', User::class);

        return view("editor.user.create");
    }

    public function show_user(User $user)
    {
        $this->authorize('edit', User::class);

        return view("editor.user.user" , ['user' => $user]);
    }

    public function store_user(Request $request)
    {
        $this->authorize('create' , User::class);

        dd($request->all());

    }

    public function update_user(Request $request , User $user)
    {
        $this->authorize('update' , User::class);

    }

    public function delete_user(Request $request , User $user)
    {
        $this->authorize('delete' , $user);

        $user->delete();

        return back();
    }
}
