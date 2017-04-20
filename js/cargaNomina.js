/**
 * Created by edgarserna on 4/18/17.
 */
$(document).ready(function() {

    var jsonToSend = {
        "action" : "NOMINAEMPLEADO"
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
                option += '<option value="'+ data[i].Nomina + '">' + data[i].Nomina + '</option>';
            }
            $('#NominaOC').append(option);
        },
        error: function(errorMessage){
            alert(errorMessage.responseText);
            window.location.replace("ordenes.php");
        }
    });
});