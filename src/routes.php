<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    $controller = new NoteController();
    return NoteController::firstTest($request,$response);
});

$app->post('/registeruser', function (Request $request, Response $response) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/registeruser' route");

    // Render index view
    return UserController::registerUser($request,$response);
});


