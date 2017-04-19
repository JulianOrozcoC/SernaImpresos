$(document).ready(function(){


    var jsonToSend = {
                "action" : "LOADPROVEEDORES"
        };
    $.ajax({

        
            url:"data/appLayer.php",
            type : "POST",
            data : jsonToSend, 
            dataType : "json",
            contentType : "application/x-www-form-urlencoded",
            success: function(data){
                $('#Proveedores').dataTable( {
                "data": data,
                "columns": [
                    { "data": "ID" },
                    { "data": "Nombre" },
                    { "data": "RFC" },
                    { "data": "Domicilio" },
                    { "data": "Telefono" },
                    { "data": "Vendedor" },
                    { "data": "Fax" },
                    { "data": "Acciones"}
                ]
            });
            },
            error: function(errorMsg){
                alert("ERROR IN TABLE PROVEEDORES");
                console.log(errorMsg);
            }
    });
});
