@extends('admin.master')

@section("title" , "Edit User | ".$user->name)

@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users / Edit User</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                <h6 class="h6 text-muted">Edit User {{$user->name}}</h4>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session()->has('userupdated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session()->get('userupdated') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                </div>
                <div class="card-body">
                <form action="/admin/user/{{$user->id}}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" placeholder="Name"
                                required value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" placeholder="Email"
                                required value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" name="avatar" placeholder="Avatar"
                                 value="">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control form-control-user" name="about" value="{{old('about')}}"
                        maxlength="150" required placeholder="About">{{$user->about}}</textarea>
                        </div>
                        <div class="form-group">
                            <select name="role" class="form-control form-control-user">
                                <option value="guest" @if($user->roles[0]->name == "guest") {{"selected"}} @endif >Guest</option>
                                <option value="editor" @if($user->roles[0]->name == "editor") {{"selected"}} @endif>Editor</option>
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password"
                                required value="">
                        </div>

                        <button onclick="this.disabled='disabled';this.closest('form').submit();" type="submit"
                            class="btn btn-primary btn-user btn-block">Update
                        </button>
                    </form>
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
