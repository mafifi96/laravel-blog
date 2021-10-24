@extends('admin.master')

@section("title" , "Products")

@section("content")


<div class="dialog">
    <div class="card">
        <div class="card-header">
            <h4>Are You Sure You Want To Delete This Item ?</h4>
        </div>
        <div class="card-body" style="padding:10px;text-align:center;">
            <div class="btn-group">
                <a class="btn btn-danger mx-4" id="delete">Delete</a>
                <a class="btn btn-primary" id="cancel">Cancel</a>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>

        <a href="/admin/product/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm "></i> Create Product</a>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted">All products</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Category</th>
                                <th scope="col">Careated At</th>
                                <th scope="col">Last Update</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                            <tr>
                                <td scope="row">{{($loop->index + 1)}}</td>
                                <td><a href="/admin/product/{{$product->id}}">{{$product->title}}</a></td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td><a href="/admin/category/{{$product->category->id}}"
                                        class="btn text-decoration-none">{{$product->category->name}}</a></td>
                                <td>{{$product->created_at}}</td>
                                <td>{{$product->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/product/{{$product->id}}/edit" class="btn btn-primary"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$product->id}}" class="btn btn-danger product_delete"><i
                                                class="fas fa-trash"></i></a>
                                    </div>
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
