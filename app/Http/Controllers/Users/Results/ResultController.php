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
            ->with(['tests.results' => function($q) {
                $q->where('group_id', auth()->user()->group_id)
                ->where('user_id', auth()->user()->id);
            }])
            ->with(['tests' => function($q) {
                $q->distinct('tests.id');
            }])
            ->first();
        //dd($user);

        return view('results.index', compact('user'));
    }
}
