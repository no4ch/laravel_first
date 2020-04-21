<?php

namespace App\Http\Controllers\Dashboard\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreRequest;
use App\Http\Requests\File\UpdateRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Storage;

class FileController extends Controller
{
  public function index()
  {
    $files = File::orderBy('id', 'desc')->paginate(10);

    return view('dashboard.files.index', compact('files'));
  }

  public function create()
  {
    return view('dashboard.files.create');
  }

  public function store(StoreRequest $request)
  {
    (new File)->storeFile($request);

    $files = File::paginate(5);

    return redirect()->route('dashboard.files.index');
  }

  public function show($id)
  {
    return redirect()->route('dashboard.files.index');
  }

  public function edit(File $file)
  {
    return view('dashboard.files.edit', compact('file'));
  }

  public function update(UpdateRequest $request, File $file)
  {
    $data = $request->only(['name']);
    $file->update($data);
    session()->flash('success', "Image #$file->id successfully changed");

    return redirect()->route('dashboard.files.index');
  }

  public function destroy(File $file)
  {
    Storage::delete('/public/' . $file->path);

    $file->delete();

    session()->flash('success', "Image was deleted successfully ");

    return redirect()->route('dashboard.files.index');
  }
}
