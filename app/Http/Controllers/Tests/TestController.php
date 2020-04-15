<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index()
  {
    $tests = Test::getTests();

    return view('tests.index', compact('tests'));
  }

  public function show($id)
  {
    $test = Test::select('id', 'name')->where('id', $id)
      ->with('questions.answers:id,question_id,answer')
      ->with('questions:id,test_id,question')
      ->firstOrFail();
    //заделать scopeGetTest
    //    dd($test);
    return view('tests.show', compact('test'));
  }
}
