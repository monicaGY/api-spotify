<?php

namespace Category\Domain\ValueObject;

class Icons
{
    /**
     * @var Icon[]
     */
    private array $icons;
    public function __construct(array $icons)
    {
        $this->icons = array_map(function ($icon) {
            return new Icon(
                $icon['width'],
                $icon['height'],
                $icon['url'],
            );
        },$icons);
    }
    public function toArray(): array
    {
        return array_map(function ($icon) {return $icon->toArray(); }, $this->icons);
    }

}
