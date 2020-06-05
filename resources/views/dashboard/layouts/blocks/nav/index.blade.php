<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.') }}">
                    <span data-feather="home"></span>Головна <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.groups.index') }}">
                    <span data-feather="file-text"></span>
                    Групи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.results.index') }}">
                    <span data-feather="file-text"></span>
                    Результати
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Дії</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>

        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.tests.create') }}">
                    <span data-feather="file-text"></span>
                    Створити тест
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.files.index') }}">
                    <span data-feather="file-text"></span>
                    Переглянути файли
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.access-to-tests.index') }}">
                    <span data-feather="file-text"></span>
                    Доступи до тестів
                </a>
            </li>
        </ul>
    </div>
</nav>
