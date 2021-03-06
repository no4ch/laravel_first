<?php

namespace App\Http\Controllers\Dashboard\Tests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\StoreRequest;
use App\Http\Requests\Test\UpdateRequest;
use App\Models\Test;
use App\Repositories\TestRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class TestController extends Controller
{
    private $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }
    /**
     * Получение списка тестов
     *
     * @return RedirectResponse
     */
    public function index()
    {
        //$tests = Test::select('*')->orderBy('id', 'desc')->paginate(10);

        return redirect()->route('dashboard.');
        //return view('dashboard.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('dashboard.tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->only(['name', 'status']);

        Test::create($data);
        session()->flash('success', 'Test added successfully');

        return redirect()->route('dashboard.tests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id)
    {
        $test = $this->testRepository->getTestForDashboard($id);

        return view('dashboard.tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Test  $test
     * @return View
     */
    public function edit(Test $test)
    {
        return view('dashboard.tests.edit', compact('test'));
    }

    public function update(UpdateRequest $request, Test $test)
    {
        $data = $request->only(['name', 'description', 'status']);

        $test->update($data);
        session()->flash('success', "Test #$test->id updated successfully");

        return redirect()->route('dashboard.');
    }

    public function destroy(Test $test)
    {
        $test->delete();
        session()->flash('success', 'Test was deleted successfully');

        return redirect()->route('dashboard.');
    }
}
