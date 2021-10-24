@extends('master')

@section("title" , "Check Out")

@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Checkout</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted">Fill Your Information</h4>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                </div>
                <div class="card-body">
                    <form action="/customer/info" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name"
                        placeholder="name" required value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email"
                        placeholder="email" required value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password"
                        placeholder="password" required>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" name="image"
                        placeholder="profile picture (optional)" value="{{old('image')}}">
                        </div>

                        <div class="form-group">
                            <input type="tel" class="form-control form-control-user"
                                 name="phone"
                        placeholder="phone number" required value="{{old('phone')}}">
                        </div>
                        <div class="form-group">
                            <input  class="form-control form-control-user"
                        name="address" value="{{old('address')}}" type="address" required placeholder="address">
                        </div>

                        <div class="form-group">
                            <select name="payment_type" class="form-control form-control-user">
                                <option value="" selected>--Payment Method--</option>
                                <option value="cash">Cash</option>
                                <option value="credit_card">Credit Card</option>
                            </select>
                        </div>

                    <button onclick="this.disabled='disabled';this.closest('form').submit();" type="submit" class="btn btn-primary btn-user btn-block">
                            Save
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
