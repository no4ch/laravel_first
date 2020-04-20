@extends('dashboard.layouts.default')

@section('title', 'Files')

@section('dashboard-content')
  @parent
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('dashboard.files.index') }}">Files</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add file</li>
    </ol>
  </nav>

  <div class="mt-3">
    <form action="{{ route('dashboard.files.update', $file->id) }}" method="post">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $file->name ?? null }}">
          </div>
        </div>
      </div>
      <br>
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      @method('patch')
      @csrf
      <button type="submit" class="btn btn-primary mb-2">Upload file</button>
    </form>
  </div>
@endsection
