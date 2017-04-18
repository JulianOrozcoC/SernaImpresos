$(document).ready(function(){


    var jsonToSend = {
                "action" : "LOADEMPLEADOS"
        };
    $.ajax({

        
            url:"data/appLayer.php",
            type : "POST",
            data : jsonToSend, 
            dataType : "json",
            contentType : "application/x-www-form-urlencoded",
            success: function(data){
                var newhtml = "";

                for (var i = 0; i < data.length; i++){
                    newhtml +=    "<tr>"
                                + "<td>" + data[i].Nombre + "</td>"
                                + "<td>" + data[i].Nomina + "</td>"
                                + "<td>" + data[i].salario + "</td>"
                                + "</tr>" ;
                }

                $("#dataTables-example").append(newhtml);
            },
            error: function(errorMsg){
                alert("ERROR IN TABLE EMPLEADOS");
                console.log(errorMsg);
            }
    });
});
