<?php

namespace App\Http\Controllers\Dashboard\Answers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Answer\StoreRequest;
use App\Http\Requests\Answer\UpdateRequest;
use App\Models\Answer;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AnswerController extends Controller
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
   * @param $question_id
   * @return View
   */
  public function create($question_id): View
  {
    return view('dashboard.answers.create', compact('question_id'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param $question_id
   * @param  StoreRequest  $request
   * @return RedirectResponse
   */
  public function store($question_id, StoreRequest $request): RedirectResponse
  {
    $data = $request->only('answer', 'status') + ['question_id' => $question_id];

    Answer::create($data);
    session()->flash('success', "Answer added successfully in question #$question_id");

    return redirect()->route('dashboard.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return RedirectResponse
   */
  public function show($id)
  {
    return redirect()->route('dashboard.');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  Answer  $answer
   * @return View
   */
  public function edit(Answer $answer)
  {
    return view('dashboard.answers.edit', compact('answer'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  UpdateRequest  $request
   * @param  Answer  $answer
   * @return RedirectResponse
   */
  public function update(UpdateRequest $request, Answer $answer)
  {
    $data = $request->only(['answer', 'status']);
    //dd($data);
    $answer->update($data);
    session()->flash('success', "Answer #$answer->id for question #$answer->question_id  successfully changed");

    return redirect()->route('dashboard.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  Answer  $answer
   * @return RedirectResponse
   * @throws Exception
   */
  public function destroy(Answer $answer)
  {
    $answer->delete();
    session()->flash('success', 'Answer was deleted successfully');

    return redirect()->route('dashboard.');
  }
}
