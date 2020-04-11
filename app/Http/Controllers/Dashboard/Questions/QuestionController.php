<?php

namespace App\Http\Controllers\Dashboard\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class QuestionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return RedirectResponse
   */
  public function index()
  {
    return redirect()->route('dashboard.');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @param  Test  $test
   * @return Factory|View
   */
  public function create($test_id)
  {
    return view('dashboard.questions.create', compact('test_id'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param $test_id
   * @param  StoreRequest  $request
   * @return RedirectResponse
   */
  public function store($test_id, StoreRequest $request)
  {
    $data = $request->only('question') + ['test_id' => $test_id];

    Question::create($data);
    session()->flash('success', 'Question added successfully');

    return redirect()->route('dashboard.');
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
   * @param  Question  $question
   * @return View
   */
  public function edit(Question $question)
  {
    return view('dashboard.questions.edit', compact('question'));
  }

  public function update(UpdateRequest $request, Question $question)
  {
    $data = $request->only(['question', 'test_id']);

    $question->update($data);
    session()->flash('success', 'Question updated successfully');

    return redirect()->route('dashboard.');
  }

  public function destroy(Question $question)
  {
    $question->delete();
    session()->flash('success', 'Question was deleted successfully');

    return redirect()->route('dashboard.');
  }
}
