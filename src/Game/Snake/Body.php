<?php

declare(strict_types=1);

namespace BattleSnake\Game\Snake;

use BattleSnake\Game\Position;

class Body
{
    public array $parts = [];
    public function __construct(
        array $parts
    )
    {
        foreach ($parts as $part) {
            $this->parts[] = new Position($part['x'], $part['y']);
        }
    }
}
