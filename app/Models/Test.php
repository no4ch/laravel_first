<?php

namespace App\Models;

//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $data)
 */
class Test extends Model
{
  /**
   * Таблица, связанная с моделью.
   *
   * @var string
   */
  //protected $table = 'tests';


  protected $fillable = ['name', 'status'];

  /**
   * Get the parent of the activity feed record.
   */
  public function parentable()
  {
    return $this->morphTo();
  }

  /**
   * @param  Builder  $query
   * @return Builder
   */
  public function scopeGetTests(Builder $query)
  {
    return $query->select('id', 'name')
      ->withCount('questions')
      ->where('status', 'completed')
      ->orderBy('id', 'desc');
  }

  /**
   * @return HasMany
   */
  public function questions()
  {
    return $this->hasMany(Question::class);
  }

  public function checkResults(Request $request)
  {
    //get an array of answers
    $answers = json_decode($request->answers);

    $test_id = $request->id;

    $test = Test::select('id', 'name')->where('id', $test_id)->with([
        'questions.answers' => function ($q) {
          $q->select('id', 'question_id', 'answer')->where('status', 'true');
        }
      ])->with('questions:id,test_id,question')->first();

    //if not found
    if (empty($test->id)) {
      return response()->json('error', 200);
    }

    $i = 0;
    $result = 0;

    foreach ($test->questions as $question) {
      foreach ($question->answers as $answer) {
        if ($answer->id == $answers[$i]) {
          $result++;
        }
      }
      $i++;
    }

    //[$result, "Итерации $i"]
    return response()->json($result, 200);
  }
}
