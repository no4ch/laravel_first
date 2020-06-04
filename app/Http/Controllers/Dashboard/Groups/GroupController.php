<?php

namespace App\Http\Controllers\Dashboard\Groups;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use App\Repositories\GroupRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class GroupController extends Controller
{
    protected $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $groups = $this->groupRepository->getGroups();

        return view('dashboard.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->only(['name']);

        Group::create($data);
        session()->flash('success', 'Group added successfully');

        return redirect()->route('dashboard.groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function show(int $id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Group  $group
     * @return Application|Factory|View
     */
    public function edit(Group $group)
    {
        return view('dashboard.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Group  $group
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Group $group)
    {
        $data = $request->only(['name']);

        $group->update($data);
        session()->flash('success', "Group #$group->id updated successfully");

        return redirect()->route('dashboard.groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Group  $group
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Group $group)
    {
        $group->delete();
        session()->flash('success', 'Group was deleted successfully');

        return redirect()->route('dashboard.groups.index');
    }
}
