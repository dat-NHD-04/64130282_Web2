<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('admin-assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Đại học Nha Trang</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if (Request::segment(2) == '') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pages.index') }}"
                        class="nav-link @if (Route::currentRouteName() == 'pages.index') active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Page - List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pages.create') }}"
                        class="nav-link @if (Route::currentRouteName() == 'pages.create') active @endif">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>Page - Addnew</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}"
                        class="nav-link @if (Route::currentRouteName() == 'posts.index') active @endif">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>Post - List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.create') }}"
                        class="nav-link @if (Route::currentRouteName() == 'posts.create') active @endif">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>Post - Addnew</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
