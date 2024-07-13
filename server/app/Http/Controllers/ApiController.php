<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiSearchRequest;
use App\Http\Resources\ReesterInformationResource;
use App\Services\Cadastre\CadastreService;
use Illuminate\Http\Request;
//use Tymon\JWTAuth\Exceptions\JWTException;
//use Tymon\JWTAuth\Facades\JWTAuth;

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

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }
}