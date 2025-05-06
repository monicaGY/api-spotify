<?php

namespace Category\Domain\ValueObject;

class Icon
{
    public function __construct(
        private readonly int $width,
        private readonly int $height,
        private readonly string $url,
    ){    }
    public function toArray(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'url' => $this->url,
        ];
    }

}
