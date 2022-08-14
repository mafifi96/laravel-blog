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

                        <div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="true">Post</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="category-tab" data-bs-toggle="tab" data-bs-target="#category" type="button" role="tab" aria-controls="category" aria-selected="false">Category</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="false">User</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">

                                {{-- @foreach ($abilities as $ability )
<div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
                                    <div class="form-check m-1">
                                        <input class="form-check-input" type="checkbox" value="1" id="create-post">
                                        <label class="form-check-label" for="create-post">
                                          create
                                        </label>
                                      </div>
                                    <div class="form-check m-1">
                                        <input class="form-check-input" type="checkbox" value="2" id="edit-post">
                                        <label class="form-check-label" for="edit-post">
                                          edit
                                        </label>
                                      </div>
                                      <div class="form-check m-1">
                                        <input class="form-check-input" type="checkbox" value="3" id="update-post" >
                                        <label class="form-check-label" for="update-post">
                                          update
                                        </label>
                                      </div>
                                      <div class="form-check m-1">
                                        <input class="form-check-input" type="checkbox" value="4" id="delete-post">
                                        <label class="form-check-label" for="delete-post">
                                          delete
                                        </label>
                                      </div>
                                </div>
                                @endforeach --}}


                                <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
                                    <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="1" id="create-post" @if ($abilities->contains(1)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="create-post">
                                          create
                                        </label>
                                      </div>
                                    <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="2" id="edit-post" @if ($abilities->contains(2)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="edit-post">
                                          edit
                                        </label>
                                      </div>
                                      <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="3" id="update-post" @if ($abilities->contains(3)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="update-post">
                                          update
                                        </label>
                                      </div>
                                      <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="4" id="delete-post" @if ($abilities->contains(4)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="delete-post">
                                          delete
                                        </label>
                                      </div>
                                </div>
                                <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
                                    <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="5" id="create-category" @if ($abilities->contains(5)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="create-category">
                                          create
                                        </label>
                                      </div>
                                    <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="6" id="edit-category" @if ($abilities->contains(6)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="edit-category">
                                          edit
                                        </label>
                                      </div>
                                      <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="7" id="update-category" @if ($abilities->contains(7)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="update-category">
                                          update
                                        </label>
                                      </div>
                                      <div class="form-check m-1">
                                        <input class="form-check-input"  name="abilities[]" type="checkbox" value="8" id="delete-category" @if ($abilities->contains(8)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="delete-category">
                                          delete
                                        </label>
                                      </div>
                                </div>
                                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                                    <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="9" id="create-user" @if ($abilities->contains(9)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="create-user">
                                          create
                                        </label>
                                      </div>
                                    <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="10" id="edit-user" @if ($abilities->contains(10)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="edit-user">
                                          edit
                                        </label>
                                      </div>
                                      <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="11" id="update-user" @if ($abilities->contains(11)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="update-user">
                                          update
                                        </label>
                                      </div>
                                      <div class="form-check m-1">
                                        <input class="form-check-input" name="abilities[]" type="checkbox" value="12" id="delete-user" @if ($abilities->contains(12)) {{"checked"}} @endif>
                                        <label class="form-check-label" for="delete-user">
                                          delete
                                        </label>
                                      </div>
                                </div>

                              </div>
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


@endsection
