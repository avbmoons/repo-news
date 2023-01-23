<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.home') }}">
            <span data-feather="home"></span>
            Главная <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.categories') }}">
            <span data-feather="file"></span>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.news') }}">
            <span data-feather="layers"></span>
            Новости
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.users') }}">
            <span data-feather="users"></span>
            Пользователи
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.about') }}">
            <span data-feather="file-text"></span>
            О проекте
          </a>
        </li>
      </ul>
    </div>
  </nav>