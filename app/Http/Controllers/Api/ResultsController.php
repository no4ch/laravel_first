<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param  Request  $request
   * @return JsonResponse
   */
  public function checkResults(Request $request)
  {
    return (new Test)->checkResults($request);
  }
}
