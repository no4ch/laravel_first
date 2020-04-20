<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index()
  {
    $tests = Test::getTests()->paginate(5);

    return view('tests.index', compact('tests'));
  }

  public function show($id)
  {
    $test = Test::select('id', 'name')->where([['id', $id], ['status', 'completed']])
      ->with('questions.answers:id,question_id,answer')
      ->with('questions.file:id,path')
      ->with('questions:id,test_id,file_id,question')
      ->firstOrFail();
    //заделать scopeGetTest
    //    dd($test);
    return view('tests.show', compact('test'));
  }
}
