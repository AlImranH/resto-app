<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Resto App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item {{ request()->is('categories.*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Categories</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('menus.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Menus</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tables.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Tables</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('reservations.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Reservations</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    

    <!-- Nav Item - Utilities Collapse Menu -->
    

    

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>