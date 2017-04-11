<?php

function connectionToDataBase(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SernaImpresos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        return null;
    }
    else{
        return $conn;
    }
}
# Funcion login que recibe como parametro el usuario y contraseña ingresados por el usuario,
# desencripta la contraseña extraida de la base de datos y la compara com la que ingresó el usuario
function attemptLogin($userName, $remember, $userPassword){

    $conn = connectionToDataBase();

    if ($conn != null){
        $sql = "SELECT Usuario, Contrasena, Nombre, Puesto FROM Empleados WHERE Usuario='$userName' ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if(decryptPassword($row['Contrasena']) == $userPassword);{
                session_start();
                $_SESSION["Usuario"] = $row["Usuario"];
                $_SESSION["Nombre"] = $row["Nombre"];
                $_SESSION["Puesto"]  = $row["Puesto"];

                if($remember)
                    setcookie("user", $userName, time()+3600*24*30, "/", "",0);

                $_SESSION["Activity"] = time();
                return array("status" => "SUCCESS", "Usuario" => $row['Usuario'], "Nombre" => $row['Nombre'], "Contrasena" => $row['Contrasena']);
            }
        }
        else{
            $conn -> close();
            return array("status" => "USERNAME NOT FOUND");
        }
    }else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}

#Action to decrypt the password of the user
// function taken from class activity
function decryptPassword($password){
    $key = pack('H*', "bcb04b7e103a05afe34763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");

    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

    $ciphertext_dec = base64_decode($password);
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    $password = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);

    $count = 0;
    $length = strlen($password);

    for ($i = $length - 1; $i >= 0; $i --)
        if (ord($password{$i}) === 0)
            $count ++;

    $password = substr($password, 0,  $length - $count);

    return $password;
}

function attemptRegistration($nomina, $nombre, $domicilio, $colonia, $ciudad, $telefono, $cel, $email, $noimms, $rfc, $curp, $puesto, $fnacim, $fini, $salHora,$salNof,$isr, $imss, $subsidio, $infonavit, $activo,$usuario, $pass){

    $conn = connectionToDataBase();
    if($conn != null){
        $sqlVerif = "SELECT * FROM Empleados WHERE Usuario='$usuario' ";
        $sqlInsert = "INSERT INTO Empleados(Nomina, Nombre, Domicilio, Colonia, Ciudad, Telefono, Celular, Email, No_IMSS, RFC, CURP, Puesto, Fecha_Nacimiento, Fecha_Inicio, Salario_Hora, Salario_NOF, ISR, IMSS, Subsidio, Infonavit, Activo, Usuario, Contrasena)
					VALUES  ('$nomina, $nombre, $domicilio, $colonia, $ciudad, $telefono, $cel, $email, $noimms, $rfc, $curp, $puesto, $fnacim, $fini, $salHora,$salNof,$isr, $imss, $subsidio, $infonavit, $activo,$usuario, $pass')";

        $res = $conn->query($sqlVerif);

        if ($res->num_rows > 0) {
            $conn->close();
            return array("status"=>"Username already taken.");
        }
        else{
            var_dump($sqlInsert);
            if (mysqli_query($conn, $sqlInsert)){
                $conn->close();
                session_start();
                $_SESSION["Nomina"] = $nomina;
                $_SESSION["Nombre"] = $nombre;
                $_SESSION["Puesto"]  = $puesto;
                $_SESSION["Activity"] = time();

                return array("status"=>"SUCCESS");
            }
            else {
                $conn->close();
                return array("status"=>"Something went wrong on the server.");
            }
        }
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}