<?php

namespace App\Http\Controllers\Users\Results;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $user = User::select('name', 'id', 'group_id', 'role')
            ->where('id', auth()->user()->id)
            ->with([
                'results' => function ($q) {
                    $q->distinct()
                        ->select('tests.name', 'tests.id as test_id', 'results.*')
                        ->join('tests', 'result_test_user.test_id', '=', 'tests.id');
                }
            ])
            ->first();
        //dd($user);

        return view('results.index', compact('user'));
    }
}
