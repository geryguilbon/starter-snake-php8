<?php

declare(strict_types=1);

namespace BattleSnake\Game;

class Position
{
    public function __construct(
        public readonly int $x,
        public readonly int $y
    )
    {
    }
}
