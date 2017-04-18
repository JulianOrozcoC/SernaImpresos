/**
 * Created by edgarserna on 4/17/17.
 */
$(document).ready(function() {

    var $comments = $("#newComment");

    $("#submitComment").on("click", function () {

        if ($comments.val() != "") {
            var jsonToSend = {
                "action" : "COMMENTING",
                "Nomina": "Admin",
                "Comentario": $comments.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url: "data/appLayer.php",
                type: "POST",
                data: jsonToSend,
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                success: function (data) {
                    window.location.replace("dashboard.php");
                    console.log("que epedoooo");
                    //$("#CommentList").append(data.Comentario);
                },
                error: function (errorMessage) {
                    alert(errorMessage.responseText);
                }
            });
        }
        else {
            alert("Please enter a comment");
        }
    });
});