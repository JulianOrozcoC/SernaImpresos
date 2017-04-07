<?php

header('Content-type: application/json');
require_once __DIR__ . '/dataLayer.php';

$action = $_POST["action"];

switch($action) {
    case "LOGIN" :
        login();
        break;
}

function login(){
    $userName = $_POST["Usuario"];
    $userPassword = $_POST["Contrasena"];
    $remember = $_POST["remember"];

    $result = attemptLogin($userName, $remember, $userPassword);

    if ($result["status"] == "SUCCESS")
        echo json_encode(array("message" => "Login Successful"));

    else{
        header('HTTP/1.1 500' . $result["status"]);
        die($result["status"]);
    }
}