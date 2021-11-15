<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin()
    {
        $total_posts = Post::count();
        $total_users = User::count();
        $total_categories = Category::count();

        return view('admin.dashboard' , ['total_posts'=>$total_posts , 'total_users'=>$total_users , 'total_categories'=> $total_categories]);

    }

    public function editor()
    {



        return view('editor.profile');

    }

    public function editor_info(Request $request)
    {
        //dd($request->all());
/*
        $session_id = session()->getId();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'avatar' => 'mimes:png,jpg,jpeg|max:2024',
            'phone' => 'required',
            'address'=> 'required',
            'payment_type'=>'required'

        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address'=> $request->address,
            'pm_type' => $request->payment_type

        ]);

        $user->assignRole("customer");

        event(new Registered($user));

        Auth::login($user);
        $u_id = Auth::id();

        $cart = DB::update('update carts set user_id = ? where session_id = ?', [$u_id , $session_id]);

 */
//        return redirect("/customer");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
