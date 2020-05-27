<?php

namespace App\Repositories;

use App\Models\Test;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class TestRepository.
 */
class TestRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Test::class;
    }

    public function getTestForDashboard(int $id)
    {
        return Test::select('id', 'name', 'updated_at', 'status')
            ->where('id', $id)
            ->with('questions.answers:id,question_id,answer,status,updated_at')
            ->with('questions.file:id,path')
            ->with('questions:id,test_id,file_id,question,updated_at')
            ->firstOrFail();
    }

    public function getTestsForDashboard()
    {
        return Test::select('id', 'name', 'updated_at', 'status')
            ->with('questions.answers:id,question_id,answer,status,updated_at')
            ->with('questions.file:id,path')
            ->with('questions:id,test_id,file_id,question,updated_at')
            ->orderBy('id', 'desc');
    }
}
