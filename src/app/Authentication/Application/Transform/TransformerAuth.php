<?php

namespace Authentication\Application\Transform;

use Illuminate\Http\JsonResponse;

class TransformerAuth
{
    public function transform($token): JsonResponse
    {
        if($token){
            return response()->json([
                'token' => $token,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Incorrect email or password'
        ], 401);
    }

}
