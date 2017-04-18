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

            if(password_verify($userPassword, $row['Contrasena'])){
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


function attemptRegistration($nomina, $nombre, $domicilio, $colonia, $ciudad, $telefono, $cel, $email, $noimms, $rfc, $curp, $puesto, $fnacim, $fini, $salHora,$salNof,$isr, $imss, $subsidio, $infonavit, $activo,$usuario, $pass){


    $conn = connectionToDataBase();
    if($conn != null){
        $options = ['cost' => 12];
        $hash = password_hash($pass, PASSWORD_BCRYPT, $options);

        $sqlVerif = "SELECT * FROM Empleados WHERE Usuario='$usuario' ";
        $sqlInsert = "INSERT INTO Empleados(Nomina, Nombre, Domicilio, Colonia, Ciudad, Telefono, Celular, Email, No_IMSS, RFC, CURP, Puesto, Fecha_Nacimiento, Fecha_Inicio, Salario_Hora, Salario_NOF, ISR, IMSS, Subsidio, Infonavit, Activo, Usuario, Contrasena)
					VALUES  ('$nomina', '$nombre', '$domicilio', '$colonia', '$ciudad', '$telefono', '$cel', '$email', '$noimms', '$rfc', '$curp', '$puesto', '$fnacim', '$fini', '$salHora','$salNof','$isr', '$imss', '$subsidio', '$infonavit', '$activo','$usuario', '$hash')";

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
function TableEmpleado (){
        $conn = connectionToDataBase();

        if ($conn != null){

            $sql = "SELECT * FROM empleados";
            $result = $conn->query($sql);
            $tableEmp = array();
            while($row = $result->fetch_assoc()) {
                $salario = strval($row['Salario_Hora']);
                $response = array('Nombre' => $row['Nombre'], 'Nomina' => $row['Nomina'], 'salario' => $salario);
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

function attemptPostComment($nomina, $comentario){

    $conn = connectionToDataBase();

    if($conn != null){
        $sqlInsert = "INSERT INTO Comentarios (Nomina, Comentario)
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

        $sql = "SELECT Nomina, Comentario FROM Comentarios";
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

function attemptHomeService (){
    $conn = connectionToDataBase();

    if ($conn != null){

        //$userPassword = $_POST['userPassword'];

        $conn ->set_charset('utf8mb4');

        $sql = " SELECT * FROM Comentarios ";
        $result = $conn->query($sql);

        //echo $result->num_rows;
        if ($result->num_rows > 0)//Double check
        {
            $comments = array();
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                $response = array('Nomina' => $row['Nomina'], 'Comentario' => $row['Comentario']);
                array_push($comments, $response);
                //echo ($response);
            }

            //echo json_encode($response);
            //echo json_encode($comments);
            $conn->close();
            return array("status" =>  "SUCCESS", "comments" => $comments);
        }

    }else{
        $conn -> close();
        return array("status" => "CONNECTION WITH DB WENT WRONG");
    }
}

?>