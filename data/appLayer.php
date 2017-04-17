<?php

header('Content-type: application/json');
require_once __DIR__ . '/dataLayer.php';

$action = $_POST["action"];

switch($action) {
    case "LOGIN" : login();
        break;
    case "REGISTER" : Registration();
        break;
    case "LoadTableEmpleados" : LoadTableEmpleado();
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
    $pass = $_POST['Contrasena'];

    $result = attemptRegistration($nomina, $nombre, $domicilio, $colonia, $ciudad, $telefono, $cel, $email, $noimms, $rfc, $curp, $puesto, $fnacim, $fini, $salHora,$salNof,$isr, $imss, $subsidio, $infonavit, $activo,$usuario, $pass);

    if ($result["status"] == "SUCCESS"){
        echo json_encode(array("message" => "Registration Successful"));
    }
    else{
        header('HTTP/1.1 500' . $result["status"]);
        die($result["status"]);
    }
}
function LoadTableEmpleado(){

    $result = TableEmpleado();

    if ($result["status"] == "SUCCESS"){
        echo json_encode($result["Tabla"]);
        //echo json_encode(array($comentario));
    }   
    else{
        header('HTTP/1.1 500' . $result["status"]);
        die($result["status"]);
    }

}

?>