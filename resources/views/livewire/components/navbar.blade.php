<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-3 fw-bold">
            SGT
        </span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="{{ route('home.index') }}" class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}">
                Home
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('tarea.index') }}" class="nav-link {{ request()->routeIs('tarea.index') ? 'active' : '' }}">
                Tareas
            </a>
        </li>
    </ul>
</header>
