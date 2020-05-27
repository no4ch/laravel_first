<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Repositories\GroupRepository;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {
        //dd(Auth::user());
        $user = Auth::user();

        return view('users.index', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        $user = Auth::user();

        $data = $request->only(['name', 'email']);
        if (!empty($request['new-password']) && !empty($request['old-password'])) {
            //if no empty
            if (Hash::check($request['old-password'], $user->getAuthPassword())) {
                //if wrong old password
                $data['password'] = Hash::make($request['new-password']);
            } else {
                session()->flash('danger', "The user was not updated because the old password was entered incorrectly");
                return redirect()->route('profile');
            }
        }

        $user->update($data);
        session()->flash('success', "User profile updated successfully");

        return redirect()->route('profile');
    }

    public function home()
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
