<?php

declare(strict_types=1);

namespace BattleSnake\Game;

use BattleSnake\Game\Snake\Body;
use BattleSnake\Game\Snake\Head;

class Snake
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $latency,
        public readonly int $health,
        public readonly Body $body,
        public readonly Head $head,
        public readonly int $length
    )
    {
    }
}
