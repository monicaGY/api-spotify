<?php

namespace Authentication\Application\Transform;

use Illuminate\Http\JsonResponse;

class TransformerRegister
{
    public function transform($token): JsonResponse
    {
        return response()->json([
            'token' => $token,
        ]);
    }

}
