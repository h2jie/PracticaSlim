<?php
use Slim\Http\Request;
use Slim\Http\Response;

class NoteController
{
    public function firstTest(Request $request, Response $response){

        $arrayToReturn = array('name' => 'Jose', 'edad'=> 40);
        $newResponse = $response->withJson($arrayToReturn,200);
        return $newResponse;
    }
}



