/**
 * Created by edgarserna on 4/10/17.
 */
$(document).ready(function(){

    $("#EditEmpleadoBtn").on("click", function(){
        console.log("entro");
        var logged = true;
        var $nombre = $("#nombreEdit");
        if($nombre.val() == ""){
            console.log($nombre.val());
            $("#errorNameEdit").text("Ingrese el nombre");
            logged = false;
        }
        else{
            $("#errorNameEdit").text("");
        }
        var $nomina = $("#nominaEdit");
        if($nomina.val() == ""){
            $("#errorLabelNominaEdit").text("Ingrese la nomina");
            logged = false;
        }
        else{
            $("#errorLabelNominaEdit").text("");
        }
        var $domicilio = $("#domicilioEdit");
        var $colonia = $("#coloniaEdit");
        var $ciudad = $("#ciudadEdit");
        var $telefono = $("#telefonoEdit");
        var $celular = $("#celularEdit");
        var $email = $("#emailEdit");
        var $noimss = $("#imssEdit");
        var $rfc = $("#rfcEdit");
        var $curp = $("#curpEdit");
        var $puesto = $("#puestoEdit");
        if($puesto.val() == ""){
            $("#errorLabelPuestoEdit").text("Ingrese el puesto");
            logged = false;
        }
        else{
            $("#errorLabelPuestoEdit").text("");
        }
        var $fNacim = $("#fnacimEdit");
        var $fIni = $("#finiEdit");
        var $salHora = $("#salhoraEdit");
        var $salNof = $("#salnofEdit");
        var $isr = $("#isrEdit");
        var $imss = $("#impimssEdit");
        var $subsidio = $("#subsidioEdit");
        var $infonavit = $("#infonavitEdit");
        var $activo = $("#activoEdit");
        if($activo.val() == ""){
            $("#errorLabelActivoEdit").text("Ingrese status");
            logged = false;
        }
        else{
            $("#errorLabelActivoEdit").text("");
        }
        var $usuario = $("#usuarioEditEmp");
        if($usuario.val() == ""){
            $("#errorLabelUsuarioEdit").text("Ingrese el usuario");
            logged = false;
        }
        else{
            $("#errorLabelUsuarioEdit").text("");
        }
        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "EDIT_EMPLEADO",
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
                "Salario_Hora" : $salHora.val(),
                "Salario_NOF" : $salNof.val(),
                "ISR" : $isr.val(),
                "IMSS" : $imss.val(),
                "Subsidio": $subsidio.val(),
                "Infonavit" : $infonavit.val(),
                "Activo" : $activo.val(),
                "Usuario": $usuario.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    alert("Se agrego correctamente un nuevo empleado");
                    console.log(jsonResponse);
                    window.location.replace("empleados.php");
                },
                error : function(errorMessage){
                    console.log(errorMessage);
                    alert("ERROR EN EDITAR EMPLEADO");
                }
            });
        }






    })

});