/**
 * Created by edgarserna on 4/19/17.
 */
$(document).ready(function(){

    $("#signOutButton").on("click", function(){
        var jsonToSend = {
            "action" : "ENDSESSION"
        };
        $.ajax({
            url : "data/appLayer.php",
            type : "POST",
            data : jsonToSend,
            dataType : "json",
            contentType : "application/x-www-form-urlencoded",
            success : function(jsonResponse){
                window.location.replace("login.php");
            },
            error : function(errorMessage){
                alert(errorMessage.responseText);
            }
        });
    });
});