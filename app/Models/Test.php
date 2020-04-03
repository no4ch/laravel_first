<?php

  namespace App\Models;

  use http\Env\Request;
  use Illuminate\Database\Eloquent\Model;

  class Test extends Model
  {
    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    //protected $table = 'tests';

    protected $fillable = ['name', 'description'];

    public function store(Request $request)
    {

    }
  }
