/**
 * Created by edgarserna on 4/20/17.
 */
$(document).ready(function() {

    var jsonToSend = {
        "action" : "COUNTORDENES"
    };

    $.ajax({
        url : "data/appLayer.php",
        type : "POST",
        data : jsonToSend,
        dataType : "json",
        contentType : "application/x-www-form-urlencoded",
        success: function(jsonResponse){
            var total = jsonResponse[0].Ap;
            console.log(total);
            $('#oca').append(total);

        },
        error: function(errorMessage){
            alert(errorMessage.responseText);
            window.location.replace("facturas.php");
        }
    });

    var jsonToSend = {
        "action" : "COUNTORDENESP"
    };

    $.ajax({
        url : "data/appLayer.php",
        type : "POST",
        data : jsonToSend,
        dataType : "json",
        contentType : "application/x-www-form-urlencoded",
        success: function(jsonResponse){
            var total = jsonResponse[0].Ap;
            console.log(total);
            $('#ocg').append(total);

        },
        error: function(errorMessage){
            alert(errorMessage.responseText);
            window.location.replace("facturas.php");
        }
    });





});