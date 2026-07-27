<div class="sidebar text-white p-3">
    <h4 class="fw-bold text-center mb-4">MIO-IMMS</h4>

    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>

        <li class="nav-item mt-3">
            <small class="text-uppercase text-secondary">Master Data</small>
        </li>

        <li class="nav-item">
            <a href="{{ route('master-data.departments.index') }}"
               class="nav-link text-white {{ request()->routeIs('master-data.departments.*') ? 'active' : '' }}">
                <i class="bi bi-building me-2"></i>
                Departments
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('master-data.employees.index') }}"
               class="nav-link text-white {{ request()->routeIs('master-data.employees.*') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i>
                Employees
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('master-data.equipment-categories.index') }}"
               class="nav-link text-white {{ request()->routeIs('master-data.equipment-categories.*') ? 'active' : '' }}">
                <i class="bi bi-tags me-2"></i>
                Equipment Categories
            </a>
        </li>

        <li class="nav-item mt-3">
            <small class="text-uppercase text-secondary">Inventory</small>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link text-white">
                <i class="bi bi-pc-display me-2"></i>
                Equipment
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link text-white">
                <i class="bi bi-tools me-2"></i>
                Maintenance
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link text-white">
                <i class="bi bi-file-earmark-text me-2"></i>
                Reports
            </a>
        </li>
    </ul>
</div>