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
                Categories
            </a>
        </li>

         <li class="nav-item">
            <a href="{{ route('master-data.equipment-brands.index') }}"
               class="nav-link text-white {{ request()->routeIs('master-data.equipment-brands.*') ? 'active' : '' }}">
                <i class="bi bi-tags me-2"></i>
                Brands
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('master-data.equipment-models.index') }}"
            class="nav-link {{ request()->routeIs('master-data.equipment-models.*') ? 'active' : '' }}">

                <i class="bi bi-pc-display-horizontal me-2"></i>

                Equipment Models

            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('master-data.suppliers.index') }}"
            class="nav-link {{ request()->routeIs('master-data.suppliers.*') ? 'active' : '' }}">

                <i class="bi bi-truck"></i>

                Suppliers

            </a>
        </li>

        <li class="nav-item mt-3">
            <small class="text-uppercase text-secondary">Procurement</small>
        </li>

        <li class="nav-item">
              <a href="{{ route('procurement.purchase-requests.index') }}"
            class="nav-link {{ request()->routeIs('procurement.purchase-requests.*') ? 'active' : '' }}">
                <i class="bi bi-pc-display me-2"></i>
                Purchase Requests
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link text-white">
                <i class="bi bi-tools me-2"></i>
               Delivery Receipts
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link text-white">
                <i class="bi bi-file-earmark-text me-2"></i>
                 Receiving
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