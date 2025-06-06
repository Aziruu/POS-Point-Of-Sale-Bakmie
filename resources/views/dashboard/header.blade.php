<!DOCTYPE html>
<html lang="en">

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
                name="viewport"
                content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Post App Warmindo</title>
        <!-- plugins:css -->
        <link
                rel="stylesheet"
                href="{{ asset('assets/vendors/mdi/css') }}/materialdesignicons.min.css" />
        <link
                rel="stylesheet"
                href="{{ asset('assets/vendors/ti-icons/css') }}/themify-icons.css" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/css') }}/vendor.bundle.base.css" />
        <link
                rel="stylesheet"
                href="{{ asset('assets/vendors/font-awesome/css') }}/font-awesome.min.css" />
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link
                rel="stylesheet"
                href="{{ asset('assets/vendors/font-awesome/css') }}/font-awesome.min.css" />
        <link
                rel="stylesheet"
                href="{{ asset('assets/vendors/bootstrap-datepicker') }}/bootstrap-datepicker.min.css" />
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('assets/css') }}/style.css" />
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('assets/images') }}/favicon.png" />
</head>

<body>
        <div class="container-scroller">
                <!-- partial:partials/_navbar.html -->
                <nav
                        class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                        <div
                                class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                                <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('assets/images') }}/logo.svg" alt="logo" /></a>
                                <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('assets/images') }}/logo-mini.svg" alt="logo" /></a>
                        </div>
                        <div class="navbar-menu-wrapper d-flex align-items-stretch">
                                <button
                                        class="navbar-toggler navbar-toggler align-self-center"
                                        type="button"
                                        data-toggle="minimize">
                                        <span class="mdi mdi-menu"></span>
                                </button>
                                <div class="search-field d-none d-md-block">
                                        <form class="d-flex align-items-center h-100" action="#">
                                                <div class="input-group">
                                                        <div class="input-group-prepend bg-transparent">
                                                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                                        </div>
                                                        <input
                                                                type="text"
                                                                class="form-control bg-transparent border-0"
                                                                placeholder="Search Someting :3" />
                                                </div>
                                        </form>
                                </div>
                                <ul class="navbar-nav navbar-nav-right">
                                        <li class="nav-item d-none d-lg-block full-screen-link">
                                                <a class="nav-link">
                                                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                                                </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <a
                                                        class="nav-link count-indicator dropdown-toggle"
                                                        id="messageDropdown"
                                                        href="#"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-email-outline"></i>
                                                        <span class="count-symbol bg-warning"></span>
                                                </a>
                                                <div
                                                        class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
                                                        aria-labelledby="messageDropdown">
                                                        <h6 class="p-3 mb-0">Messages</h6>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item preview-item">
                                                                <div class="preview-thumbnail">
                                                                        <img
                                                                                src="{{ asset('assets/images') }}/faces/face4.jpg"
                                                                                alt="image"
                                                                                class="profile-pic" />
                                                                </div>
                                                                <div
                                                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                                        <h6
                                                                                class="preview-subject ellipsis mb-1 font-weight-normal">
                                                                                Mark send you a message
                                                                        </h6>
                                                                        <p class="text-gray mb-0">1 Minutes ago</p>
                                                                </div>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item preview-item">
                                                                <div class="preview-thumbnail">
                                                                        <img
                                                                                src="{{ asset('assets/images/faces') }}/face2.jpg"
                                                                                alt="image"
                                                                                class="profile-pic" />
                                                                </div>
                                                                <div
                                                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                                        <h6
                                                                                class="preview-subject ellipsis mb-1 font-weight-normal">
                                                                                Cregh send you a message
                                                                        </h6>
                                                                        <p class="text-gray mb-0">15 Minutes ago</p>
                                                                </div>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item preview-item">
                                                                <div class="preview-thumbnail">
                                                                        <img
                                                                                src="{{ asset('assets/images/faces') }}/face3.jpg"
                                                                                alt="image"
                                                                                class="profile-pic" />
                                                                </div>
                                                                <div
                                                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                                        <h6
                                                                                class="preview-subject ellipsis mb-1 font-weight-normal">
                                                                                Profile picture updated
                                                                        </h6>
                                                                        <p class="text-gray mb-0">18 Minutes ago</p>
                                                                </div>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                                                </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <a
                                                        class="nav-link count-indicator dropdown-toggle"
                                                        id="notificationDropdown"
                                                        href="#"
                                                        data-bs-toggle="dropdown">
                                                        <i class="mdi mdi-bell-outline"></i>
                                                        <span class="count-symbol bg-danger"></span>
                                                </a>
                                                <div
                                                        class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
                                                        aria-labelledby="notificationDropdown">
                                                        <h6 class="p-3 mb-0">Notifications</h6>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item preview-item">
                                                                <div class="preview-thumbnail">
                                                                        <div class="preview-icon bg-success">
                                                                                <i class="mdi mdi-calendar"></i>
                                                                        </div>
                                                                </div>
                                                                <div
                                                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                                        <h6 class="preview-subject font-weight-normal mb-1">
                                                                                Event today
                                                                        </h6>
                                                                        <p class="text-gray ellipsis mb-0">
                                                                                Just a reminder that you have an event today
                                                                        </p>
                                                                </div>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item preview-item">
                                                                <div class="preview-thumbnail">
                                                                        <div class="preview-icon bg-warning">
                                                                                <i class="mdi mdi-cog"></i>
                                                                        </div>
                                                                </div>
                                                                <div
                                                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                                        <h6 class="preview-subject font-weight-normal mb-1">
                                                                                Settings
                                                                        </h6>
                                                                        <p class="text-gray ellipsis mb-0">Update dashboard</p>
                                                                </div>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item preview-item">
                                                                <div class="preview-thumbnail">
                                                                        <div class="preview-icon bg-info">
                                                                                <i class="mdi mdi-link-variant"></i>
                                                                        </div>
                                                                </div>
                                                                <div
                                                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                                        <h6 class="preview-subject font-weight-normal mb-1">
                                                                                Launch Admin
                                                                        </h6>
                                                                        <p class="text-gray ellipsis mb-0">New admin wow!</p>
                                                                </div>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                                                </div>
                                        </li>
                                        <li class="nav-item nav-logout d-none d-lg-block">
                                                <a class="nav-link" href="#">
                                                        <i class="mdi mdi-power"></i>
                                                </a>
                                        </li>
                                        <li class="nav-item nav-settings d-none d-lg-block">
                                                <a class="nav-link" href="#">
                                                        <i class="mdi mdi-format-line-spacing"></i>
                                                </a>
                                        </li>
                                        <li class="nav-item nav-profile dropdown">
                                                <a
                                                        class="nav-link dropdown-toggle"
                                                        id="profileDropdown"
                                                        role="button"
                                                        href="#"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <div class="nav-profile-text me-3">
                                                                <p class="mb-1 text-black">Si Unik</p>
                                                        </div>
                                                        <div class="nav-profile-img me-2">
                                                                <img src="{{ asset('assets/images/faces') }}/face1.jpg" alt="image" />
                                                                <span class="availability-status online"></span>
                                                        </div>
                                                </a>
                                                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                                        <a class="dropdown-item" href="#">
                                                                <i class="fa fa-user me-2 text-info"></i> Profile
                                                        </a>
                                                        <div class="dropdown-divider"></div>

                                                        <!-- Link Logout -->
                                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                <i class="mdi mdi-logout me-2 text-info"></i> Signout
                                                        </a>

                                                        <!-- Form logout tersembunyi -->
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                        </form>
                                                </div>
                                        </li>
                                </ul>
                                <button
                                        class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                                        type="button"
                                        data-toggle="offcanvas">
                                        <span class="mdi mdi-menu"></span>
                                </button>
                        </div>
                </nav>
                <!-- partial -->
                <div class="container-fluid page-body-wrapper">
                        <!-- partial:partials/_sidebar.html -->
                        <nav class="sidebar sidebar-offcanvas" id="sidebar">
                                <ul class="nav">
                                        <li class="nav-item nav-profile">
                                                <a href="#" class="nav-link">
                                                        <div class="nav-profile-image">
                                                                <img src="assets/images/faces/face1.jpg" alt="profile" />
                                                                <span class="login-status online"></span>
                                                                <!--change to offline or busy as needed-->
                                                        </div>
                                                        <div class="nav-profile-text d-flex flex-column">
                                                                <span class="font-weight-bold mb-2">Si Unik</span>
                                                                <span class="text-secondary text-small">Admin</span>
                                                        </div>
                                                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                                                </a>
                                        </li>

