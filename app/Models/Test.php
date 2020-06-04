<?php

namespace App\Models;

//use http\Env\Request;
use App\Http\Requests\Result\CheckResultsRequest;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
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
     * @return HasMany
     */
    public function results()
    {
        return $this->hasMany(Result::class);
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
        return $this->belongsToMany(User::class, 'results');
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
        //результаты в бд
        $result_data['answers'] = count($test->questions);
        $result_data['right_answers'] = $result;
        $result_data['percent'] = $result / count($test->questions) * 100;
        $result_data['group_id'] = auth()->user()->group_id;
        $result_data['user_id'] = auth()->user()->id;
        $result_data['test_id'] = $test_id;

        Result::create($result_data);

        //[$result, "Итерации $i"]
        return response()->json($result, 200);
    }

}
