<?php

use App\controllers\NoteController;

$app->get('/', NoteController::class . ':getRoute');

$app->get('/getAll', NoteController::class . ':getAll');

$app->get('/getPublic', NoteController::class . ':getPublic');

$app->get('/getOne', NoteController::class . ':getOne');

$app->post('/insert', NoteController::class . ':insert');

$app->delete('/remove', NoteController::class . ':remove');

$app->get('/getAllWithTag', NoteController::class . ':getAllWithTag');

$app->put('/addTagOnNote', NoteController::class . ':addTagOnNote');

$app->put('/deleteTagOnNote', NoteController::class . ':deleteTagOnNote');

$app->put('/updateNote', NoteController::class . ':updateNote');

$app->put('/flipPrivate', NoteController::class . ':flipPrivate');