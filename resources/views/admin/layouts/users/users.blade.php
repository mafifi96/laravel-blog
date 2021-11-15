@extends('admin.master')

@section("title" , "Users")

@section("content")

@include("admin.inc.dialog")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>

        <a href="/admin/user/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm"></i> Create User</a>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted text-uppercase">All Users</h4>
                        @if(session()->has('user-deleted'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session()->get('user-deleted') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Joined At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                            <tr>

                                <td scope="row"><a href="/admin/user/{{$user->id}}">{{($loop->index)+1}}</a></td>
                                <td><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles[0]->name}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{date($user->updated_at)}}</td>
                                <td class="btn-group"><a class="btn btn-info btn-sm mx-1 rounded-1"
                                        href="/admin/user/{{$user->id}}/edit"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="/admin/user/{{$user->id}}/delete" method="post">
                                        @method("delete")
                                        @csrf
                                        <button onclick="this.disabled='disabled';"
                                            class="user_delete btn btn-danger btn-sm "><i
                                                class="fas fa-trash fa-sm"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

@endsection
