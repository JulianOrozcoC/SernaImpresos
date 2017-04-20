/**
 * Created by edgarserna on 4/10/17.
 */
$(document).ready(function(){

    $("#agregarOrdenComprabtn").on("click", function(){
        console.log("entro");
        var logged = true;
        var $NominaOC = $("#NominaOC");
        var $ProveedorOC = $("#ProveedorOC");
        var $FechaOC = $("#FechaOC");
        var $CantidadOC = $("#CantidadOC");
        var $UnidadMedidaOC = $("#Unidad-MedidaOC");
        var $DescripcionOC = $("#DescripcionOC");
        var $PrecioUnitarioOC = $("#PrecioUnitarioOC");
        var $TotalOC = $("#TotalOC");
        var $AprobadaOC = $("#AprobadaOC");


        if($NominaOC.val() == ""){
            $( "#NominaOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($ProveedorOC.val() == ""){
            $( "#ProveedorOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($FechaOC.val() == ""){
            $( "#FechaOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($CantidadOC.val() == ""){
            $( "#CantidadOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($UnidadMedidaOC.val() == ""){
            $( "#Unidad-MedidaOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($DescripcionOC.val() == ""){
            $( "#DescripcionOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($PrecioUnitarioOC.val() == ""){
            $( "#PrecioUnitarioOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($TotalOC.val() == ""){
            $( "#TotalOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }
        if($AprobadaOC.val() == ""){
            $( "#AprobadaOC" ).css({'background-color' : '#FFFFEE '});
            logged = false;
        }

        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "REGISTERPORDENCOMPRA",
                "Nomina" : $NominaOC.val(),
                "Proovedor" : $ProveedorOC.val(),
                "Fecha" : $FechaOC.val(),
                "Cantidad" : $CantidadOC.val(),
                "Unidad_Medida": $UnidadMedidaOC.val(),
                "Descripcion": $DescripcionOC.val(),
                "Precio_Unitario": $PrecioUnitarioOC.val(),
                "Total": $TotalOC.val(),
                "Aprobada": $AprobadaOC.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    window.location.replace("ordenes.php");
                },
                error : function(errorMessage){
                    window.location.replace("ordenes.php");
                }
            });
        }
    })

    $("#eliminarOrdenComprabtn").on("click", function(){
        console.log("entro");
        var logged = true;
        var $id = $("#IdOrdenCompra");
        var $Descripcion = $("#DescripcionOrdenCompra");

        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "DELETEORDENCOMPRA",
                "Id" : $id.val(),
                "Descripcion" : $Descripcion.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    window.location.replace("ordenes.php");
                },
                error : function(errorMessage){
                    window.location.replace("ordenes.php");
                }
            });
        }
    })

    $("#AprobarOrdenComprabtn").on("click", function(){
        console.log("entro");
        var logged = true;
        var $id = $("#IdOrdenCompraAP");
        var $Descripcion = $("#DescripcionOrdenCompraAP");

        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "APROBARORDENCOMPRA",
                "Id" : $id.val(),
                "Descripcion" : $Descripcion.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    window.location.replace("ordenes.php");
                },
                error : function(errorMessage){
                    window.location.replace("ordenes.php");
                }
            });
        }
    })

     $("#DesAprobarOrdenComprabtn").on("click", function(){
        console.log("entro");
        var logged = true;
        var $id = $("#IdOrdenCompraDP");
        var $Descripcion = $("#DescripcionOrdenCompraDP");

        console.log(logged);
        if(logged){
            var jsonToSend ={
                "action" : "DESAPROBARORDENCOMPRA",
                "Id" : $id.val(),
                "Descripcion" : $Descripcion.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    window.location.replace("ordenes.php");
                },
                error : function(errorMessage){
                    window.location.replace("ordenes.php");
                }
            });
        }
    })

});