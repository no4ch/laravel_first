<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;

  class UsersController extends Controller
  {
    private $users = [
      [
        'name'=>'Jameson Sanders',
        'review'=>'You high bed wish help call draw side. We leaf to snug on no need. As so seeing latter he should thirty whence. Limits far yet turned highly repair parish talked six. Secure shy favour length all twenty denote. P',
        'stars'=>5
      ],
      [
        'name'=>'Jorge Lopez',
        'review'=>'Sentiments two occasional affronting solicitude travelling and one contrasted. At principle perfectly by sweetness do. Decisively advantages nor expression unpleasing she led met. Considered discovered ye sentiments projecting entreaties of',
        'stars'=>5
      ],
      [
        'name'=>'Maximiliano Richardson',
        'review'=>'He in sportsman household otherwise it perceived instantly. Girl quit if case mr sing as no have. Fat new smallness few supposing suspicion two. Ecstatic elegance gay but disposed. Took sold add play may none him',
        'stars'=>5
      ],
      [
        'name'=>'Zakary Richardson',
        'review'=>'Hard do me sigh with west same lady. Made neat an on be gave show snug tore. Pain son rose more park way that. Fat new smallness few supposing suspicion two. Any delicate you how kindness horrible outlived servants. Any delicate you how kindn',
        'stars'=>5
      ],
      [
        'name'=>'Paul Hill',
        'review'=>'Agreeable promotion eagerness as we resources household to distrusts. Uncommonly no it announcing melancholy an in. Mirth learn it he given. At none neat am do over will. Small for ask shade water manor think men begin. Girl quit if case mr sing as',
        'stars'=>5
      ],
      ];

    public function index()
    {
      $users = $this->users;
      //$users = [];
      return view('users.index', compact('users'));
    }
  }
