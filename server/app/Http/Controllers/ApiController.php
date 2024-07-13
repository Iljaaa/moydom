<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiSearchRequest;
use App\Http\Resources\ReesterInformationResource;
use App\Services\Cadastre\CadastreService;

class ApiController extends Controller
{
    //
    public function search(ApiSearchRequest $request, CadastreService $service)
    {
        $result = $service->request($request->code);
        if (!$result->isSuccess()) {
            return response()->json([
                'success' => false,
                'errorCode' => $result->getErrorCode(),
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => new ReesterInformationResource($result->getInformation()),
        ]);
    }

}