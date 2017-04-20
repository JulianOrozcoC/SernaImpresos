/**
 * Created by edgarserna on 4/19/17.
 */
$(document).ready(function() {

    $("#Calcula").on("click", function () {

        var $fechaIni = $("#finis");
        var $fechaFin = $("#fechafins");


        var jsonToSend = {
            "action" : "SHOWCALCULO",
            "FechaIni" : $fechaIni.val(),
            "FechaFin" : $fechaFin.val()
        };
        console.log(jsonToSend);

        $.ajax({
            url : "data/appLayer.php",
            type : "POST",
            data : jsonToSend,
            dataType : "json",
            contentType : "application/x-www-form-urlencoded",
            success: function(jsonResponse){
                console.log(jsonResponse);
                var total = jsonResponse[0].Total;
                total = parseInt(total);
                var $sueldo = $("#salarioHora");
                $sueldo = parseInt($sueldo);
                total *= $sueldo;

                var newHtml = "";
                newHtml += "<tr>";
                newHtml += '<td>' + total + '</td>';
                newHtml += "</tr>";
                $("#ingresos").append(newHtml);

            },
            error: function(errorMessage){
                alert(errorMessage.responseText);
            }
        });
// premio de puntualidad y asitencia

        var jsonToSend = {
            "action" : "PREMIO"
        };
        console.log(jsonToSend);

        $.ajax({
            url : "data/appLayer.php",
            type : "POST",
            data : jsonToSend,
            dataType : "json",
            contentType : "application/x-www-form-urlencoded",
            success: function(jsonResponse){
                console.log(jsonResponse);
                var total = jsonResponse[0].Total;

                var newHtml = "";
                newHtml += " ";
                newHtml += '<td>' +  + '</td><td>' + + '</td>';
                newHtml += "</tr>";
                $("#ingresos").append(newHtml);

            },
            error: function(errorMessage){
                alert(errorMessage.responseText);
            }
        });




    });




    var jsonToSend = {
        "action" : "NOMBRE"
    };

    $.ajax({
        url : "data/appLayer.php",
        type : "POST",
        data : jsonToSend,
        dataType : "json",
        contentType : "application/x-www-form-urlencoded",
        success: function(data){
            console.log(data);
            var option = '';
            for (var i=0;i<data.length;i++){
                option += '<option value="'+ data[i].Nombre + '">' + data[i].Nombre + '</option>';
            }
            $('#nombres').append(option);
        },
        error: function(errorMessage){
            alert(errorMessage.responseText);
            window.location.replace("nomina.php");
        }
    });

});