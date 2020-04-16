<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $tests = Test::select('id', 'name', 'updated_at', 'status')
      ->with('questions.answers:id,question_id,answer,status,updated_at')
      ->with('questions:id,test_id,question,updated_at')
      ->orderBy('id', 'desc')
      ->paginate(5);

    return view('dashboard.index', compact('tests'));
  }
}
