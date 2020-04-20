<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
  protected $fillable = ['test_id', 'file_id', 'question'];


  public function test()
  {
    return $this->belongsTo(Test::class);
  }

  public function answers(){
    return $this->hasMany(Answer::class);
  }

  public function file()
  {
    return $this->belongsTo(File::class);
  }
}
