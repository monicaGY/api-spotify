<?php

namespace Category\Application\Handler;

use Category\Application\Transform\TransformerCategories;
use Category\Domain\UseCase\ListCategoriesUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class ListCategoriesHandler
{
    public function __construct(
        private readonly ListCategoriesUseCase $listCategories,
        private readonly TransformerCategories $transformer,
    ){    }

    public function handle(): JsonResponse
    {
        try{

            return $this->transformer->transform($this->listCategories->execute());

        }catch (Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
