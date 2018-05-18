<?php
use Slim\Http\Request;
use Slim\Http\Response;
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

function connectDB(){
    $conn = mysqli_connect("localhost","root","","slim_bbdd");
    if ($conn->connect_error){
        die("Failed to connecto to database");
    }else{
        return $conn;
    }

}

