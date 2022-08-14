@extends('master')

@section('title' , "Register")

@section('content')


<div class="col-md-9 col-lg-9 col-sm-12 ">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->

                {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form class="user" action="/register" method="post">
                                    @csrf
                                    <div class="form-group ">

                                        <input type="text" name="name" class="form-control form-control-user"
                                            id="exampleFirstName" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" placeholder="Email Address">
                                    </div>
                                    <div class="form-group">

                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Password">

                                    </div>
                                    <button onclick="this.disabled='disabled';this.closest('form').submit();" type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="/login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>
@endsection
