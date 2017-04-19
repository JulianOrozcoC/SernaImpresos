/**
 * Created by edgarserna on 4/19/17.
 */
$(document).ready(function() {

    $("#correo").on("click", function () {

        var $soporte = $("#soporte");

        var jsonToSend = {
            "action" : "SOPORTE",
            "Soporte": $soporte.val()
        };
        console.log(jsonToSend);
        $.ajax({
            url: "data/appLayer.php",
            type: "POST",
            data: jsonToSend,
            dataType: "json",
            contentType: "application/x-www-form-urlencoded",
            success: function () {
                window.location.replace("soporte.php");
            },
            error: function (errorMessage) {
                alert(errorMessage.responseText);
            }
        });

    });

});