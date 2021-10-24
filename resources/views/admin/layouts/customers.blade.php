@extends('admin.master')

@section("title" , "Customers")

@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted text-uppercase">all customers</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Joined At</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($customers as $customer)
                            <tr>

                                <td scope="row"><a href="/admin/order/{{$order->id}}">{{$order->id}}</a></td>
                                <td>{{$order->status}}</td>
                                <td>{{number_format($order->total_price ,0 , ',')}}</td>
                                <td>{{$order->products()->sum('quantity')}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->created_at}}</td>

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
