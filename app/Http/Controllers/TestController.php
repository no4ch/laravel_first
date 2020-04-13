<?php

namespace App\Http\Controllers;

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
    return view('welcome');
  }

}
