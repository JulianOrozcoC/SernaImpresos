/**
 * Created by edgarserna on 4/19/17.
 */
$(document).ready(function() {

    var jsonToSend = {
        "action" : "SHOWFACTURAS",
    };

    $.ajax({
        url : "data/appLayer.php",
        type : "POST",
        data : jsonToSend,
        dataType : "json",
        contentType : "application/x-www-form-urlencoded",
        success: function(jsonResponse){
            var newHtml = "";
            for (var i = 0; i < jsonResponse.length; i++){
                newHtml += "<tr>";
                var factura = jsonResponse[i].Factura;
                var fecha = jsonResponse[i].Fecha;
                newHtml += '<td>' + factura + '</td><td>' + fecha;
                newHtml += "</tr>";
            }
            $("#facturas").append(newHtml);
        },
        error: function(errorMessage){
            alert(errorMessage.responseText);
            window.location.replace("facturas.php");
        }
    });



    $("#AgregaFac").on("click", function () {

        var factura = $("#factura");
        var $fecha = $("#fecha");

        if(factura.val() == ""){
            console.log(factura.val());
            $("#errorFactura").text("Ingrese el nombre de la factura");
            logged = false;
        }
        else{
            $("#errorFactura").text("");
        }
        if($fecha.val() == ""){
            $("#errorFecha").text("Ingrese la fecha");
            logged = false;
        }
        else{
            $("#errorFecha").text("");
        }

        var jsonToSend = {
            "action" : "FACTURAS",
            "Factura": factura.val(),
            "Fecha" : $fecha.val()
        };
        console.log(jsonToSend);
        $.ajax({
            url: "data/appLayer.php",
            type: "POST",
            data: jsonToSend,
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            success: function () {
                window.location.replace("facturas.php");
            },
            error: function (errorMessage) {
                alert(errorMessage.responseText);
            }
        });
    });
});