<?php
use Slim\Http\Request;
use Slim\Http\Response;
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
$app->add(function ($request, $response, $next) {

    $conn = connectDB();

    $response->getBody()->write('BEFORE');
    $response = $next($request, $response);
    $response->getBody()->write(' AFTER');

    return $response;
});

function connectDB(){
    $conn = mysqli_connect("localhost","root","","slim_bbdd");
    if ($conn->connect_error){
        die("Failed to connecto to database");
    }else{
        return $conn;
    }

}

