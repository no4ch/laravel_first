<?php

namespace App\Http\Controllers;

use App\Repositories\GroupRepository;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class HomeController extends Controller
{
    private $groupRepository;


    /**
     * Create a new controller instance.
     *
     * @param  GroupRepository  $groupRepository
     */
    public function __construct(GroupRepository $groupRepository)
    {
        $this->middleware('auth');
        $this->groupRepository = $groupRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function index()
    {
        if (auth()->user()->role !== 'student') {
            $groups = $this->groupRepository->getGroups();

            return view('home', compact('groups'));
        }
        else return redirect('/tests');
    }

    public function saveGroup(Request $request)
    {
        $user = Auth::user();
        $data = $request->only(['group_id']);

        if ($user->role === 'user') {
            $data['role'] = 'student';
        }

        $user->update($data);

        return redirect('/tests');
    }
}
