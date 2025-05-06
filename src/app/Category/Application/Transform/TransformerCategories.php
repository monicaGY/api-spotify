<?php

namespace Category\Application\Transform;

use Illuminate\Http\JsonResponse;

class TransformerCategories
{
    public function transform(array $categories): JsonResponse
    {
        return response()->json([
            'categories' => array_map(function ($category) {return $category->toArray();}, $categories)
        ]);
    }

}
