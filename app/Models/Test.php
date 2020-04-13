<?php

  namespace App\Models;

  use http\Env\Request;
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


    protected $fillable = ['name'];

    /**
     * Get the parent of the activity feed record.
     */
    public function parentable()
    {
      return $this->morphTo();
    }

    /**
     * @param  Builder  $query
     * @return Collection
     */
    public function scopeGetTests(Builder $query)
    {
      return $query->select('id', 'name')->withCount('questions')->orderBy('id', 'desc')->get();
    }

    /**
     * @return HasMany
     */
    public function questions()
    {
      return $this->hasMany(Question::class);
    }

  }
