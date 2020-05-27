<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Repositories\TestRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function index()
    {
        $tests = $this->testRepository->getTestsForDashboard()->paginate(5);

        return view('dashboard.index', compact('tests'));
    }
}
