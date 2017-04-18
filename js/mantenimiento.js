/**
 * Created by edgarserna on 4/18/17.
 */
$(document).ready(function() {

    var jsonToSend = {
        "action" : "SHOWMANTENIMIENTO",
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
                var maquina = jsonResponse[i].Maquina;
                var fecha = jsonResponse[i].Fecha;
                newHtml += '<td>' + maquina + '</td><td>' + fecha;
                newHtml += "</tr>";
            }
            $("#mantenimiento").append(newHtml);
        },
        error: function(errorMessage){
            alert(errorMessage.responseText);
            window.location.replace("mantenimiento.php");
        }
    });



    $("#AgregaMan").on("click", function () {

        var maquina = $("#maquina");
        var $fechaM = $("#fecha");

        if(maquina.val() == ""){
            console.log(maquina.val());
            $("#errorMaquina").text("Ingrese el nombre");
            logged = false;
        }
        else{
            $("#errorMaquina").text("");
        }
        if($fechaM.val() == ""){
            $("#errorFecha").text("Ingrese la fecha");
            logged = false;
        }
        else{
            $("#errorFecha").text("");
        }

            var jsonToSend = {
                "action" : "MANTENIMIENTO",
                "Maquina": maquina.val(),
                "Fecha" : $fechaM.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url: "data/appLayer.php",
                type: "POST",
                data: jsonToSend,
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                success: function () {
                    window.location.replace("mantenimiento.php");
                },
                error: function (errorMessage) {
                    alert(errorMessage.responseText);
                }
            });
    });
});