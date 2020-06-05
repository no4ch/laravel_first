@extends('dashboard.layouts.default')

@section('title', 'Файли')

@section('dashboard-content')
  @parent
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
      <li class="breadcrumb-item active" aria-current="page">Файли</li>
    </ol>
  </nav>

  <h1>Сторінка файлів</h1>

  <hr>

  <table class="table table-striped">
    <thead>
    <tr>
      <th>#</th>
      <th>Ім'я</th>
      <th>Розмір</th>
      <th>Тип</th>
      <th>Обновлений в</th>
      <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    @forelse($files as $file)
      <tr>
        <td>{{ $file->id }}</td>
        <td><a href="{{ asset('storage/' . $file->path) }}" class="btn-link" target="_blank">{{ $file->name }}</a></td>
        <td>{{ round($file->size/1024, 1) }} KB</td>
        <td>{{ $file->mime_type }}</td>
        <td>{{ $file->updated_at }}</td>
        <td>
          <a href="{{ route('dashboard.files.edit', $file->id) }}" class="badge badge-primary pl-2 pr-2 pt-1 pb-1">Редагувати</a>
        </td>
      </tr>
    @empty
      <div class="alert-danger">
        Файли відстні в базі
      </div>
    @endforelse
    </tbody>
  </table>

  {{ $files->links() }}
@endsection
