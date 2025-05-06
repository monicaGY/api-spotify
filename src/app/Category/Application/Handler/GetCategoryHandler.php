<?php

namespace Category\Application\Handler;

use Category\Application\Transform\TransformCategory;
use Category\Domain\UseCase\GetCategoryUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class GetCategoryHandler
{
    public function __construct(
        private readonly GetCategoryUseCase $getCategory,
        private readonly TransformCategory $transformer,
    ){    }

    public function handle(string $id): JsonResponse
    {
        try{
            return $this->transformer->transform($this->getCategory->execute($id));
        }catch (Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
