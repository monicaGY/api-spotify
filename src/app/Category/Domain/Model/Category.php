<?php

namespace Category\Domain\Model;

use Category\Domain\ValueObject\Icons;

class Category
{
    public function __construct(
        private readonly string $href,
        private readonly string $id,
        private readonly string $name,
        private readonly Icons $icons,
    ){    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'href' => $this->href,
            'icons' => $this->icons->toArray(),
        ];
    }

}
