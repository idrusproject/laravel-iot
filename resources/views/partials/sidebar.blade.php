<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('myAssets/dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Hi, {{ auth()->user()->name }}</a>
    </div>
    </div>
    <div class="form-inline">
</div>
<!-- Sidebar Menu -->
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-header">Main Navigation</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('history') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                    History
                    <!-- <span class="right badge badge-danger">New</span> -->
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Statistics
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-gear"></i>
                <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">3</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('personal') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Personal Information</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('iot.config') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>IoT Configuration</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Website Configuration</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="document.getElementById('logout').submit()">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                    <form action="{{ route('logout') }}" method="POST" id="logout"> 
                        @csrf
                        <input type="hidden">
                    </form>
                </a>
            </li>
        </ul>
</nav>