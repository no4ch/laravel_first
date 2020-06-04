<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Result\CheckResultsRequest;
use App\Models\Test;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  CheckResultsRequest  $request
     * @return JsonResponse
     */
  public function checkResults(CheckResultsRequest $request)
  {
    return (new Test)->checkResults($request);
  }
}
