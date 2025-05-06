<?php

namespace Category\Infrastructure\Entrypoint\Http;

use App\Http\Controllers\Controller;
use Category\Application\Handler\GetCategoryHandler;
use Category\Application\Handler\ListCategoriesHandler;
use Category\Application\Transform\TransformCategory;
use Category\Application\Transform\TransformerCategories;
use Category\Domain\UseCase\GetCategoryUseCase;
use Category\Domain\UseCase\ListCategoriesUseCase;
use Category\Infrastructure\Persistence\Spotify\ApiSpotifyCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * List Categories
     */
    public function index(): JsonResponse
    {
        return (new ListCategoriesHandler(
            new ListCategoriesUseCase(
                new ApiSpotifyCategoryRepository()
            ),
            new TransformerCategories()
        ))->handle();
    }

    /**
     * Not available - Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Get Category by ID
     */
    public function show(string $id): JsonResponse
    {
        return (new GetCategoryHandler(
            new GetCategoryUseCase(
                new ApiSpotifyCategoryRepository()
            ),
            new TransformCategory()
        ))->handle($id);
    }

    /**
     * Not available - Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Not available - Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
