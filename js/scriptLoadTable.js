$(document).ready(function(){


    var jsonToSend = {
                "action" : "LoadTableEmpleados"
        };
    $.ajax({

        
            url:"data/appLayer.php",
            type: "POST", <!--GET|POST|PUT-->
            data: jsonToSend,
            dataType: "json",
            contentType : "application/x-www-form-urlencoded",
            success: function(data){
                var newhtml = "";

                for (var x in data){
                    newhtml +=    "<tr>" 
                                + "<td>" + data[x].Nombre + "</td>"
                                + "<td>" + data[x].Nomina + "</td>"
                                + "<td>" + data[x].salario + "</td>"
                                + "</tr>" ;
                }

                $("#TableEmpleados").append(newhtml);
            },
            error: function(errorMsg){
                alert("ERROR IN TABLE EMPLEADOS");
                    //alert(errorMessage.responseText);
                alert(errorMsg.statusText);
                console.log(errorMsg);
            }
    });
});
