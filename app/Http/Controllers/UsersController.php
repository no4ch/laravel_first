<?php

  namespace App\Http\Controllers;

  use App\Models\User;
  use Illuminate\Http\Request;

  class UsersController extends Controller
  {
    public function index()
    {
      //$users = $this->users;
      $users = (new \App\Models\User)->getUsers();
      //$users = [];
      return view('users.index', compact('users'));
    }
    public function show($id){
      $user = (new \App\Models\User)->getUser($id);
      return view('test', compact('user'));
    }
  }
