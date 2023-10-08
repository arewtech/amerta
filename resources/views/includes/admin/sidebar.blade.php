<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
        <img class="img-profile rounded-circle mr-2" id="img-live-preview"
            style="width: 55px; height: 55px; object-fit: cover; object-position: center;"
            src="{{ setting('app_logo') !== null ? asset('storage/' . setting('app_logo')) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}">
        <div class="sidebar-brand-text">{{ setting('app_title') ?? 'App Title' }} </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::url() == url('/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-th-large"></i>
            <span>Website</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main
    </div>

    <!-- Nav Item - active -->
    <li class="nav-item {{ Route::is('camps*') || Route::is('camp-benefits*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('camps.index') }}">
            <i class="fas fa-laptop-code"></i>
            <span>Camps</span></a>
    </li>

    <li class="nav-item {{ Route::is('checkouts*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('checkouts.index') }}">
            <i class="fas fa-shopping-basket"></i>
            <span>Checkouts</span></a>
    </li>

    <li class="nav-item {{ Route::is('discounts*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('discounts.index') }}">
            <i class="fas fa-percentage"></i>
            <span>Discounts</span></a>
    </li>

    <li class="nav-item {{ Route::is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-file-alt"></i>
            <span>Report</span>
        </a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
