/**
 * Created by edgarserna on 4/7/17.
 */
$(document).ready(function(){
    //activeSession(); 
    console.log("entro");
    $("#loginButtonbtn").on("click", function(){
        var $userName = $("#Username");
        var $password = $("#Password");
        if ($userName.val() == "" || $password.val() == ""){
            alert("Please insert username and password");
        }
        else {
            var jsonToSend = {
                "action" : "LOGIN",
                "username" : $userName.val(),
                "userPassword" : $password.val(),
                "remember" : $("#remember").is(":checked")

            };
            $.ajax({
                url : "data/appLayer.php",
                type : "POST",
                data : jsonToSend,
                dataType : "json",
                contentType : "application/x-www-form-urlencoded",
                success : function(jsonResponse){
                    window.location.replace("dashboard.php");
                },
                error : function(errorMessage){
                    alert(errorMessage.responseText);
                }
            });
        }
    });
    /*function activeSession(){
        var jsonToSend = {
            "action" : "ACTIVESESSION"
        };
        $.ajax({
            url : "data/appLayer.php",
            type : "POST",
            data : jsonToSend,
            dataType : "json",
            contentType : "application/x-www-form-urlencoded",
            success : function(jsonResponse){
                window.location.replace("home.html");
            },
            error : function(errorMessage){
                //
            }
        });
    }*/
});