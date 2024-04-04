<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ auth()->user()->role == 'admin' ? route('admin.barang.index') : route('barang.index')}}">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Data Barang</span>
            </a>
        </li><!-- End Profile Page Nav -->

        @if(auth()->user()->role == 'admin') <!-- Tambahkan pengecekan peran pengguna -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.user.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Data User</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-envelope"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-card-list"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-dash-circle"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
