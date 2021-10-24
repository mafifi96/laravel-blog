
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="/">Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/">Home</a>
                </li>

                @ifadmin
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                @endif


                @ifcustomer

                <li class="nav-item">
                    <a class="nav-link" href="/customer">Profile</a>
                </li>

                @endif

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/login" tabindex="-1" aria-disabled="true">Login</a>
                </li>
                @endguest
                @auth
                <li class="nav-item">

                <form method="POST" action="http://127.0.0.1:8000/logout">
                    @csrf
                    <a class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#logoutModal"
                        href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </form>
                </li>
                @endauth
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>


<main class="mt-5 mb-5 px-3" style="overflow:hidden;">
    <!-- Categories -->
    <div class="side-bar shadow">
        <ul>
            @foreach ($categories as $category)
            <li><a href="/category/{{$category->id}}/{{$category->name}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
