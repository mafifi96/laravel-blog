@extends('admin.master')

@section("title" , "Edit Category - ".$category->name)

@section("content")



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted">Edit {{ $category->name }} Category</h4>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('updated'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {!! session()->get('CategoryUpdated') !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                </div>
                <div class="card-body">
                    <form action="/admin/category/{{ $category->id }}/update" method="post">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name"
                                placeholder="Enter Category Name..." required value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-user" name="description"
                                placeholder="Description">{{ $category->description }}</textarea>
                        </div>
                        <button onclick="this.disabled='disabled';this.closest('form').submit();" type="submit"
                            class="addcat btn btn-primary btn-user btn-block">
                            Update
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
