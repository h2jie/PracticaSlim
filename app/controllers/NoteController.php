<?php
use Slim\Http\Request;
use Slim\Http\Response;

class NoteController
{
    public static function firstTest(Request $request, Response $response, $args = []){

        $arrayToReturn = array('name' => 'Jose', 'edad'=> 40);
        //$response = $response->withJson($arrayToReturn,200);
        //$response->getBody()->write( $newResponse);
        return $response;
    }


}



