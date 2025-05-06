<?php

namespace Category\Infrastructure\Entrypoint\Http;

use App\Http\Controllers\Controller;
use Category\Application\Handler\ListCategoriesHandler;
use Category\Application\Transform\TransformerCategories;
use Category\Domain\UseCase\ListCategoriesUseCase;
use Category\Infrastructure\Persistence\Spotify\ApiSpotifyCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
