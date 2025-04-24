<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                                <li class="nav-item">
                                        <a href="{{ route('dashboard') }}" class="nav-link">
                                                <i class="nav-icon fas fa-home"></i>
                                                <p>Dashboard</p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="{{ route('bakmie.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-utensils"></i>
                                                <p>Data Bakmie</p>
                                        </a>
                                </li>
                        </ul>
                </nav>
        </div>
</aside>