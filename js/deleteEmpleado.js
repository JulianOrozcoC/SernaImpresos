/**
 * Created by edgarserna on 4/10/17.
 */
$(document).ready(function(){

    $("#DeleteEmpleado").on("click", function(){
        console.log("entro");
        
        var $nomina = $("#nominaDelete");
        var $nombre = $("#nombreDelete");
        
            var jsonToSend ={
                "action" : "ELIMINAR_EMPLEADO",
                "Nomina" : $nomina.val(),
                "Nombre" : $nombre.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url : "data/appLayer.php",
                type: "POST",
                data: jsonToSend, //Data to send to the service
                datatype : "json",
                contentType : "application/x-www-form-urlencoded", //Forces the content type to json

                success : function(jsonResponse){
                    alert("Se edito un empleado");
                    console.log(jsonResponse);
                    window.location.replace("empleados.php");
                },
                error : function(errorMessage){
                    console.log(errorMessage);
                    window.location.replace("empleados.php");
                }
            });

    })

});