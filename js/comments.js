/**
 * Created by edgarserna on 4/17/17.
 */
$(document).ready(function() {

    var $comments = $("#newComment");

    $("#submitComment").on("click", function () {

        if ($comments.val() != "") {
            var jsonToSend = {
                "usuario": "Admin",
                "comment": $comments.val()
            };
            console.log(jsonToSend);
            $.ajax({
                url: "data/comments.php",
                type: "POST",
                data: jsonToSend,
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                success: function (jsonResponse) {
                    window.location.replace("dashboard.php");
                    console.log("que epedoooo");
                    $comments.val("");
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