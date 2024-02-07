<?php

declare(strict_types=1);

namespace App\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('child')]
class ChildComponent
{
    use DefaultActionTrait;

    #[LiveProp]
    public int $number;

    #[LiveProp(writable: true)]
    public string $liveId;

    #[PostMount]
    public function generateLiveId(array $data): array
    {
        $this->liveId = 'random-' . random_int(1000000, 9999999);

        return $data;
    }
}