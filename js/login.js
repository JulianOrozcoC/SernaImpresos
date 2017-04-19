/**
 * Created by edgarserna on 4/7/17.
 */
$(document).ready(function(){

    console.log("entro");
    $("#LoginBtn").on("click",function(){
        var $userName = $("#Username");
        var $userPass = $("#Password");
        console.log("Antesde json to Send");
        var jsonToSend ={
            "action" : "LOGIN",
            "Usuario" : $userName.val(),
            "Contrasena" : $userPass.val(),
            "remember" : $("#remember").is(":checked")
        };
        console.log(jsonToSend);
        $.ajax({
            url : "data/appLayer.php",
            type: "POST",
            data: jsonToSend,
            dataType : "json",
            contentType : "application/x-www-form-urlencoded",

            success : function(jsonResponse){
                console.log(jsonResponse);
                window.location.replace("dashboard.php");
            },
            error : function(errorMessage){
                alert(errorMessage.responseText);
                alert("No entro en success");
                window.location.replace("login.php");
                console.log($userName.val());
                console.log($userPass.val());
                console.log(jsonToSend);
            }
        });
    });
});