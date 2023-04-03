<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }} " aria-current="page" href="/admin"
                    style="color: white">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/sekolah*') ? 'active' : '' }}" href="/admin/sekolah"
                    style="color: white">
                    <span data-feather="list"></span>
                    Sekolah
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/organisasi*') ? 'active' : '' }}" href="/admin/organisasi"
                    style="color: white">
                    <span data-feather="list"></span>
                    Organisasi
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/ekskul*') ? 'active' : '' }}" href="/admin/ekskul"
                    style="color: white">
                    <span data-feather="list"></span>
                    Ekstrakulikuler
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/siswa*') ? 'active' : '' }}" href="/admin/siswa"
                    style="color: white">
                    <span data-feather="list"></span>
                    Siswa/i
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/artikel*') ? 'active' : '' }}" href="/admin/artikel"
                    style="color: white">
                    <span data-feather="list"></span>
                    Mading Users
                </a>
            </li>

        </ul>
    </div>
</nav>
