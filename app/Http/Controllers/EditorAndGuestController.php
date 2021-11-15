<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
$users = User::with('roles')->get();

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
            'role' => 'string',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->assignRole($data['role']);

        $request->session()->flash('usercreate', 'User Created Successfuly..!');

        return back();
    }

    public function edit(User $user)
    {
        return view("admin.layouts.users.edit", ['user' => $user]);
    }

    public function update(Request $request, $user)
    {

        $data = $request->validate([
            'name' => 'string',
            'email' => 'email',
            'avatar' => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        $User = User::findOrFail($user);

        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $avatar_name = $avatar->getClientOriginalName();
            $avatar_name = "image-".time()."-".$avatar_name;
            $path = $avatar->storeAs("avatars" , $avatar_name);
            $data['avatar'] = $avatar_name;

        }

        if($request->password && $request->password != '')
        {
            $data['password'] = Hash::make($request->password);
        }elseif($request->password == '')
        {
            $data['password'] = $User->password;
        }


        $User->update($data);

        if (isset($request->role) and $request->role == "guest") {
            
            $User->assignRole("guest");
        }

        if ($request->role and $request->role == "editor") {
            $User->assignRole("editor");
        }

        session()->flash('userupdated', 'user <strong>' . $User->name . ' Updated Successfuly..!</strong>');

        return back();
    }

    

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();

        session()->flash('user-deleted', 'user <strong>' . $user->name . 'Has Been Deleted..!</strong>');

        return redirect("/admin/users");
    }
}
