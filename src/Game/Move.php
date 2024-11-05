<?php

declare(strict_types=1);

namespace BattleSnake\Game;

enum Move: string
{
    case UP = 'up';
    case DOWN = 'down';
    case LEFT = 'left';
    case RIGHT = 'right';
}
