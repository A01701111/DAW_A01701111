$(document).ready(function() {
    let request;
    request = $.ajax({
        url: "DisplayZombies.php",
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR){
        console.log(response);
        $('#tabla').html(response);
    });

    // $("#FormZombie").submit(function(event){
    //     let request;

    //     event.preventDefault();
    
    //     if (request) {
    //         request.abort();
    //     }

    //     let $form = $(this);
    
    //     let $inputs = $form.find("input, select, button, textarea");
    
    //     let serializedData = $form.serialize();
    
    //     $inputs.prop("disabled", true);
    
        
    // });

    

   

});