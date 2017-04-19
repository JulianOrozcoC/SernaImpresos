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
function attemptLogin($usuario, $remember, $userPassword){

    $conn = connectionToDataBase();

    if ($conn != null){
        $sql = "SELECT Usuario, Contrasena, Nombre, Puesto FROM Empleados WHERE Usuario='$usuario' ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            //echo strlen($row['Contrasena']);

            $savedPassword = decryptPassword($row['Contrasena']);

            # Compare the decrypted password with the one provided by the user
            if($savedPassword == $userPassword){
                session_start();
                $_SESSION["Usuario"] = $row["Usuario"];
                $_SESSION["Nombre"] = $row["Nombre"];
                $_SESSION["Puesto"]  = $row["Puesto"];

                if($remember)
                    setcookie("user", $usuario, time()+3600*24*30, "/", "",0);

                $_SESSION["Activity"] = time();
                return array("status" => "SUCCESS", "Usuario" => $row['Usuario'], "Nombre" => $row['Nombre'], "Contrasena" => $row['Contrasena']);

            }
            else {
                $conn -> close();
                return array("status" => "Password Verify Invalid");
            }
        }
        else {
            $conn -> close();
            return array("status" => "USERNAME NOT FOUND");
        }
    }else {
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}
  
  #Action to decrypt the password of the user
 function decryptPassword($password)
 {
     $key = pack('H*', "bcb04b7e103a05afe34763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
 
     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
 
     $ciphertext_dec = base64_decode($password);
     $iv_dec = substr($ciphertext_dec, 0, $iv_size);
     $ciphertext_dec = substr($ciphertext_dec, $iv_size);
 
     $password = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
 
 
     $count = 0;
     $length = strlen($password);
 
     for ($i = $length - 1; $i >= 0; $i --)
     {
         if (ord($password{$i}) === 0)
         {
             $count ;
         }
     }
 
     $password = substr($password, 0,  $length - $count);
 
     return $password;
 }
function attemptRegistrationProveedor($nombre, $RFC, $domicilio, $Telefono, $Vendedor, $Fax){


    $conn = connectionToDataBase();
    if($conn != null){
        $sqlInsert = "INSERT INTO `proveedores`(`Nombre`, `RFC`, `Domicilio`, `Telefono`, `Vendedor`, `Fax`) VALUES ('$nombre','$RFC','$domicilio','$Telefono','$Vendedor','$Fax')";

            if (mysqli_query($conn, $sqlInsert)){
                $conn->close();
                return array("status"=>"SUCCESS PROVEEDOR REG");
            }
            else {
                $conn->close();
                return array("status"=>"Something went wrong on the server.");
            }
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}

function attemptRegistration($nomina, $nombre, $domicilio, $colonia, $ciudad, $telefono, $cel, $email, $noimms, $rfc, $curp, $puesto, $fnacim, $fini, $salHora,$salNof,$isr, $imss, $subsidio, $infonavit, $activo,$usuario, $pass){
  
  
      $conn = connectionToDataBase();
      if($conn != null){
         
         $hash = encryptPassword($pass);
  
          $sqlVerif = "SELECT * FROM empleados WHERE Usuario='$usuario' ";
          $sqlInsert = "INSERT INTO empleados(Nomina, Nombre, Domicilio, Colonia, Ciudad, Telefono, Celular, Email, No_IMSS, RFC, CURP, Puesto, Fecha_Nacimiento, Fecha_Inicio, Salario_Hora, Salario_NOF, ISR, IMSS, Subsidio, Infonavit, Activo, Usuario, Contrasena)
                    VALUES  ('$nomina', '$nombre', '$domicilio', '$colonia', '$ciudad', '$telefono', '$cel', '$email', '$noimms', '$rfc', '$curp', '$puesto', '$fnacim', '$fini', '$salHora','$salNof','$isr', '$imss', '$subsidio', '$infonavit', '$activo','$usuario', '$hash')";
 
         $res = $conn->query($sqlVerif);
 
         if ($res->num_rows > 0) {
             $conn->close();
             return array("status"=>"Username already taken.");
         }
         else{
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
function encryptPassword($userPassword)
 {
     $key = pack('H*', "bcb04b7e103a05afe34763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
     $key_size =  strlen($key);
 
     $plaintext = $userPassword;
 
     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
     $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
 
     $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_CBC, $iv);
     $ciphertext = $iv . $ciphertext;
 
     $userPassword = base64_encode($ciphertext);
 
     return $userPassword;
 }
function TableEmpleado (){
        $conn = connectionToDataBase();

        if ($conn != null){

            $sql = "SELECT * FROM empleados";
            $result = $conn->query($sql);
            $tableEmp = array();
            while($row = $result->fetch_assoc()) {
                $salario = strval($row['Salario_Hora']);
                $response = array('Nombre' => $row['Nombre'], 'Nomina' => $row['Nomina'], 'salario' => $salario,'salarioNof' => $row['Salario_NOF'],'Puesto' => $row['Puesto'], 'Acciones' => "<button class='btn btn-xs btn-primary btn-block' data-toggle='modal'  id='editEmp' data-id='" . $row['Nombre'] . "/" . $row['Nomina'] . "/" . $row['Domicilio'] . "/" . $row['Colonia'] . "/" . $row['Ciudad'] . "/" . $row['Telefono'] . "/" . $row['Celular'] . "/" . $row['Email'] . "/" . $row['No_IMSS'] . "/" . $row['RFC'] . "/" . $row['CURP'] . "/" . $row['Puesto'] . "/" . $row['Salario_Hora'] . "/" . $row['Salario_NOF'] . "/" . $row['ISR'] . "/" . $row['IMSS'] . "/" . $row['Subsidio'] . "/" . $row['Infonavit'] . "/" . $row['Activo'] . "/" . $row['Usuario'] . "' style = 'margin-bottom: 5px;' >Editar</button><button class='btn btn-xs btn-danger btn-block' data-toggle='modal'  id='delete_emp' data-id='" . $row['Nombre'] . "/" . $row['Nomina'] . "'>Borrar</button>");
                array_push($tableEmp, $response);
            }
            $conn -> close();
            return array("status" => "SUCCESS", "empleadosTable" => $tableEmp);
            }
        else{
                $conn -> close();
                return array("status" => "CONNECTION WITH DB WENT WRONG");
            }
}

function TableProveedores (){
        $conn = connectionToDataBase();

        if ($conn != null){

            $sql = "SELECT * FROM proveedores";
            $result = $conn->query($sql);
            $tableProv = array();
            while($row = $result->fetch_assoc()) {
                $response = array('ID' => $row['id_Proveedor'], 'Nombre' => $row['Nombre'], 'RFC' => $row['RFC'], 'Domicilio' => $row['Domicilio'],'Telefono' => $row['Telefono'],'Vendedor' => $row['Vendedor'], 'Fax' => $row['Fax'], 'Acciones' => "<button class='btn btn-xs btn-primary btn-block' data-toggle='modal'  id='editProv' data-id='" . $row['id_Proveedor'] . "/" . $row['Nombre'] . "/" . $row['RFC'] . "/" . $row['Domicilio'] . "/" . $row['Telefono'] . "/" . $row['Vendedor'] . "/" . $row['Fax'] . "' style = 'margin-bottom: 5px;' >Editar</button><button class='btn btn-xs btn-danger btn-block' data-toggle='modal'  id='delete_prov' data-id='" . $row['id_Proveedor'] . "/" . $row['Nombre'] . "'>Borrar</button>");
                array_push($tableProv, $response);
            }
            $conn -> close();
            return array("status" => "SUCCESS", "proveedoresTable" => $tableProv);
            }
        else{
                $conn -> close();
                return array("status" => "CONNECTION WITH DB WENT WRONG");
            }
}

function TableOrdenesCompraData (){
        $conn = connectionToDataBase();

        if ($conn != null){

            $sql = "SELECT * FROM orden_compra";
            $result = $conn->query($sql);
            $tableOC = array();
            while($row = $result->fetch_assoc()) {
                $salario = strval($row['Salario_Hora']);
                $response = array('Nombre' => $row['Nombre'], 'Nomina' => $row['Nomina'], 'salario' => $salario,'salarioNof' => $row['Salario_NOF'],'Puesto' => $row['Puesto'], 'Acciones' => "<button class='btn btn-xs btn-primary btn-block' data-toggle='modal'  id='editEmp' data-id='" . $row['Nombre'] . "/" . $row['Nomina'] . "/" . $row['Domicilio'] . "/" . $row['Colonia'] . "/" . $row['Ciudad'] . "/" . $row['Telefono'] . "/" . $row['Celular'] . "/" . $row['Email'] . "/" . $row['No_IMSS'] . "/" . $row['RFC'] . "/" . $row['CURP'] . "/" . $row['Puesto'] . "/" . $row['Salario_Hora'] . "/" . $row['Salario_NOF'] . "/" . $row['ISR'] . "/" . $row['IMSS'] . "/" . $row['Subsidio'] . "/" . $row['Infonavit'] . "/" . $row['Activo'] . "/" . $row['Usuario'] . "' style = 'margin-bottom: 5px;' >Editar</button><button class='btn btn-xs btn-danger btn-block' data-toggle='modal'  id='delete_emp' data-id='" . $row['Nombre'] . "/" . $row['Nomina'] . "'>Borrar</button>");
                array_push($tableOC, $response);
            }
            $conn -> close();
            return array("status" => "SUCCESS", "OrdenesCompraTable" => $tableOC);
            }
        else{
                $conn -> close();
                return array("status" => "CONNECTION WITH DB WENT WRONG");
            }
    }

function attemptPostComment($nomina, $comentario){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "INSERT INTO comentarios (Nomina, Comentario)
		              VALUES  ('$nomina', '$comentario')";

        if (mysqli_query($conn,$sqlInsert)){
           /*
            $comm = "<li>
							<b> Nomina: </b> $nomina <br/>
							Comentario: $comentario <br/>
							  </li> ";
            */
            $conn->close();
            //return array("status"=>"SUCCESS", "comment" => $comm);
            return array("status"=>"SUCCESS");
        }
        else {
            $conn->close();
            return array("status"=>"Something went wrong on the server.");
        }

    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }

}

function attemptGetComments(){
    $conn = connectionToDataBase();

    if ($conn != null){

        $sql = "SELECT Nomina, Comentario FROM comentarios";
        $result = $conn->query($sql);
        $commentsBox = array();

        while($row = $result->fetch_assoc()) {
            $response = array('Nomina' => $row['Nomina'], 'Comentario' => $row['Comentario']);
            array_push($commentsBox, $response);
        }
        $conn -> close();
        return array("status" => "SUCCESS", "arrayCommentsBox" => $commentsBox);
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}

function attemptPostMantenimiento($maquina, $fecha){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "INSERT INTO mantenimiento (Maquina, Fecha)
		              VALUES  ('$maquina', '$fecha')";

        if (mysqli_query($conn,$sqlInsert)){

            $conn->close();
            return array("status"=>"SUCCESS");
        }
        else {
            $conn->close();
            return array("status"=>"Something went wrong on the server.");
        }

    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }

}

function attemptDeleteProv($Id, $Nombre){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "DELETE FROM `proveedores` WHERE `id_Proveedor` = '$Id'";

        if (mysqli_query($conn,$sqlInsert)){

            $conn->close();
            return array("status"=>"SUCCESS DELETE");
        }
        else {
            $conn->close();
            return array("status"=>"Something went wrong on the server.");
        }

    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }

}

function attemptDelete($nomina, $nombre){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "DELETE FROM `empleados` WHERE `Nomina` = '$nomina'";

        if (mysqli_query($conn,$sqlInsert)){

            $conn->close();
            return array("status"=>"SUCCESS DELETE");
        }
        else {
            $conn->close();
            return array("status"=>"Something went wrong on the server.");
        }

    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }

}

function attemptGetMantenimiento(){
    $conn = connectionToDataBase();

    if ($conn != null){

        $sql = "SELECT Maquina, Fecha FROM Mantenimiento";
        $result = $conn->query($sql);
        $commentsBox = array();

        while($row = $result->fetch_assoc()) {
            $response = array('Maquina' => $row['Maquina'], 'Fecha' => $row['Fecha']);
            array_push($commentsBox, $response);
        }
        $conn -> close();
        return array("status" => "SUCCESS", "arrayCommentsBox" => $commentsBox);
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}
function attemptPostFactura($factura, $fecha){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "INSERT INTO Facturas (Factura, Fecha)
		              VALUES  ('$factura', '$fecha')";

        if (mysqli_query($conn,$sqlInsert)){

            $conn->close();
            return array("status"=>"SUCCESS");
        }
        else {
            $conn->close();
            return array("status"=>"Something went wrong on the server.");
        }

    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }

}
function attemptGetFacturas(){
    $conn = connectionToDataBase();

    if ($conn != null){

        $sql = "SELECT Factura, Fecha FROM Facturas";
        $result = $conn->query($sql);
        $commentsBox = array();

        while($row = $result->fetch_assoc()) {
            $response = array('Factura' => $row['Factura'], 'Fecha' => $row['Fecha']);
            array_push($commentsBox, $response);
        }
        $conn -> close();
        return array("status" => "SUCCESS", "arrayCommentsBox" => $commentsBox);
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}

function attemptUpdateProveedor($Id, $nombre, $RFC, $Domicilio, $Telefono, $Vendedor, $Fax){


    $conn = connectionToDataBase();
    if($conn != null){

        $sqlUpdate = "UPDATE `proveedores` SET `Nombre`= '$nombre',`RFC`= '$RFC',`Domicilio`= '$Domicilio',`Telefono`= '$Telefono',`Vendedor`= '$Vendedor',`Fax`= '$Fax' WHERE `id_Proveedor` = '$Id'";

            if (mysqli_query($conn, $sqlUpdate)){
                $conn->close();
                return array("status"=>"SUCCESS UPDATE");
            }
            else {
                $conn->close();
                return array("status"=>"Something went wrong on the server.");
            }
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}

function attemptUpdateEmpleado($nomina, $nombre, $domicilio, $colonia, $ciudad, $telefono, $cel, $email, $noimms, $rfc, $curp, $puesto, $salHora,$salNof,$isr, $imss, $subsidio, $infonavit, $activo,$usuario){


    $conn = connectionToDataBase();
    if($conn != null){

        $salHora = (double)$salHora;
        $salNof = (double)$salNof;
        $isr = (double)$isr;
        $imss = (double)$imss;
        $subsidio = (double)$subsidio;
        $infonavit = (double)$infonavit;

        $sqlUpdate = "UPDATE `empleados` SET `Nombre`='$nombre',`Domicilio`='$domicilio',`Colonia`='$colonia',`Ciudad`='$ciudad',`Telefono`='$telefono',`Celular`='$cel',`Email`='$email',`No_IMSS`='$noimms',`RFC`='$rfc',`CURP`='$curp',`Puesto`='$puesto',`Salario_Hora`=$salHora,`Salario_NOF`=$salNof,`ISR`=$isr,`IMSS`=$imss,`Subsidio`=$subsidio,`Infonavit`=$infonavit,`Activo`='$activo',`Usuario`='$usuario' WHERE `Nomina`='$nomina'";

            if (mysqli_query($conn, $sqlUpdate)){
                $conn->close();
                return array("status"=>"SUCCESS UPDATE");
            }
            else {
                $conn->close();
                return array("status"=>"Something went wrong on the server.");
            }
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}
function attemptGetNombre(){
     $conn = connectionToDataBase();
 
     if ($conn != null){
 
         $sql = "SELECT Nombre FROM Empleados";
         $result = $conn->query($sql);
         $commentsBox = array();
 
         while($row = $result->fetch_assoc()) {
             $response = array('Nombre' => $row['Nombre']);
             array_push($commentsBox, $response);
         }
         $conn -> close();
         return array("status" => "SUCCESS", "arrayCommentsBox" => $commentsBox);
     }
     else{
         $conn -> close();
         return array("status" => "CONNECTION WITH DB WENT WRONG");
     }
 }
?>