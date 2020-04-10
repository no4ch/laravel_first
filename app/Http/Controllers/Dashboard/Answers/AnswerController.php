<?php

namespace App\Http\Controllers\Dashboard\Answers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Answer\UpdateRequest;
use App\Models\Answer;
use Exception;
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
    $data = $request->only(['answer']);

    $answer->update($data);
    session()->flash('success', 'Answer updated successfully');

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
