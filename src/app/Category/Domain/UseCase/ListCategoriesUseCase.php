<?php

namespace Category\Domain\UseCase;

use Category\Domain\Contract\CategoryRepository;

class ListCategoriesUseCase
{
    public function __construct(
        private readonly CategoryRepository $repository
    ){    }
    public function execute()
    {
        return $this->repository->getAll();
    }

}
