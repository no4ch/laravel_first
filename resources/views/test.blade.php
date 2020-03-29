@php
  use Illuminate\Support\Facades\DB;

  $users = DB::table('users')->select('email', 'name as Имя')->get();

  dd($users);
@endphp
