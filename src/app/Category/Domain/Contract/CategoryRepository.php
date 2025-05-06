<?php

namespace Category\Domain\Contract;

interface CategoryRepository
{
    public function getAll();
    public function get($id);

}
