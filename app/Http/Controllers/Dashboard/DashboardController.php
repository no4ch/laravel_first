<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $tests = Test::select('id', 'name', 'updated_at')
      ->with('questions.answers:id,question_id,answer,updated_at')
      ->orderBy('id', 'desc')->paginate(5);

    return view('dashboard.index', compact('tests'));
  }
}
