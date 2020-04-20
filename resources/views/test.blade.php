@php

use App\Models\File;
use App\Models\Question;
use App\Models\Test;

$data = Question::select('*')->with('file:id,path')->get();

$test = Test::select('id', 'name')->where([['id', 1], ['status', 'completed']])
      ->with(['questions.answers:id,question_id,answer', 'questions:file:id,path'])
      ->with('questions:id,test_id,question')
      ->firstOrFail();

dd(File::select('id', 'name')->get());

@endphp
