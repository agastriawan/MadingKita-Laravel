<header class="navbar navbar-dark sticky-top bg-secondary flex-md-nowrap p-0 shadow">
    <div class="nav-item text-nowrap">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="nav-link px-3 bg-secondary border-0 text-white"> Logout <span
                    data-feather="log-out"></span>
            </button>
        </form>
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">

    </div>
</header>
