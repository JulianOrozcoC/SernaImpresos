/**
 * Created by edgarserna on 4/17/17.
 */
$(document).ready(function() {

    var jsonToSend = {
        "action" : "SHOWCOMMENTS",
    };

    $.ajax({
        url : "data/appLayer.php",
        type : "POST",
        data : jsonToSend,
        dataType : "json",
        contentType : "application/x-www-form-urlencoded",
        success: function(jsonResponse){
            var newHtml = "";
            for (var i = 0; i < jsonResponse.length; i++){
                newHtml += "<tr>";
                var usuario = jsonResponse[i].Usuario;
                var comment = jsonResponse[i].Comentario;
                newHtml += '<td>' + usuario + '</td><td>' + comment;
                newHtml += "</tr>";
            }
            $("#comments").append(newHtml);
        },
        error: function(errorMessage){
            alert(errorMessage.responseText);
            window.location.replace("dashboard.php");
        }
    });
});