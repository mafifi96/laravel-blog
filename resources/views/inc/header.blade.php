<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand text-secondary" href="/">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarScroll">
            <div>
                <ul class="navbar-nav visibilty-none me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                </ul>
            </div>
            <div class="justify-content-between">
                <a class="text-secondary text-capitalize text-decoration-none p-1" href="/home">home</a>
                @foreach ($categories as $category)
                <a class="text-secondary text-capitalize text-decoration-none p-1"
                    href="/category/{{$category->id}}/{{$category->name}}">{{$category->name}}</a>
                @endforeach
            </div>
            <div>

                @ifadmin

                <a class="text-secondary p-1" href="/admin/dashboard">Dashboard</a>

                @endif


                @ifeditor


                <a class="text-secondary p-1" href="/editor">Profile</a>


                @endif

                @guest

                <a class="text-secondary" href="/register">Register</a>



                <a class="text-secondary" href="/login" tabindex="-1" aria-disabled="true">Login</a>

                @endguest

            </div>
        </div>
    </div>
</nav>

<header class="py-4 mt-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xsm-12 text-center">

                <h1 class="text-uppercase">welcome to blog</h1>
                <p class="text-capitalize">stay tuned with latest articles</p>

            </div>
        </div>
    </div>

</header>

<main class="mt-3 mb-5 p-2" style="overflow:hidden;">
    <!-- Categories -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-lg-3 m-0">
                <div class="side-bar p-2 mb-3 shadow-sm">
                    <h4 class="border-bottom p-2 text-capitalize">trending</h4>
                    <form class="d-flex" action="/search" method="get">
                        <input class="form-control me-2" type="search" name="q" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <hr>
                    @foreach ($trending as $trend )

                <h5 class=" p-1 border-bottom border-light"><a class="text-secondary font-weight-light text-decoration-none " href="/post/{{$trend->slug}}">{{$trend->title}}</a></h5>
                    @endforeach
                    <div class="subscribe mt-3 mb-3">
                        <h5 class="text-capitalize text-info">subscripe for latest articles</h5>
                        <form class="d-flex" action="/subscribe" method="post">
                            <input class="form-control me-2" type="email" name="email" placeholder="Email"
                                aria-label="Email">
                            <button class="btn btn-outline-success" type="submit"><i class="fas fa-bell"></i></button>
                        </form>
                    </div>
                </div>
            </div>
