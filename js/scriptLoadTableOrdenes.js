$(document).ready(function(){


    var jsonToSend = {
                "action" : "LOADORDENESCOMPRA"
        };
    $.ajax({

        
            url:"data/appLayer.php",
            type : "POST",
            data : jsonToSend, 
            dataType : "json",
            contentType : "application/x-www-form-urlencoded",
            success: function(data){
                $('#OrdenesComp').dataTable( {
                "data": data,
                "columns": [
                    { "data": "ID" },
                    { "data": "Nomina" },
                    { "data": "Proveedor" },
                    { "data": "Fecha" },
                    { "data": "Aprobada" },
                    { "data": "Acciones" }
                ]
            });
            },
            error: function(errorMsg){
                alert("ERROR IN TABLE OrdenesCompras");
                console.log(errorMsg);
            }
    });
});
