/**
 * Created by edgarserna on 4/7/17.
 */
$(document).ready(function(){

    console.log("entro");
    $("#LoginBtn").on("click",function(){
        var $userName = $("#Username");
        var $userPass = $("#Password");
        if ($userName.val() == ""){
            $("#errorLabelUserName").text("Please provide your username");
        }
        else{
            $("#errorLabelUserName").text("");
        }
        if ($userPass.val() == ""){
            $("#errorLabelPass").text("Please provide your password");
        }
        else{
            $("#errorLabelPass").text("");
        }
        
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
            datatype : "json",
            contentType : "application/x-www-form-urlencoded",

            success : function(jsonResponse){
                console.log(jsonResponse);
                window.location.replace("dashboard.php");
            },
            error : function(errorMessage){
                alert(errorMessage.responseText);
            }
        });
    });
});