<li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->role . '.dashboard') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
    </a>
</li>
@if(auth()->user()->role === 'admin' || auth()->user()->role === 'kasir')
<li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->role . '.menu.index') }}">
        <span class="menu-title">Menu</span>
        <i class="fa fa-book menu-icon"></i>
    </a>
</li>
@endif
<li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->role . '.order.index') }}">
        <span class="menu-title">Order</span>
        <i class="fa fa-cutlery menu-icon"></i>
    </a>
</li>
@if(auth()->user()->role === 'admin' || auth()->user()->role === 'kasir')
<li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->role . '.categories.index') }}">
        <span class="menu-title">Kategori</span>
        <i class="fa fa-list menu-icon"></i>
    </a>
</li>
@endif
@if(auth()->user()->role === 'admin')
<li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->role . '.users.index') }}">
        <span class="menu-title">Manage User</span>
        <i class="fa fa-users menu-icon"></i>
    </a>
</li>
@endif

<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Transaction</span>
        <i class="menu-arrow"></i>
        <i class="fa fa-clock-o menu-icon"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route(auth()->user()->role . '.transaction.history')}}">History Transaksi</a>
            </li>
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'kasir')
            <li class="nav-item">
                <a class="nav-link" href="{{ route(auth()->user()->role . '.transaction.laporan') }}">Laporan Transaksi</a>
            </li>
            @endif
        </ul>
    </div>
</li>

@if(auth()->user()->role === 'admin')
<li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->role . '.pemasok.index') }}">
        <span class="menu-title">Pemasok</span>
        <i class="fa fa-briefcase menu-icon"></i>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->role . '.barang.index') }}">
        <span class="menu-title">Barang</span>
        <i class="fa fa-archive menu-icon"></i>
    </a>
</li>
@endif

                                </ul>
                        </nav>
                        <!--      Content Isi Template -->
                        <!-- partial -->
                        <div class="main-panel">
                                <!-- content-wrapper ends -->