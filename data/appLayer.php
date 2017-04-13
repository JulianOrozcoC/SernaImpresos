<?php

header('Content-type: application/json');
require_once __DIR__ . '/dataLayer.php';

$action = $_POST["action"];

switch($action) {
    case "LOGIN" : login();
        break;
    case "REGISTER" : Registration();
        break;
}

function login(){
    $usuario = $_POST['Usuario'];
    $contrasena = $_POST["Contrasena"];
    $remember = $_POST["remember"];

    $result = attemptLogin($usuario, $remember, $contrasena);

    if ($result["status"] == "SUCCESS")
        echo json_encode(array("message" => "Login Successful"));

    else{
        header('HTTP/1.1 500' . $result["status"]);
        die($result["status"]);
    }
}

function Registration(){
    $nomina = $_POST['Nomina'];
    $nombre = $_POST['Nombre'];
    $domicilio = $_POST['Domicilio'];
    $colonia = $_POST['Colonia'];
    $ciudad = $_POST['Ciudad'];
    $telefono = $_POST['Telefono'];
    $cel = $_POST['Celular'];
    $email = $_POST['Email'];
    $noimms = $_POST['No_IMSS'];
    $rfc = $_POST['RFC'];
    $curp = $_POST['CURP'];
    $puesto = $_POST['Puesto'];
    $fnacim = $_POST['Fecha_Nacimiento'];
    $fini = $_POST['Fecha_Inicio'];
    $salHora = $_POST['Salario_Hora'];
    $salNof = $_POST['Salario_NOF'];
    $isr = $_POST['ISR'];
    $imss = $_POST['IMSS'];
    $subsidio = $_POST['Subsidio'];
    $infonavit = $_POST['Infonavit'];
    $activo = $_POST['Activo'];
    $usuario = $_POST['Usuario'];
    $pass = encryptPassword();

    $result = attemptRegistration($nomina, $nombre, $domicilio, $colonia, $ciudad, $telefono, $cel, $email, $noimms, $rfc, $curp, $puesto, $fnacim, $fini, $salHora,$salNof,$isr, $imss, $subsidio, $infonavit, $activo,$usuario, $pass);

    if ($result["status"] == "SUCCESS"){
        echo json_encode(array("message" => "Registration Successful"));
    }
    else{
        header('HTTP/1.1 500' . $result["status"]);
        die($result["status"]);
    }
}

# Action to encrypt the password of the user
function encryptPassword() // function taken from class activity
{
    $pass = $_POST['Contrasena'];

    $key = pack('H*', "bcb04b7e103a05afe34763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    $key_size =  strlen($key);

    echo "Tamaño de la clave: " . $key_size . "\n";

    $plaintext = $pass;

    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_CBC, $iv);
    $ciphertext = $iv . $ciphertext;

    $pass = base64_encode($ciphertext);

    return $pass;
}