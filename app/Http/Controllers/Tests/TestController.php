<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Test;
use DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = (Group::find(auth()->user()->group_id))->tests->pluck('id');

        $tests = Test::where('status', 'completed')
            ->whereIn('id', $tests)
            ->get();

        return view('tests.index', compact('tests'));
    }

    public function show(int $id)
    {
        if (DB::table('group_test')
            ->where([
            ['group_id', auth()->user()->group_id],
            ['test_id', $id]
        ])->exists()) {

            $test = Test::select('id', 'name')->where([
                    ['id', $id], ['status', 'completed']
                ])
                ->with('questions.answers:id,question_id,answer')
                ->with('questions.file:id,path')
                ->with('questions:id,test_id,file_id,question')
                ->firstOrFail();

            return view('tests.show', compact('test'));
        }
        else return abort(404);
    }
}
