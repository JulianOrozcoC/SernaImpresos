/**
 * Created by edgarserna on 4/10/17.
 */
$(document).ready(function(){

    $("#agregarProvedorbtn").on("click", function(){
        console.log("entro");
        var logged = true;
        var $Nombre = $("#NombreProv");
        var $RFC = $("#RFCProv");
        var $Domicilio = $("#DomicilioProv");
        var $Telefono = $("#TelefonoProv");
        var $Vendedor = $("#VendedorProv");
        var $Fax = $("#FaxProv");

        if($Nombre.val() == ""){
            $( "#NombreProv" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($RFC.val() == ""){
            $( "#RFCProv" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($Domicilio.val() == ""){
            $( "#DomicilioProv" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($Telefono.val() == ""){
            $( "#TelefonoProv" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($Vendedor.val() == ""){
            $( "#VendedorProv" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($Fax.val() == ""){
            $( "#FaxProv" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }

        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "REGISTERPROVEEDOR",
                "Nombre" : $Nombre.val(),
                "RFC" : $RFC.val(),
                "Domicilio" : $Domicilio.val(),
                "Telefono" : $Telefono.val(),
                "Vendedor": $Vendedor.val(),
                "Fax": $Fax.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    window.location.replace("proveedores.php");
                },
                error : function(errorMessage){
                    window.location.replace("proveedores.php");
                }
            });
        }
    })

    $("#EditarProvedorbtn").on("click", function(){
        console.log("entro");
        var logged = true;
        var $id = $("#idProvEdit");
        var $Nombre = $("#NombreProvEdit");
        var $RFC = $("#RFCProvEdit");
        var $Domicilio = $("#DomicilioProvEdit");
        var $Telefono = $("#TelefonoProvEdit");
        var $Vendedor = $("#VendedorProvEdit");
        var $Fax = $("#FaxProvEdit");

        if($Nombre.val() == ""){
            $( "#NombreProvEdit" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($RFC.val() == ""){
            $( "#RFCProvEdit" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($Domicilio.val() == ""){
            $( "#DomicilioProvEdit" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($Telefono.val() == ""){
            $( "#TelefonoProvEdit" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($Vendedor.val() == ""){
            $( "#VendedorProvEdit" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($Fax.val() == ""){
            $( "#FaxProvEdit" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }

        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "UPDATEPROVEEDOR",
                "Id" : $id.val(),
                "Nombre" : $Nombre.val(),
                "RFC" : $RFC.val(),
                "Domicilio" : $Domicilio.val(),
                "Telefono" : $Telefono.val(),
                "Vendedor": $Vendedor.val(),
                "Fax": $Fax.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    window.location.replace("proveedores.php");
                },
                error : function(errorMessage){
                    window.location.replace("proveedores.php");
                }
            });
        }
    })

    $("#DeleteProvedor").on("click", function(){
        console.log("entro");
        var logged = true;
        var $id = $("#idProvDelete");
        var $Nombre = $("#NombreProvDelete");

        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "DELETEPROVEEDOR",
                "Id" : $id.val(),
                "Nombre" : $Nombre.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    window.location.replace("proveedores.php");
                },
                error : function(errorMessage){
                    window.location.replace("proveedores.php");
                }
            });
        }
    })

});