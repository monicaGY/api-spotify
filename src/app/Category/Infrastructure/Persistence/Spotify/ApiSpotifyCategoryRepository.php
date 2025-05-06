<?php

namespace Category\Infrastructure\Persistence\Spotify;

use Category\Domain\Contract\CategoryRepository;
use Category\Domain\Model\Category;
use Category\Domain\ValueObject\Icons;
use Shared\Infrastructure\Persistence\Spotify\ApiSpotify;

class ApiSpotifyCategoryRepository extends ApiSpotify implements CategoryRepository
{

    public function getAll(): array
    {
        $categories = $this->request('GET', 'browse/categories');
        return array_map(function ($category) { return $this->createCategory($category); }, $categories['categories']['items']);
    }
    private function createCategory($category): Category
    {
        return new Category(
            $category['href'],
            $category['id'],
            $category['name'],
            new Icons($category['icons']),
        );
    }
}
