$(document).ready(function(){
    $("#LogInForm").submit(function(event) {
         event.preventDefault();

        if( $('#Username').val()=="" || $('#Password').val()=="") {

            if($('#Username').val()=="") {
                $( "#Username" ).css({'background-color' : '#FAFAA5 '});
            };

            if($('#Password').val()==""){
                $( "#Password" ).css({'background-color' : '#FAFAA5 '});
            };
            $.notify("Favor de llenar toda la forma del contacto.","warn");
        } else {

            $( "#LogInForm" )[0].submit();
        };
    });
});