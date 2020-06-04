<?php

namespace App\Http\Controllers\Dashboard\AccessToTests;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccessToTests\StoreRequest;
use App\Models\Group;
use App\Models\Test;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Throwable;

class AccessToTestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $groups = Group::all();

        return view('dashboard.access-to-tests.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $groups = Group::all();
        $tests = Test::all();

        return view('dashboard.access-to-tests.create', compact('groups', 'tests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        try {
            $group = Group::findOrFail($request->get('group_id'));
            $test = Test::findOrFail($request->get('test_id'));

            $group->tests()->attach($test);
            session()->flash('success', "Access to the test \"$test->name\" issued to the group \"$group->name\" successfully");

            return redirect()->route('dashboard.access-to-tests.index');
        } catch (Throwable $e) {
            session()->flash('warning', "The selected test is already issued to the selected group");
            return redirect()->route('dashboard.access-to-tests.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @param  int  $group_id
     * @return RedirectResponse
     */
    public function destroy(Request $request, int $group_id)
    {
        try {
            $test = Test::findOrFail($request->get('test_id'));
            $group = Group::findOrFail($group_id);

            $group->tests()->detach($test);
            session()->flash('success', "Access deleted successfully");

            return redirect()->route('dashboard.access-to-tests.index');
        } catch (Throwable $e) {
            session()->flash('alert', "Error");

            return redirect()->route('dashboard.access-to-tests.index');
        }
    }
}
