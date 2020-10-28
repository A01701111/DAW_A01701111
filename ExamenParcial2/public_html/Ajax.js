$(document).ready(function() {

    let request;
    request = $.ajax({
        url: "DisplayZombies.php",
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log(response);
        $('#tabla').html(response);
    });

    $("#FormZombie").submit(function(event){
        let request;

        event.preventDefault();
    
        if (request) {
            request.abort();
        }

        let $form = $(this);
    
        let $inputs = $form.find("input, select, button, textarea");
    
        let serializedData = $form.serialize();
    
        $inputs.prop("disabled", true);
    
        // request = $.ajax({
        //     url: "getTotal.php",
        //     type: "post",
        //     data: serializedData
        // });
    
        // request.done(function (response, textStatus, jqXHR){
        //     // Log a message to the console
        //     console.log(response);
        //     $( '#FormZombie' ).each(function(){
        //         this.reset();
        //     });
        //     $('#total').html(response);
        // });
    
        // // Callback handler that will be called on failure
        // request.fail(function (jqXHR, textStatus, errorThrown){
        //     // Log the error to the console
        //     console.error(
        //         "The following error occurred: "+
        //         textStatus, errorThrown
        //     );
        // });
    
        // // Callback handler that will be called regardless
        // // if the request failed or succeeded
        // request.always(function () {
        //     // Reenable the inputs
        //     $inputs.prop("disabled", false);
        // });
    
    });

    

   

});