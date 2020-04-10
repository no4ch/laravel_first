<?php

  namespace App\Models;

  use http\Env\Request;
  use Illuminate\Database\Eloquent\Model;

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


    protected $fillable = ['name'];

    /**
     * Get the parent of the activity feed record.
     */
    public function parentable()
    {
      return $this->morphTo();
    }

    public function getTests()
    {
      return Test::select('id', 'name')->get();
    }

    public function questions()
    {
      return $this->hasMany(Question::class);
    }

  }
