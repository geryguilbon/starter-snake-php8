<?php

declare(strict_types=1);

namespace BattleSnake\Http;

use BattleSnake\Game\MoveSnakeCommand;

class Request
{
    public function handle(string $requestUri, array $inputData): void
    {
        match ($requestUri) {
            '/' => $this->indexResponse(),
            '/start' => $this->startResponse(),
            '/move' => $this->moveResponse($inputData),
            '/end' => $this->endResponse($inputData),
            default => $this->notFoundResponse(),
        };
    }

    /**
     * Implements Battlesnake API response functions.
     *
     * @see https://docs.battlesnake.com/references/api
     */

    private function indexResponse() : void
    {
        $this->outputJsonResponse([
            'apiversion' => "1",
            'author' => "",
            'color' => "#000000",
            'head' => "",
            'tail' => ""
        ]);
    }


    /**
     * Responses to requests to the /start endpoint are ignored by the Battlesnake engine, so this function outputs nothing.
     */
    private function startResponse() : void
    {
        echo '';
    }

    private function moveResponse(array $inputData) : void
    {
        $moveSnakeCommand = new MoveSnakeCommand();
        $move = $moveSnakeCommand->getNextMove();

        $this->outputJsonResponse(['move' => $move->value]);
    }

    /**
     * TODO - if you have a stateful snake, you could do finalize work here
     * Responses to requests to the /end endpoint are ignored by the Battlesnake engine, so this function outputs nothing.
     */
    private function endResponse(array $data) : void
    {
        echo '';
    }

    private function notFoundResponse() : void
    {
        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
    }

    /**
     * Utility function to output an array of response data as JSON.
     *
     * @param array $responseData Array of data to be cast to an object and encoded to JSON
     */
    private function outputJsonResponse(array $responseData) : void
    {
        $body = (object) $responseData;

        header('Content-Type: application/json');

        echo json_encode($body);
    }
}
