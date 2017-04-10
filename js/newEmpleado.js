/**
 * Created by edgarserna on 4/10/17.
 */
$(document).ready(function(){

    $("#AgregaEmp").on("click", function(){
        console.log("entro");
        var logged = true;
        var $nombre = $("#nombre");
        if($nombre.val() == ""){
            $("#errorLabelName").text("Ingrese el nombre");
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
        if($domicilio.val() == ""){
            $("#errorLabelDomicilio").text("Ingrese el domicilio");
            logged = false;
        }
        else{
            $("#errorLabelDomicilio").text("");
        }
        var $colonia = $("#colonia");
        if($colonia.val() == ""){
            $("#errorLabelColonia").text("Ingrese la colonia");
            logged = false;
        }
        else{
            $("#errorLabelColonia").text("");
        }
        var $ciudad = $("#ciudad");
        if($ciudad.val() == ""){
            $("#errorLabelCiudad").text("Ingrese la ciudad");
            logged = false;
        }
        else{
            $("#errorLabelCiudad").text("");
        }
        var $telefono = $("#telefono");
        if($telefono.val() == ""){
            $("#errorLabelTelefono").text("Ingrese el telefono");
            logged = false;
        }
        else{
            $("#errorLabelDomicilio").text("");
        }
        var $celular = $("#celular");
        if($celular.val() == ""){
            $("#errorLabelCelular").text("Ingrese el celular");
            logged = false;
        }
        else{
            $("#errorLabelCelular").text("");
        }
        var $email = $("#email");
        if($email.val() == ""){
            $("#errorLabelEmail").text("Ingrese el correo electronico");
            logged = false;
        }
        else{
            $("#errorLabelEmail").text("");
        }
        var $noimss = $("#imss");
        if($noimss.val() == ""){
            $("#errorLabelNoImss").text("Ingrese el numero de IMSS");
            logged = false;
        }
        else{
            $("#errorLabelNoImss").text("");
        }







    })

});