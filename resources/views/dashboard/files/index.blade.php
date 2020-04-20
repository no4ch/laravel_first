@extends('dashboard.layouts.default')

@section('title', 'Files')

@section('dashboard-content')
  @parent
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Files</li>
    </ol>
  </nav>

  <h1>Files page</h1>

  <a href="{{ route('dashboard.files.create') }}" class="btn btn-primary">Add new image</a>

  <hr>

  <table class="table table-striped">
    <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Size</th>
      <th>Mime Type</th>
      <th>Updated_at</th>
      <th>Actions</th>
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
          <a href="{{ route('dashboard.files.edit', $file->id) }}" class="badge badge-primary pl-2 pr-2 pt-1 pb-1">Edit</a>
          <form id="destroy-form" action="{{ route('dashboard.files.destroy', $file->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="badge badge-danger pl-2 pr-2 pt-1 pb-1" type="submit">Delete</button>
          </form>
        </td>
      </tr>
    @empty
      <div class="alert-danger">
        No files in database
      </div>
    @endforelse
    </tbody>
  </table>

  {{ $files->links() }}
@endsection
