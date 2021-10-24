@extends('admin.master')

@section("title" , "Dashboard")

@section("content")



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
<div class="btn-group">
        <a href="/" class="d-none d-sm-inline-block btn mx-2 btn-sm btn-primary shadow-sm"><i
            class="fas fa-home fa-sm text-white-50"></i> Home</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
</div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="card ">
                <div class="card-header">Total Orders <span class="pull-right">
                        <i class="fa fa-caret-up"></i>
                        67%</span></div>
                <div class="card-body"><i class="fa fa-shopping-cart"></i>
                <h2 class="pull-right">{{$total_orders}}</h2>
                </div>
                <div class="card-footer"><a
                        href="#">View
                        more...</a></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="card ">
                <div class="card-header">Total Sales <span class="pull-right">
                        <i class="fa fa-caret-up"></i>
                        35%</span></div>
                <div class="card-body"><i class="fa fa-credit-card"></i>
                <h2 class="pull-right">{{$total_sales}}</h2>
                </div>
                <div class="card-footer"><a
                        href="#">View
                        more...</a></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="card ">
                <div class="card-header">Total Customers <span class="pull-right">
                        <i class="fa fa-caret-up"></i>
                        33%</span></div>
                <div class="card-body"><i class="fa fa-user"></i>
                <h2 class="pull-right">{{$total_customers}}</h2>
                </div>
                <div class="card-footer"><a
                        href="#">View
                        more...</a></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="card ">
                <div class="card-header">People Online</div>
                <div class="card-body"><i class="fa fa-users"></i>
                    <h2 class="pull-right">0</h2>
                </div>
                <div class="card-footer"><a
                        href="#">View
                        more...</a></div>
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
