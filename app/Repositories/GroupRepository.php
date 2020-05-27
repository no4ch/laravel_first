<?php

namespace App\Repositories;

use App\Models\Group;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class GroupRepository.
 */
class GroupRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Group::class;
    }

    public function getGroups()
    {
        return Group::all();
    }
}
