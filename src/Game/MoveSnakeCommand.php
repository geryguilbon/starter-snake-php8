<?php

declare(strict_types=1);

namespace BattleSnake\Game;

final class MoveSnakeCommand
{
    public function getNextMove(): Move
    {
        // TODO : implement the logic to determine the next move based on the current state of the game

        return Move::DOWN;
    }
}
