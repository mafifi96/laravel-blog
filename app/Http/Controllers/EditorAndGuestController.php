<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EditorAndGuestController extends Controller
{

    public function index()
    {
        /* $users = DB::select('SELECT users.id , users.name , users.email , users.created_at , role.id as role_id ,  role.name as role_name from users
        join role_user on users.id = role_user.user_id
        join role on role.id = role_user.role_id where role.name = "editor" or role.name = "guest" order by role.name');
*/
        // OR

        $users = User::whereNotIn('id' , [auth()->user()->id])->with('roles')->get();

        //$users = User::with('roles')->get();

        return view("admin.layouts.users.users", ['users' => $users]);
    }

    public function show(User $user)
    {
        return view("admin.layouts.users.user", ['user' => $user]);
    }

    public function create()
    {
        return view("admin.layouts.users.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'about' => 'string',
            'avatar' => 'mimes:png,jpg,jpeg|max:2048',
            'role' => 'string'
        ]);


        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $avatar_name = "image-" . time() . "." . $avatar->extension();
            $avatar->storeAs("avatars", $avatar_name);
            $data['avatar'] = $avatar_name;

        }


        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->assignRole($data['role']);

        $request->session()->flash('usercreate', 'User Created Successfuly..!');

        return back();
    }

    public function edit(User $user)
    {
        $abilities = $user->abilities->flatten()->pluck('id');

        return view("admin.layouts.users.edit", ['user' => $user , 'abilities' => $abilities]);
    }

    public function update(Request $request, $user)
    {
        //dd($request->all());
        $User = User::findOrFail($user);

        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $avatar_name = "image-" . time() . "." . $avatar->extension();
            $avatar->storeAs("avatars", $avatar_name);
            Storage::delete("/avatars/" . $User->avatar);
            $User->avatar = $avatar_name;

        }

        if ($request->email && $request->email != '') {

            $User->email = $request->email;

        }

        if ($request->about && $request->about != '') {

            $User->about = $request->about;

        }

        if ($request->password && $request->password != '') {

            $User->password = Hash::make($request->password);

        }

        if (isset($request->role) and $request->role == "guest") {

            $User->assignRole("guest");

        }

        if ($request->role and $request->role == "editor") {
            $User->assignRole("editor");

            $User->allowTo($request->abilities);
        }



        $User->updated_at = \Carbon\Carbon::now();

        $User->save();

        session()->flash('userupdated', 'user <strong>' . $User->name . ' Updated Successfuly..!</strong>');

        return back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $name = $user->name;

        $user->roles()->detach();

        $user->delete();

        session()->flash('user-deleted', 'user <strong>' . $name . 'Has Been Deleted..!</strong>');

        return redirect("/admin/users");
    }
}
