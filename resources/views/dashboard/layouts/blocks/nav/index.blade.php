<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('dashboard.') }}">
          <span data-feather="home"></span>Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Actions</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.tests.create') }}">
              <span data-feather="file-text"></span>
              Add new test
            </a>
          </li>
        </ul>
  </div>
</nav>
