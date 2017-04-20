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

function attemptLogin($userName, $userPassword){
    $conn = connectionToDataBase();
    if ($conn != null){
        $sql = "SELECT `Usuario`, `Contrasena` FROM `empleados` WHERE `Usuario` = '$userName' AND `Contrasena` = '$userPassword'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            $conn -> close();
            return array("status" => "SUCCESS");
        }
        else{
            $conn -> close();
            return array("status" => "WRONG CREDENTIALS!");
        }
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}

function attemptValidateUser($username){
    $conn = connectionToDataBase();
    if ($conn != null){
        $sql = "SELECT username FROM UsersDatabase WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $conn -> close();
            return array("status" => "USERNAME ALREADY IN USE");
        }
        else{
            $conn -> close();
            return array("status" => "SUCCESS");
        }
    }
    else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
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

function attemptRegistrationOrdenCompra($Nomina, $Proovedor, $Fecha, $Cantidad, $Unidad_Medida, $Descripcion, $Precio_Unitario, $Total, $Aprobada){


    $conn = connectionToDataBase();
    if($conn != null){
        $sqlInsert = "INSERT INTO `orden_compra`(`Nomina`, `Proveedor`, `Fecha`, `Cantidad`, `Unidad_Medida`, `Descripcion`, `Precio_Unitario`, `Total`, `Aprobada`) VALUES ('$Nomina','$Proovedor','$Fecha','$Cantidad','$Unidad_Medida','$Descripcion','$Precio_Unitario','$Total','$Aprobada')";

            if (mysqli_query($conn, $sqlInsert)){
                $conn->close();
                return array("status"=>"SUCCESS ORDEN COMPRA REG");
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

function loadEmpleado ($nombre){
    $conn = connectionToDataBase();

    if ($conn != null){

        $sql = "SELECT * FROM empleados WHERE Nombre = '$nombre'";
        $result = $conn->query($sql);
        $aEmpleados = array();
        while($row = $result->fetch_assoc()) {
            $salario = strval($row['Salario_Hora']);
            $response = array('Nombre' => $row['Nombre'], 'Nomina' => $row['Nomina'], 'Salario' => $salario,'Salario_NOF' => $row['Salario_NOF'],'Puesto' => $row['Puesto'], "RFC" => $row['RFC'], "ISR" => $row['ISR'], "IMSS" => $row['IMSS'], "Subsidio" => $row['Subsidio'], "Infonavit" => $row['Infonavit']);
            array_push($aEmpleados, $response);
        }
        $conn -> close();
        return array("status" => "SUCCESS", "empleados" => $aEmpleados);
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
                $status = $row['Aprobada'];
                if ($status == 'Aprobada') {
                    $response = array('ID' => $row['id_OCompra'], 'Nomina' => $row['Nomina'], 'Proveedor' => $row['Proveedor'],'Fecha' => $row['Fecha'],'Aprobada' => $row['Aprobada'], 'Acciones' => "<button class='btn btn-xs btn-primary btn-block' data-toggle='modal'  id='DesaprobarOrdenComp' data-id='" . $row['id_OCompra'] . "/" . $row['Descripcion'] . "' style = 'margin-bottom: 5px;' >DesAprobar</button><button class='btn btn-xs btn-danger btn-block' data-toggle='modal'  id='delete_ordenComp' data-id='" . $row['id_OCompra'] . "/" . $row['Descripcion'] . "'>Borrar</button>");
                } else if($status == 'No Aprobada') {
                    $response = array('ID' => $row['id_OCompra'], 'Nomina' => $row['Nomina'], 'Proveedor' => $row['Proveedor'],'Fecha' => $row['Fecha'],'Aprobada' => $row['Aprobada'], 'Acciones' => "<button class='btn btn-xs btn-primary btn-block' data-toggle='modal'  id='aprobarOrdenComp' data-id='" . $row['id_OCompra'] . "/" . $row['Descripcion'] . "' style = 'margin-bottom: 5px;' >Aprobar</button><button class='btn btn-xs btn-danger btn-block' data-toggle='modal'  id='delete_ordenComp' data-id='" . $row['id_OCompra'] . "/" . $row['Descripcion'] . "'>Borrar</button>");
                }
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

function attemptDeleteOrdenCompra($Id, $Descripcion){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "DELETE FROM `orden_compra` WHERE `id_OCompra` = '$Id'";

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

function attemptAprobarOrdenCompra($Id, $Descripcion){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "UPDATE `orden_compra` SET `Aprobada`= 'Aprobada'  WHERE `id_OCompra` = '$Id'";

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

function attemptDesAprobarOrdenCompra($Id, $Descripcion){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "UPDATE `orden_compra` SET `Aprobada`= 'No Aprobada'  WHERE `id_OCompra` = '$Id'";

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

 function attemptGetNombreProv(){
     $conn = connectionToDataBase();

     if ($conn != null){

         $sql = "SELECT Nombre FROM proveedores";
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

 function attemptGetNominaEmp(){
     $conn = connectionToDataBase();

     if ($conn != null){

         $sql = "SELECT Nomina FROM empleados";
         $result = $conn->query($sql);
         $commentsBox = array();

         while($row = $result->fetch_assoc()) {
             $response = array('Nomina' => $row['Nomina']);
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

function attemptPostHoras($nombre, $nomina, $fecha, $hentrada, $hsalida, $asistencia, $retraso, $total){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "INSERT INTO Trabaja (Nomina, Fecha, Hora_Entrada, Hora_Salida, Asistencia, Retraso, Horas_Trabajadas)
		              VALUES  ('$nomina', '$fecha', '$hentrada', '$hsalida', '$asistencia', '$retraso', '$total' )";

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
function attemptGetSalario($fechaIni, $fechaFin, $nomina){
    $conn = connectionToDataBase();

    if ($conn != null){

        $sql = "SELECT Horas_Trabajadas, SUM(Horas_Trabajadas)
                AS Total
                FROM Trabaja
                WHERE Fecha >= '$fechaIni'
                AND Fecha <= '$fechaFin'
                AND Nomina = '$nomina'";

        $result = $conn->query($sql);
        $commentsBox = array();

        while($row = $result->fetch_assoc()) {
            $response = array('Total' => $row['Total']);
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

function attemptGetPremio($nomina){
    $conn = connectionToDataBase();


    if ($conn != null){

        $sql = "SELECT Asistencia, COUNT(Asistencia)
                AS Asist
                FROM Trabaja
                WHERE Asistencia = 'no'
                AND Nomina = '$nomina'";

        $result = $conn->query($sql);
        $commentsBox = array();

        while($row = $result->fetch_assoc()) {
            $response = array('Asist' => $row['Asist']);
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

function attemptGetPremioP($nomina){
    $conn = connectionToDataBase();


    if ($conn != null){

        $sql = "SELECT Retraso, COUNT(Retraso)
                AS Ret
                FROM Trabaja
                WHERE Retraso = 'si'
                AND Nomina = '$nomina'";

        $result = $conn->query($sql);
        $commentsBox = array();

        while($row = $result->fetch_assoc()) {
            $response = array('Ret' => $row['Ret']);
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