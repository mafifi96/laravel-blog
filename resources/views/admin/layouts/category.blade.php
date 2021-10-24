@extends('admin.master')

@section("title" ,$category->name)

@section("content")



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
<div class="btn-group">
        <a href="/admin/category/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm "></i> Create Category</a>

        <a href="/admin/category/{{$category->id}}/edit" class="d-none d-sm-inline-block ms-2 btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-edit fa-sm "></i> Edit Category</a>
                </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                <h6 class="h6 text-muted">{{$category->name}}</h4>

                </div>
                <div class="card-body">
                <p>{{$category->description}}</p>
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
