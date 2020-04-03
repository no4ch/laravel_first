@php
  use Illuminate\Support\Facades\DB;
  use App\Models\User;
  use App\Models\Test;
  //$users = DB::table('users')->select('email', 'name as Имя')->get();

  //$users = User::select('name as Имя', 'email')->where('id', '>=', '2')->get();

  //var_dump($users);

  //$test = Test::create(['name'=>'First now', 'description'=>"descr firsadadadat"]);
  //$test = Test::find(3);

  //$test->name = "new name dadad";

  //$test->save();

  //$test->fill(['name'=>'First', 'description'=>"descr first"]);
  //$tests = Test::select('name')->get();


@endphp

@foreach($user as $u)
  <p>{{ $u->name }}: {{ $u->email }}</p>
@endforeach

