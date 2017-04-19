/**
 * Created by edgarserna on 4/10/17.
 */
$(document).ready(function(){

    $("#AgregaEmp").on("click", function(){
        console.log("entro");
        var logged = true;
        var $nombre = $("#nombre");
        if($nombre.val() == ""){
            console.log($nombre.val());
            $("#errorName").text("Ingrese el nombre");
            logged = false;
        }
        else{
            $("#errorLabelName").text("");
        }
        var $nomina = $("#nomina");
        if($nomina.val() == ""){
            $("#errorLabelNomina").text("Ingrese la nomina");
            logged = false;
        }
        else{
            $("#errorLabelNomina").text("");
        }
        var $domicilio = $("#domicilio");
        var $colonia = $("#colonia");
        var $ciudad = $("#ciudad");
        var $telefono = $("#telefono");
        var $celular = $("#celular");
        var $email = $("#email");
        var $noimss = $("#imss");
        var $rfc = $("#rfc");
        var $curp = $("#curp");
        var $puesto = $("#puesto");
        if($puesto.val() == ""){
            $("#errorLabelPuesto").text("Ingrese el puesto");
            logged = false;
        }
        else{
            $("#errorLabelPuesto").text("");
        }
        var $fNacim = $("#fnacim");
        var $fIni = $("#fini");
        var $salHora = $("#salhora");
        var $salNof = $("#salnof");
        var $isr = $("#isr");
        var $imss = $("#impimss");
        var $subsidio = $("#subsidio");
        var $infonavit = $("#infonavit");
        var $activo = $("#activo");
        if($activo.val() == ""){
            $("#errorLabelActivo").text("Ingrese status");
            logged = false;
        }
        else{
            $("#errorLabelActivo").text("");
        }
        var $usuario = $("#usuario");
        if($usuario.val() == ""){
            $("#errorLabelUsuario").text("Ingrese el usuario");
            logged = false;
        }
        else{
            $("#errorLabelUsuario").text("");
        }
        var $pass = $("#contrasena");
        if($pass.val() == ""){
            $("#errorLabelContrasena").text("Ingrese la contraseña");
            logged = false;
        }
        else{
            $("#errorLabelContrasena").text("");
        }
        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "REGISTER",
                "Nomina" : $nomina.val(),
                "Nombre" : $nombre.val(),
                "Domicilio" : $domicilio.val(),
                "Colonia" : $colonia.val(),
                "Ciudad": $ciudad.val(),
                "Telefono": $telefono.val(),
                "Celular": $celular.val(),
                "Email" : $email.val(),
                "No_IMSS" : $noimss.val(),
                "RFC" : $rfc.val(),
                "CURP" : $curp.val(),
                "Puesto": $puesto.val(),
                "Fecha_Nacimiento" : $fNacim.val(),
                "Fecha_Inicio": $fIni.val(),
                "Salario_Hora" : $salHora.val(),
                "Salario_NOF" : $salNof.val(),
                "ISR" : $isr.val(),
                "IMSS" : $imss.val(),
                "Subsidio": $subsidio.val(),
                "Infonavit" : $infonavit.val(),
                "Activo" : $activo.val(),
                "Usuario": $usuario.val(),
                "Contrasena" : $pass.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    console.log(jsonResponse);
                    window.location.replace("empleados.php");
                },
                error : function(errorMessage){
                    console.log(errorMessage);
                    window.location.replace("newEmpleado.php");
                }
            });
        }






    })

});