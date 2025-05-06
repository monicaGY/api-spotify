<?php

namespace Category\Domain\UseCase;

use Category\Domain\Contract\CategoryRepository;

class GetCategoryUseCase
{
    public function __construct(
        private readonly CategoryRepository $repository
    ){    }
    public function execute($id)
    {
        return $this->repository->get($id);
    }

}
