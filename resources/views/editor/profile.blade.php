@extends('editor.master')

@section("title" , "Profile | ". auth()->user()->name )

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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                your posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_posts}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paperclip fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
