<?php

namespace App\Models;

//use http\Env\Request;
use App\Http\Requests\Result\CheckResultsRequest;

use DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $data)
 * @method static getTestsForDashboard()
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

    /**
     * @return BelongsToMany
     */
    public function results()
    {
        return $this->belongsToMany(Result::class, 'result_test_user');
    }

    /**
     * @return BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'result_test_user');
    }

    public function checkResults(CheckResultsRequest $request)
    {
        //get an array of answers
        $answers = $request->get('answers');

        $test_id = $request->get('id');

        $test = Test::select('id', 'name')
            ->where('id', $test_id)
            ->with(['questions.answers' => function ($q) {
                $q->select('id', 'question_id', 'answer')
                    ->where('status', 'true');
            }
            ])
            ->with('questions:id,test_id,question')
            ->firstOrFail();

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
        
        $result_data['answers'] = count($test->questions);
        $result_data['right_answers'] = $result;
        $result_data['percent'] = $result / count($test->questions) * 100;

        $resultUser = Result::create($result_data);

        DB::table('result_test_user')->insert([
            'user_id' => auth()->id(),
            'test_id' => $test_id,
            'result_id' => $resultUser->id
        ]);

        //[$result, "Итерации $i"]
        return response()->json($result, 200);
    }

}
