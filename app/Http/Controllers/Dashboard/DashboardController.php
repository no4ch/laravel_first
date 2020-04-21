<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $tests = Test::getTestsForDashboard()->paginate(5);

    return view('dashboard.index', compact('tests'));
  }
}
