<?php
/**
 * Created by PhpStorm.
 * User: HangjieHuang
 * Date: 2018/4/20
 * Time: 19:36
 */

use Slim\Http\Request;
use Slim\Http\Response;

class UserController
{

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public static function registerUser(Request $request, Response $response, $args = []){

        $body = $request->getParsedBody();
        $userName = $body['name'];
        $password = $body['password'];

        $arrayToReturn = array('name' => $userName, 'edad'=> $password);
        $response = $response->withJson($arrayToReturn,200);

        return $response;
    }

}