@extends('admin.master')

@section("title" , "Categories")

@section("content")



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>

        <a href="/category/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm "></i> Create Category</a>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted">All Categories</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Careated At</th>
                                <th scope="col">Last Update</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ ($loop->index + 1 )}}</th>
                                <td><a href="/category/{{$category->id}}" class="btn text-decoration-none">{{$category->name}}</a></td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
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
