<?php

namespace App\Http\Controllers\Dashboard\Results;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Result;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $results = Group::with([
            'users.results' => function ($q) {
                $q
                    ->select('tests.name', 'tests.id as test_id', 'results.*')
                    ->join('tests', 'result_test_user.test_id', '=', 'tests.id');
            }
        ])->get();

//        $results = Group::with([
//            'users.results.tests' => function ($q) {
//                //$q->distinct()->first();
//            }])
//            ->with([
//                'users.results' => function ($q) {
//                    //$q->distinct()->select( 'results.*');
//                }
//            ])
//            ->with('users')
//            ->get();

        return view('dashboard.results.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
