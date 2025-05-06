<?php

namespace Category\Application\Transform;

use Illuminate\Http\JsonResponse;

class TransformCategory
{
    public function transform($category): JsonResponse
    {
        return response()->json([
            'category' => $category->toArray()
        ]);
    }

}
