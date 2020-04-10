@php

use App\Models\Question;
use App\Models\Test;


$questions = Question::select('id', 'test_id', 'question', 'created_at')
        ->with('test')
        ->orderBy('test_id', 'desc')
        ->paginate(15);

$q = Test::select('*')
  ->with('questions')
  ->orderBy('id', 'asc')
  ->limit(1)
  ->paginate(15);

//dd($q);

foreach ($q as $qq){
  echo $qq->name . "<br>";
  //echo $qq->questions. "<br>";

  foreach ($qq->questions as $ver){
    echo $ver->id . "<br>";
  }
}
@endphp
