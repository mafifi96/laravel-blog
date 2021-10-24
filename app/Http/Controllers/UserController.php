<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin()
    {
        $total_orders = Order::count();
        $total_cutomers = User::count();
        $total_sales = Order::sum("total_price");

        if($total_sales < 1000000)
        {
            $total_sales = number_format($total_sales , 0 , '.'  , ','). "K";

        }elseif($total_sales >= 1000000){
            $total_sales = number_format($total_sales , 0 , '.'  , ','). "M";
        }

        return view('admin.dashboard' , ['total_customers'=>$total_cutomers , 'total_orders'=>$total_orders,'total_sales'=>$total_sales]);

    }

    public function customer()
    {
        $carts = Auth::user()->cart;
        $total_price = Cart::where("user_id", Auth::id())->sum('price');

        return view('customer.profile' , ['carts' => $carts , 'total_price' => $total_price]);

    }

    public function checkout()
    {
        if(Auth::check()){return redirect("/customer");}
        return view('guest.check');

    }

    public function customer_info(Request $request)
    {
        //dd($request->all());

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


        return redirect("/customer");
    }

    public function index()
    {

        return "welcome" . Auth::user()->name;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
