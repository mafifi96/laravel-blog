<nav class="navbar navbar-expand-lg  bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-dark" href="/">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>

        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarScroll">
            <div>
                <ul class="navbar-nav visibilty-none me-auto my-2 my-lg-0 navbar-nav-scroll"
                    style="--bs-scroll-height: 100px;">

                </ul>
            </div>
            <div class="justify-content-between">

                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">

                        <a class="text-dark text-capitalize text-decoration-none p-1 nav-link" aria-current="page"
                            href="/">home</a>
                    </li>

                    @foreach ($categories as $category)
                    <li class="nav-item ">

                        <a class="text-dark text-uppercase text-decoration-none p-1 nav-link " aria-current="page"
                            href="/category/{{$category->id}}/{{$category->name}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                </ul>

            </div>
            <div>
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    @ifadmin

                    <li class="nav-item">
                        <a class="text-secondary p-1 text-capitalize text-decoration-none p-1 nav-link"
                            aria-current="page" href="/admin/dashboard">Dashboard</a>
                    </li>
                    @endif


                    @ifeditor
                    <li class="nav-item">

                        <a class="text-secondary p-1 text-decoration-none p-1 nav-link" aria-current="page"
                            href="/editor">Profile </a> </li> @endif @guest <li class="nav-item">

                        <a class="text-secondary text-decoration-none p-1 nav-link" aria-current="page"
                            href="/register">Register</a>
                    </li>
                    <li class="nav-item">

                        <a class="text-secondary text-decoration-none p-1 nav-link" aria-current="page"" href="/login"
                            tabindex="-1" aria-disabled="true">Login</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

<header class="py-4 mt-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xsm-12 text-center">

            </div>
        </div>
    </div>

</header>

<main class="mt-3 mb-5 p-2" style="overflow:hidden;">
    <!-- Categories -->
    <div class="container-fluid">
        <div class="row">
