/**
 * Created by edgarserna on 4/18/17.
 */
$(document).ready(function() {

    function calculateTime() {
        //get values
        var valuestart = $("select[name='timestart']").val();
        var valuestop = $("select[name='timestop']").val();

        //create date format
        var timeStart = new Date("01/01/2007 " + valuestart).getHours();
        var timeEnd = new Date("01/01/2007 " + valuestop).getHours();
        console.log(timeStart);
        console.log(timeEnd);

        var hourDiff = timeEnd - timeStart;
        hourDiff = parseInt(hourDiff);
        console.log(hourDiff);
        document.getElementById("htotal").value = hourDiff;

    }
    $("select").change(calculateTime);
    calculateTime();

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
            $('#nombre').append(option);
        },
        error: function(errorMessage){
            alert(errorMessage.responseText);
            window.location.replace("nomina.php");
        }
    });


    $("#ImpNomina").on("click", function () {
        window.location.replace("ImpNomina.php");
    });

    $("#AgregaHora").on("click", function () {

        var $nombre = $("#nombre");
        var $nomina = $("#nomina");
        var $fecha = $("#fecha");
        var $hentrada = $("#hini");
        var $hsalida = $("#hsal");
        var $asistencia = $("#asistencia");
        var $retraso = $("#retraso");
        var $total = $("#htotal");

        var jsonToSend = {
            "action" : "POSTHORAS",
            "Nombre" : $nombre.val(),
            "Nomina" : $nomina.val(),
            "Fecha" : $fecha.val(),
            "Entrada" : $hentrada.val(),
            "Salida" : $hsalida.val(),
            "Asistencia" : $asistencia.val(),
            "Retraso" : $retraso.val(),
            "Total" : $total.val()
        };

        console.log(jsonToSend);
        $.ajax({
            url : "data/appLayer.php",
            type: "POST",
            data: jsonToSend, //Data to send to the service
            datatype : "json",
            contentType : "application/x-www-form-urlencoded", //Forces the content type to json

            success : function(data){
                console.log(data);
                window.location.replace("nomina.php");
            },
            error : function(errorMessage){
                console.log(errorMessage);
            }
        });



        window.location.replace("nomina.php");
    });


});