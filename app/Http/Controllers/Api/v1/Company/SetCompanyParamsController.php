<?php

namespace App\Http\Controllers\Api\v1\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetCompanyParamsController extends Controller
{
    public function __invoke(Request $request)
    {
        return new JsonResponse(['message' => $request->all()], Response::HTTP_OK);
    }
}
