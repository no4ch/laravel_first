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
      <form action="{{ route('dashboard.files.store') }}" method="post" enctype="multipart/form-data">
        <label for="controlFile">File input</label>
        <input type="file" class="form-control-file" id="controlFile" name="image">
        <br>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @csrf
        <button type="submit" class="btn btn-primary mb-2">Upload file</button>
      </form>
    </div>
@endsection
