<?php

use BattleSnake\Http\Request;

require_once __DIR__ . '/vendor/autoload.php';

$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
$inputData = json_decode(file_get_contents('php://input'), associative: true) ?? [];

error_log('Received data: ' . print_r($inputData, true));

$request = new Request();

$request->handle($requestUri, $inputData);
