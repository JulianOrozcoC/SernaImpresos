/**
 * Created by edgarserna on 4/19/17.
 */
$(document).ready(function() {

    $("#Calcula").on("click", function () {

        var sue = 0;
        var pp = 0;
        var pa = 0;

        var $nomina = $("#rfc");
        var $fechaIni = $("#finis");
        var $fechaFin = $("#fechafins");


        var jsonToSend = {
            "action" : "SHOWCALCULO",
            "FechaIni" : $fechaIni.val(),
            "FechaFin" : $fechaFin.val(),
            "Nomina" : $nomina.val()
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
                var $sueldo = $("#salarioHora");
                $sueldo = $sueldo.val();
                total *= $sueldo;
                sue = Number(total);

                /*
                var newHtml = "";
                newHtml += "<tr id='add'>"
                newHtml += '<td>' + total + '</td>'
                newHtml += "</tr>"
                $("#ingresos").append(newHtml);
                */
                asis();

            },
            error: function(errorMessage){
                alert(errorMessage.responseText);
            }
        });

// premio de puntualidad y asitencia

        function asis() {
            var $nomina = $("#rfc");

            var jsonToSend = {
                "action" : "PREMIO",
                "Nomina" : $nomina.val()
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
                    var total = jsonResponse[0].Asist;
                    console.log(total);
                    var asistencia = 100;
                    if(total > 0){
                        asistencia = 0;
                    }

                    pa = Number(asistencia);
                    /*
                     var newHtml = "";
                     newHtml += " "
                     newHtml += '<td>' + asistencia + '</td>';
                     $("#add").append(newHtml);
                     */
                    punt();

                },
                error: function(errorMessage){
                    alert(errorMessage.responseText);
                }
            });

        }


        // premio puntualidad

        function punt() {

            var $nomina = $("#rfc");

            var jsonToSend = {
                "action" : "PREMIOP",
                "Nomina" : $nomina.val()
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
                    var total = jsonResponse[0].Ret;
                    var retraso = 100;
                    if(total > 0){
                        retraso = 0;
                    }

                    pp = Number(retraso);
                    suma();
                    /*
                     var newHtml = "";
                     newHtml += " "
                     newHtml += '<td>' + retraso + '</td>';
                     $("#add").append(newHtml);
                     */

                },
                error: function(errorMessage){
                    alert(errorMessage.responseText);
                }
            });

        }


        function suma() {
            console.log(sue + " " + pa + " " + pp);
            var newHtml = "";
            newHtml += "<tr>"
            newHtml += '<td>' + sue + '</td>'
            newHtml += '<td>' + pp + '</td>'
            newHtml += '<td>' + pa + '</td>'
            newHtml += '<td>' + (sue + pa+ pp) + '</td>'

            newHtml += "</tr>"
            $("#ingresos").append(newHtml);

            // deducciones
            var $nombre = $("#nombres");

            var jsonToSend = {
                "action" : "EMPLEADO",
                "Nombre" : $nombre.val()
            };
            console.log(jsonToSend);

            $.ajax({
                url : "data/appLayer.php",
                type : "POST",
                data : jsonToSend,
                dataType : "json",
                contentType : "application/x-www-form-urlencoded",
                success: function(data){
                    console.log(data);

                    var isr = Number(data[0].ISR);
                    var imss = Number(data[0].IMSS);
                    var infonavit = Number(data[0].Infonavit);
                    var subsidio = Number(data[0].Subsidio);


                    var newHtml = "";
                    newHtml += "<tr>"
                    newHtml += '<td>' + isr + '</td>'
                    newHtml += '<td>' + imss + '</td>'
                    newHtml += '<td>' + infonavit + '</td>'
                    newHtml += '<td>' + subsidio + '</td>'
                    newHtml += '<td>' + (isr + imss + infonavit + subsidio) + '</td>'
                    newHtml += "</tr>"
                    $("#deducciones").append(newHtml);

                    var sTotal = (sue + pa+ pp) - (isr + imss + infonavit + subsidio);
                    console.log(sTotal);
                    document.getElementById("total").value = sTotal;


                },
                error: function(errorMessage){
                    alert(errorMessage.responseText);
                }
            });

        }




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